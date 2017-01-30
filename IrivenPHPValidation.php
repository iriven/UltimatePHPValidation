<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 07/01/2017
 * Time: 13:51
 */

namespace UltimatePHPValidation;

use ReflectionClass;
use UltimatePHPValidation\Core\ValidationInterface;
use UltimatePHPValidation\Core\Warning\ErrorInfos;
use UltimatePHPValidation\Rules\Contains;

/**
 * Class IrivenPHPValidation
 * @package UltimatePHPValidation
 */
final class IrivenPHPValidation
{
    const STR_DEFAULT_VALUE      = null;
    const ARR_DEFAULT_VALUE      = [];
    const VALIDATOR_METHOD       = 'validate';
    const MSGCODE_GETTER         = 'getCode';
    private $FieldValue;
    private $Arguments;
    private $DataProvider;
    private $MatchingField;
    private $ErrorsWrapper       = self::ARR_DEFAULT_VALUE;
    private $RuleNameMarker      = ':';
    private $RulesDelimiter      = '|';
    private $ArgsDelimiter       = ';';
    private $Contraints          = self::ARR_DEFAULT_VALUE;
    private $FieldMatchingRules  = ['Fieldsmatches','Fieldsnomatches'];
 
    /**
     * InputValidation constructor.
     * @param $contraints
     * @param null $provider
     */
    public function __construct($contraints, $provider=null)
    {
        $this->ParseContraints($contraints);
        $this->setDataProvider($provider);
        return $this;
    }

    /**
     * @param $provider
     * @return $this
     */
    private function setDataProvider($provider)
    {
        if(!$provider)
        {
            $requestMethod = $_SERVER['REQUEST_METHOD'];
            $provider = (strcmp($requestMethod,'POST')==0)? $_POST : $_GET;
        }
        $this->DataProvider = $provider;
        return $this;
    }
    /**
     * @param $fieldname
     * @param $rulename
     * @return mixed
     */
    private function getArguments($fieldname,$rulename)
    {
        if( !is_string($fieldname) OR 
            !is_string($rulename) OR
            !array_key_exists($fieldname,$this->Contraints) OR
            !array_key_exists($rulename,$this->Contraints[$fieldname])
        ) return null;
        $args = $this->Contraints[$fieldname][$rulename];
        if(in_array($rulename,$this->FieldMatchingRules,false))
        {
            $this->MatchingField = $args;
            $args = $this->getFieldValue($this->MatchingField);
        }
        return $args;
    }

    /**
     * @param $fieldname
     * @return mixed
     */
    private function getFieldValue($fieldname)
    {
        if( !is_string($fieldname) OR 
            !Contains::validate($this->DataProvider,$fieldname)
        ) return null;
        if(is_object($this->DataProvider))
            return $this->DataProvider->$fieldname ;
        if(is_array($this->DataProvider))
            return $this->DataProvider[$fieldname];
        return null;
    }
    /**
     *
     */
    public function isOk()
    {
        if(!count($this->Contraints)) return true;
        $FieldsToValidate = array_keys($this->Contraints);
        foreach ($FieldsToValidate as $FieldName):
            $this->Reset();
            if(!Contains::validate($this->DataProvider,$FieldName))
            {
                $this->buildErrorMessage('Contains',$FieldName);
                return false;
            }
            $this->FieldValue = $this->getFieldValue($FieldName);
            if(!$FieldRules = array_keys($this->Contraints[$FieldName]))
                continue;
            foreach($FieldRules as $RuleName)
            {
                if(!$this->AssertIsValid($FieldName,$RuleName))
                return false;
            }
        endforeach;
        return true;
    }

