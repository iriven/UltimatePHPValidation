<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 07/01/2017
 * Time: 14:14
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Ipaddress
 * @package UltimatePHPValidation\Rules
 */
class Ipaddress implements ValidationInterface
{
    /**
     * @param $ip
     * @return bool
     */
    public static function validate($ip)
    {
        $flags = FILTER_FLAG_NO_PRIV_RANGE|FILTER_FLAG_NO_RES_RANGE;
        return false !== filter_var($ip, FILTER_VALIDATE_IP, ['flags' => $flags]);
    }
    private static $CODE = 'NOT_VALID_IP';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
