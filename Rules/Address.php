<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 08/01/2017
 * Time: 07:00
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\Regex;
use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Address
 * @package UltimatePHPValidation\Rules
 */
class Address extends Regex implements ValidationInterface
{
    /**
     * @param $address
     * @return bool
     */
    public static function validate($address)
    {
        $regex='/^[^!<>?=+@{}_$%]*$/ui';
        if(empty($address)) return true;
        return parent::check($address,$regex);
    }
    private static $CODE = 'INVALID_ADDRESS';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
