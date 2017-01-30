<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 19/01/2017
 * Time: 08:30
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Alpha
 * @package UltimatePHPValidation\Rules
 */
class Alpha implements ValidationInterface
{
    /**
     * @param $string
     * @return bool
     */
    public static function validate($string)
    {
        $string = preg_replace('/\s/', '', $string);
        return ctype_alpha($string);
    }
    private static $CODE = 'NOT_ALPHA';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
