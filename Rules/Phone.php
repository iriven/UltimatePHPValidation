<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 18/01/2017
 * Time: 16:00
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\NotBlank;
use UltimatePHPValidation\Core\Regex;
use UltimatePHPValidation\Core\ValidationInterface;

class Phone extends Regex implements ValidationInterface
{
    public static function validate($phone)
    {
        if(!NotBlank::check($phone))return false;
        $regex = '/^[+]?([\d]{0,3})?[\(\.\-\s]?(([\d]{1,3})[\)\.\-\s]*)?(([\d]{3,5})[\.\-\s]?([\d]{4})|([\d]{2}[\.\-\s]?){4})$/';
        return parent::check($phone,$regex);
    }
    private static $CODE = 'NOT_VALID_PHONE';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