    /**
     * @param $FieldName
     * @param $RuleName
     * @return bool|mixed
     */
    private function AssertIsValid($FieldName,$RuleName)
    {
        if (!$classname = $this->isValidatable($RuleName))
        {
            $this->buildErrorMessage($RuleName,$FieldName);
            return false;
        }
        $this->Arguments = $this->getArguments($FieldName,$RuleName);
        if(!$this->Arguments)
            $passed = call_user_func([$classname, self::VALIDATOR_METHOD],$this->FieldValue);
        else
            $passed = call_user_func_array([$classname, self::VALIDATOR_METHOD],[$this->FieldValue,$this->Arguments]);
        if($passed === false)
            $this->buildErrorMessage($classname,$FieldName);
        return $passed;
    }
    /**
     * @param array $params
     * @return $this
     */
    private function ParseContraints( array $params = [])
    {
        $validation = [];
        foreach ($params AS $fieldName=>$contraints):
            if(is_array($contraints)):
                foreach($contraints AS $RuleName=>$datas)
                {
                    if(!is_numeric($RuleName))
                    {
                        $arguments = is_array($datas)? array_values($datas) :
                            explode($this->ArgsDelimiter,trim($datas,$this->ArgsDelimiter));
                        $arguments = array_map('trim',$arguments);
                        if(sizeof($arguments)<=1)
                            $arguments = $arguments[0];
                        $validation[$fieldName][$RuleName] = $arguments;
                    }
                    else
                        $validation[$fieldName][$datas]=null;
                }
            else:
                $contraints = explode($this->RulesDelimiter,trim($contraints,$this->RulesDelimiter));
                foreach($contraints AS $datas)
                {
                    // 'name'=>'required|human|minlength:3|maxlength:64',
                    if(!strpos($datas,$this->RuleNameMarker))
                        $validation[$fieldName][$datas]=null;
                    else
                    {
                        $datas = trim($datas,$this->RuleNameMarker);
                        $RuleName = substr($datas,0,strpos($datas,$this->RuleNameMarker));
                        $Args = str_replace($RuleName.$this->RuleNameMarker,'',$datas);
                        $arguments = array_map('trim',explode($this->ArgsDelimiter,$Args));
                        if(sizeof($arguments)<=1)
                            $arguments = $arguments[0];
                        $validation[$fieldName][$RuleName] = $arguments;
                    }
                }
            endif;
        endforeach;
        $this->Contraints = $validation;
        return $this;
    }

    /**
     * @param bool|true $flush
     * @return array
     */
    public  function getErrors($flush=true)
    {
        $errors = $this->ErrorsWrapper;
        if($flush) $this->ErrorsWrapper = self::ARR_DEFAULT_VALUE;
        return $errors;
    }

    /**
     * @param $RuleName
     * @return bool|string
     */
    private function isValidatable($RuleName)
    {
        if($RuleName instanceof ValidationInterface)
            return $RuleName;
        $classname = __NAMESPACE__.'\\Rules\\'.ucfirst(trim($RuleName));
        if(!class_exists($classname))
            return false;
        if (!$reflexion = new \ReflectionClass($classname) OR
            !$reflexion->implementsInterface('ValidationInterface')
        )
            return false;
        return $classname;
    }

    /**
     * @param $Rulename
     * @param $fieldName
     * @return $this
     */
    private function buildErrorMessage($Rulename,$fieldName=null)
    {
        if($classname = $this->isValidatable($Rulename))
            $errorCode = call_user_func([$classname,self::MSGCODE_GETTER]);
        else
        $errorCode = 'INVALID_RULE_NAME';
        $statement = ErrorInfos::getStatement($errorCode);
        if(!$fieldName)
            $this->ErrorsWrapper[$fieldName] = sprintf($statement,$Rulename);
        else
            $this->ErrorsWrapper[$fieldName] = sprintf($statement,$fieldName);
        return $this;
    }

    /**
     *
     */
    private function Reset()
    {
        $this->Arguments            = self::STR_DEFAULT_VALUE;
        $this->FieldValue           = self::STR_DEFAULT_VALUE;
        $this->MatchingField        = self::STR_DEFAULT_VALUE;
    }
}
