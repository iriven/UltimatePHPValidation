<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 18/01/2017
 * Time: 11:37
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\Regex;
use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Price
 * @package UltimatePHPValidation\Rules
 */
class Price extends Regex implements ValidationInterface
{
    /**
     * Check for price validity (including negative price)
     *
     * @param $price
     * @return bool
     */
    public static function validate($price)
    {
        if(!$price) return false;
        $expression = '(?!0,?\d)(?:\d{1,3}(?:([, .])\d{3})?(?:\1\d{3})*|(?:\d+))((?!\1)[,.]\d{1,2})?';
        //symbol position = left
        $regex = '(?!\x{00a2})\p{Sc}?' . $expression ;
        if(parent::check($price,'/^[-]?'.$regex. '$/u')) return true;
        //symbol position = right
        $regex =  $expression . '(?<!\x{00a2})\p{Sc}?';
        return parent::check($price,'/^[-]?'.$regex. '$/u');
    }
    private static $CODE = 'NOT_PRICE';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
