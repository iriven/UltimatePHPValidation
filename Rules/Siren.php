<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 07/01/2017
 * Time: 14:28
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Siren
 * @package UltimatePHPValidation\Rules
 */
class Siren implements ValidationInterface
{
    /**
     * @param $insee
     * @param int $length
     * @return bool
     */
    public static function validate($insee, $length = 9)
    {
        if (!is_numeric($insee))    return false;
        if (strlen($insee) != $length)  return false;
        $sum = 0;
        for ($i = 0; $i < $length; ++$i) 
        {
            $indice = ($length - $i);
            $tmp = (2 - ($indice % 2)) * $insee[$i];
            if ($tmp >= 10)    $tmp -= 9;
            $sum += $tmp;
        }
        return ($sum % 10) == 0;
    }
    private static $CODE = 'NOT_SIREN';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
