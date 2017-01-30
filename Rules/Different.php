<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 19/01/2017
 * Time: 15:16
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Different
 * @package UltimatePHPValidation\Rules
 */
final class Different extends Equals implements ValidationInterface
{
    public static function validate($check, $needle = null){
        return !parent::validate($check, $needle);
    }
    private static $CODE = 'NOT_DIFFERENT';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
