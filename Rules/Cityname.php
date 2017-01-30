<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 08/01/2017
 * Time: 07:05
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\Regex;
use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Cityname
 * @package UltimatePHPValidation\Rules
 */
class Cityname extends Regex implements ValidationInterface
{
    /**
     * Check for city name validity
     *
     * @param $value
     * @return bool
     */
    public static function validate($value)
    {
        $regex = '/^[^!<>;?=+@#"°{}_$%]*$/ui';
        if(empty($value)) return true;
        return parent::check($value,$regex);
    }

    private static $CODE = 'INVALID_CITYNAME';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
