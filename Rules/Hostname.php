<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 18/01/2017
 * Time: 11:23
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\Regex;
use UltimatePHPValidation\Core\ValidationInterface;

class Hostname extends Regex implements ValidationInterface
{
    /**
     * @param $hostname
     * @return bool
     */
    public static function validate($hostname)
    {
        $regex='/(?:[_\p{L}0-9][-_\p{L}0-9]*\.)*(?:[\p{L}0-9][-\p{L}0-9]{0,62})\.(?:(?:[a-z]{2}\.)?[a-z]{2,})$/i';
        if(empty($hostname)) return false;
        return  parent::check($hostname, $regex);
    }
    private static $CODE = 'NOT_HOSTNAME';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
