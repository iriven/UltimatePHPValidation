<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 18/01/2017
 * Time: 14:56
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\Regex;
use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Time
 * @package UltimatePHPValidation\Rules
 */
class Time extends Regex implements ValidationInterface
{
    /**
     * Time validation, determines if the string passed is a valid time.
     * Validates time as 24hr (HH:MM) or am/pm ([H]H:MM[a|p]m)
     * Does not allow/validate seconds.
     *
     * @param string|\DateTime $time a valid time string/object
     * @return bool Success
     */
    public static function validate($time)
    {
        if ($time instanceof \DateTime)
            return true;
        $regex = '%^((0?[1-9]|1[012])(:[0-5]\d){0,2} ?([AP]M|[ap]m))$|^([01]\d|2[0-3])(:[0-5]\d){0,2}$%';
        return parent::check($time, $regex);
    }
    private static $CODE = 'NOT_VALID_TIME';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
