<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 18/01/2017
 * Time: 10:47
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\Regex;
use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Hexcolor
 * @package UltimatePHPValidation\Rules
 */
class Hexcolor extends Regex implements ValidationInterface
{
    /**
     * @param $color
     * @return bool
     */
    public static  function validate($color)
    {
        $regex='/^(#[0-9A-Fa-f]{6}|[[:alnum:]]*)$/ui';
        if(empty($color)) return false;
        return parent::check($color,$regex);
    }

    /**
     * @var string
     */
    private static $CODE = 'NOT_VALID_COLOR';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
