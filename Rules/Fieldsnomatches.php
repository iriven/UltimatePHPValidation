<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 23/01/2017
 * Time: 14:18
 */

namespace UltimatePHPValidation\Rules;

use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Fieldsnomatches
 * @package UltimatePHPValidation\Rules
 */
class Fieldsnomatches extends Equals implements ValidationInterface
{
    private static $CODE = 'F_MUST_NOT_MATCHES';

    public static function validate($check, $OtherFieldValue = null)
    {
        if (!$OtherFieldValue)
        {
            self::$CODE='CF_NOT_FOUND';
            return false;
        }
        return !parent::validate($check, $OtherFieldValue);
    }
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
