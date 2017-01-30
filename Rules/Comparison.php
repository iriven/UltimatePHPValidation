<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 25/01/2017
 * Time: 15:07
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Comparison
 * @package UltimatePHPValidation\Rules
 */
class Comparison extends Numeric implements ValidationInterface
{
    /**
     * Used to compare 2 numeric values.
     *
     * @param $value
     * @param array $params
     * @return bool
     */
    public static function validate($value, $params =[])
    {
        $whiteListed = ['greater','less','greaterorequal','lessorequal','equal','notequal','different','>','<','>=','<=','==','=','!=','<>'];
        $defaults = ['=',null];
        $params = is_array($params)?array_values($params):[$params];
        $params += $defaults;
        list($operator,$expected)= $params;
        $operator = str_replace([' ', "\t", "\n", "\r", "\0", "\x0B"], '', strtolower($operator));
        if(!$operator OR !Contains::validate($whiteListed,$operator))
        {
            self::$CODE = 'NO_OPERATOR_FOUND';
            return false;
        }
        if (!parent::validate($value) OR
            !parent::validate($expected) OR
            ((float)$value != $value))
        {
            self::$CODE = 'INVALID_ARGS';
            return false;
        }
        switch ($operator)
        {
            case 'greater':
            case '>':
                if ($value > $expected) return true;
                self::$CODE = 'NOT_GREATER_THAN';
                break;
            case 'less':
            case '<':
                if ($value < $expected) return true;
                self::$CODE = 'NOT_LESS_THAN';
                break;
            case 'greaterorequal':
            case '>=':
                if ($value >= $expected) return true;
                self::$CODE = 'NOT_GREATER_EQUALS';
                break;
            case 'lessorequal':
            case '<=':
                if ($value <= $expected) return true;
                self::$CODE = 'NOT_LESS_EQUALS';
                break;
            case 'notequal':
            case 'different':
            case '<>':
            case '!=':
                if ($value != $expected) return true;
                self::$CODE = 'NOT_DIFFERENT';
                break;
            default:
                if ($value == $expected) return true;
                break;
        }
        return false;
    }
    private static $CODE = 'NOT_EQUALS';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
    //self::$CODE = 'NOT_OPERATOR_FOUND';// = 'You must define the $operator parameter for Comparison::validate()';
}
