<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 08/01/2017
 * Time: 07:11
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

class Date implements ValidationInterface
{
    /**
     * Check for date validity
     *
     * @param string $value Date to validate
     * @param string $format
     * @return boolean Validity is ok or not
     */
    public static function validate($value,$format=null)
    {
        if ($value instanceof \DateTime) return true;
        if (!is_string($value)) return false;
        if(!$format){
            $regex = '/^([0-9]{4})-((?:0?[0-9])|(?:1[0-2]))-((?:0?[0-9])|(?:[1-2][0-9])|(?:3[01]))( [0-9]{2}:[0-9]{2}:[0-9]{2})?$/';
            if (!preg_match($regex, $value, $matches))   return false;
            return checkdate((int)$matches[2], (int)$matches[3], (int)$matches[1]);
        }
        // $format = 'Y-m-d H:i:s';
        if (!$date = \DateTime::createFromFormat($format, $value))
            return false;
        return $value === $date->format($format);

    }
    private static $CODE = 'NOT_VALID_DATE';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
