<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 08/01/2017
 * Time: 05:33
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\NotBlank;
use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Required
 * @package UltimatePHPValidation\Rules
 */
class Required extends NotBlank implements ValidationInterface
{
    /**
     * @param $value
     * @return bool
     */
    public static function validate($value)
    {
        if(parent::check($value)) return true;
        self::$CODE = 'EMPTY_VALUE';
        return false;
    }
    private static $CODE = null;
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
