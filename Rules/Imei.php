<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 18/01/2017
 * Time: 15:38
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Imei
 * @package UltimatePHPValidation\Rules
 */
class Imei implements ValidationInterface
{

    const IMEI_SIZE = 15;
    /**
     * @see https://en.wikipedia.org/wiki/International_Mobile_Station_Equipment_Identity
     *
     * @param string $imei
     *
     * @return bool
     */
    public static function validate($imei)
    {
        if (!is_scalar($imei)) 
            return false;
        $numbers = preg_replace('/\D/', '', $imei);
        if (mb_strlen($numbers) != self::IMEI_SIZE) 
            return false;
        $sum = 0;
        for ($position = 0; $position < (self::IMEI_SIZE - 1); ++$position) 
        {
            $number = $numbers[$position] * (($position % 2) + 1);
            $sum += ($number % 10) + intval($number / 10);
        }
        return (ceil($sum / 10) * 10) - $sum == $numbers[14];
    }
    private static $CODE = 'NOT_IMEI';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
