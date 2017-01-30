<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 18/01/2017
 * Time: 09:31
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\Regex;
use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Alnum
 * @package UltimatePHPValidation\Rules
 */
class Alnum extends Regex implements ValidationInterface
{
    /**
     * Checks that a string contains only integer or letters
     * @param $input
     * @return bool
     */
    public static function validate($input)
    {
        $regex='/^[\p{Ll}\p{Lm}\p{Lo}\p{Lt}\p{Lu}\p{Nd}]+$/Du';
        if (empty($input) && $input!= '0')
            return false;
        return parent::check($input,$regex);
    }
    private static $CODE = 'NOT_ALNUM';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
