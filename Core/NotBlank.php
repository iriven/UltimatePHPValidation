<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 08/01/2017
 * Time: 05:27
 */

namespace UltimatePHPValidation\Core;

/**
 * Class NotEmpty
 * @package UltimatePHPValidation\Core
 */
abstract class NotBlank extends Regex
{
    /**
     * @param $value
     * @return bool
     */
    public static function check($value)
    {
        if(is_null($value)) return false;
        if(is_scalar($value)) $value = trim($value);
        if (empty($value) && $value != '0' && $value !== 0)	return false;
        return parent::check($value,'/[^\s]+/m');
    }
}
