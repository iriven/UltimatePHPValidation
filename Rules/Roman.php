<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 19/01/2017
 * Time: 10:26
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\Regex;
use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Roman
 * @package UltimatePHPValidation\Rules
 */
class Roman extends Regex implements ValidationInterface
{
    public static function validate($string){
        $pattern = '/^M{0,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/';
        return parent::check($string,$pattern);
    }
    private static $CODE = 'NOT_ROMAN';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
