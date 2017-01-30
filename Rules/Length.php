<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 23/01/2017
 * Time: 15:38
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Length
 * @package UltimatePHPValidation\Rules
 */
final class Length extends Range implements ValidationInterface
{

    public static function validate($value, $bound=['min' => null, 'max' => null, 'inclusive' => true])
    {
        if(!$value) return false;
        $strlen = function_exists('mb_strlen')? mb_strlen($value, mb_detect_encoding($value)): strlen($value);
        if (parent::validate($strlen,$bound))
            return true;
        self::$CODE = 'LENGTH_NOT_IN_RANGE';
        return false;
    }

    private static $CODE = null;
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE ?:parent::getCode();}

}
