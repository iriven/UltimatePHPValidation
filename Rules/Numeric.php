<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 08/01/2017
 * Time: 05:22
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Numeric
 * @package UltimatePHPValidation\Rules
 */
class Numeric implements ValidationInterface
{
    /**
     * @param $num
     * @return mixed
     */
    public static function validate($num)
    {
        return is_numeric($num);
    }
    private static $CODE = 'NOT_NUMERIC';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
