<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 08/01/2017
 * Time: 04:46
 */

namespace UltimatePHPValidation\Core;

/**
 * Class Regex
 * @package UltimatePHPValidation\Core
 */
abstract class Regex
{
    /**
     * @param $value
     * @param $pattern
     * @return bool
     */
    public static function check($value, $pattern)
    {
        if(is_scalar($value) or !is_string($pattern)) return false;
        if((preg_match($pattern, $value)!==false))  return true;
        return false;
    }
}
