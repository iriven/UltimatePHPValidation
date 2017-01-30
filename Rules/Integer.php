<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 18/01/2017
 * Time: 11:29
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\Regex;
use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Integer
 * @package UltimatePHPValidation\Rules
 */
class Integer extends Regex implements ValidationInterface
{
    /**
     * @param mixed $integer
     * @return bool
     */
    public static function validate($integer)
    {
        if (!is_scalar($integer) || is_float($integer)) return false;
        if (is_int($integer)) return true;
        $regex = '/^-?[0-9]+$/';
        return parent::check($integer,$regex);
    }
    private static $CODE = 'NOT_INTEGER';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
