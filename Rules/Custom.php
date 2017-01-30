<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 08/01/2017
 * Time: 04:52
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\Regex;
use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Custom
 * @package UltimatePHPValidation\Rules
 */
class Custom extends Regex implements ValidationInterface
{
     public static function validate($custom,$pattern=null)
     {
         if(!$pattern) return false;
         return parent::check($custom,$pattern);
     }

    /**
     * @var string
     */
    private static $CODE = 'NO_MATCH_PATTERN';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
