<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 18/01/2017
 * Time: 11:14
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\Regex;
use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Email
 * @package UltimatePHPValidation\Rules
 */
class Email extends Regex implements ValidationInterface
{
    /**
     * @param $email
     * @return bool
     */
    public static function validate($email)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            return false;
        $hostPattern = '(?:[_\p{L}0-9][-_\p{L}0-9]*\.)*(?:[\p{L}0-9][-\p{L}0-9]{0,62})\.(?:(?:[a-z]{2}\.)?[a-z]{2,})';
        if (preg_match('/@(' . $hostPattern. ')$/i', $email, $matches))
        {
            if (function_exists('getmxrr') && getmxrr($matches[1], $mxhosts))
                return true;
            if (function_exists('checkdnsrr') && checkdnsrr($matches[1], 'MX'))
                return true;
            return is_array(gethostbynamel($matches[1]));
        }
        return false;
    }
    private static $CODE = 'NOT_VALID_EMAIL';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
