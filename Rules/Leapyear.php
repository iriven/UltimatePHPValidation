<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 18/01/2017
 * Time: 15:04
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Leapyear
 * @package UltimatePHPValidation\Rules
 */
class Leapyear implements ValidationInterface
{
    /**
     * @param $year
     * @return bool
     */
    public static function validate($year)
    {
        switch($year):
            case (is_numeric($year)):
                $year = (int) $year;
                break;
            case (is_string($year)):
                $year = (int) date('Y', strtotime($year));
                break;
            case ($year instanceof \DateTime):
                $year = (int) $year->format('Y');
                break;
            default:
                return false;
                break;
            endswitch;
        $date = strtotime(sprintf('%d-02-29', $year));
        return (bool) date('L', $date);
    }
    private static $CODE = 'NOT_LEAP_YEAR';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
