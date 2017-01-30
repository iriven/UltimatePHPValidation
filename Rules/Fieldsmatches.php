<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 19/01/2017
 * Time: 14:22
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Fieldsmatches
 * @package UltimatePHPValidation\Rules
 */
class Fieldsmatches extends Equals implements ValidationInterface
{
    private static $CODE = 'F_MUST_MATCHES';

    public static function validate($check, $OtherFieldValue = null)
    {
        if (!$OtherFieldValue)
        {
            self::$CODE='CF_NOT_FOUND';
            return false;
        }
        return parent::validate($check, $OtherFieldValue);
    }
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
