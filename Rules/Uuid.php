<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 19/01/2017
 * Time: 11:29
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\Regex;
use UltimatePHPValidation\Core\ValidationInterface;

class Uuid extends Regex implements ValidationInterface
{
    /**
     * Checks that a value is a valid UUID - http://tools.ietf.org/html/rfc4122
     *
     * @param string $uuid Value to check
     * @return bool Success
     */
    public static function validate($uuid){
        $regex = '/^[a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[0-5][a-fA-F0-9]{3}-[089aAbB][a-fA-F0-9]{3}-[a-fA-F0-9]{12}$/';
        return parent::check($uuid, $regex);
    }
    private static $CODE = 'NOT_UUID';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
