<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 18/01/2017
 * Time: 23:14
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\Regex;
use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Boolean
 * @package UltimatePHPValidation\Rules
 */
class Boolean extends Regex implements ValidationInterface
{
    /**
     * Validate that a field contains a boolean.
     *
     * @param  mixed  $value
     * @return bool
     */
    public  static function validate($value)
    {
        return is_null($value) OR is_bool($value) OR parent::check($value,'/^[0|1]{1}$/ui');
    }
    private static $CODE = 'NOT_BOOLEAN';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
