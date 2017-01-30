<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 19/01/2017
 * Time: 09:52
 */

namespace UltimatePHPValidation\Rules;


use Ressources\Systems\Libraries\Helpers\Form\Validation\Rules\Numeric;
use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Greater
 * @package UltimatePHPValidation\Rules
 */
class Greater extends Comparison implements ValidationInterface
{
    /**
     * @param $value
     * @param array $params
     * @return bool
     */
    public static function validate($value,$params=[])
    {
        $defaults = ['0',false];
        $params = is_array($params)?array_values($params):[$params];
        $params += $defaults;
        list($minValue,$inclusive) = $params;
        if (!Boolean::validate($inclusive) OR !Numeric::validate($minValue))
        {
            self::$CODE = 'INVALID_ARGS';
            return false;
        }
        $operator = $inclusive? '>=' : '>';
       return parent::validate($value,[$operator,$minValue]);
    }
    private static $CODE = null;
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE ?: parent::getCode();}
}
