<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 18/01/2017
 * Time: 11:08
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\Regex;
use UltimatePHPValidation\Core\ValidationInterface;

class Filename extends Regex implements ValidationInterface
{
    /**
     * Any platform file name validation
     * @param $value
     * @return bool
     */
    public static function validate($value)
    {
        $regex = '#^(([a-zA-Z]:|\\)\\)?(((\.)|(\.\.)|([^\\/:*?"|<>. ](([^\\/:*?"|<>. ])|([^\\/:*?"|<>]*[^\\/:*?"|<>. ]))?))\\)*[^\\/:*?"|<>. ](([^\\/:*?"|<>. ])|([^\\/:*?"|<>]*[^\\/:*?"|<>. ]))?$#';
        if(empty($value)) return false;
        return  parent::check($value, $regex);
    }
    private static $CODE = 'INVALID_FILENAME';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
