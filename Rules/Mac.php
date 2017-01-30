<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 18/01/2017
 * Time: 10:37
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\Regex;
use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Mac
 * @package UltimatePHPValidation\Rules
 */
class Mac extends Regex implements ValidationInterface
{
    /**
     * MAC address validator.
     *
     * Could be separated by hyphens or colons.
     * Could be both lowercase or uppercase letters.
     * Mixed upper/lower cases and hyphens/colons are not allowed.
     *
     * @link http://en.wikipedia.org/wiki/MAC_address#Notational_conventions
     *
     * @param string $MacAddress
     * @return bool
     */
    public static function validate($MacAddress)
    {
        $regex = '/^([0-9a-fA-F][0-9a-fA-F]:){5}([0-9a-fA-F][0-9a-fA-F])$/';
        if(empty($MacAddress)) return false;
        return parent::check($MacAddress,$regex);
    }
    private static $CODE = 'NOT_MAC_ADDR';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
