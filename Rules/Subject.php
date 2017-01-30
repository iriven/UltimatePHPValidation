<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 26/01/2017
 * Time: 19:26
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\Regex;
use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Subject
 * @package UltimatePHPValidation\Rules
 */
class Subject extends Regex implements ValidationInterface
{
    /**
     * Check for e-mail subject validity
     *
     * @param $subject
     * @return bool
     */
    public static function validate($subject)
    {
        $regex='/^[^<>;{}]*$/ui';
        if(empty($subject)) return true;
        return parent::check($subject,$regex);
    }
    private static $CODE = 'NOT_VALID_SUBJECT';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
