<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 08/01/2017
 * Time: 06:29
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\Regex;
use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Password
 * @package UltimatePHPValidation\Rules
 */
class Password extends Regex implements ValidationInterface
{
    private static $minLength = 8;

    /**
     * @param $password
     * @param int $minLength
     * @return bool
     */
    public static function validate($password,$minLength=8)
    {
        if(!is_string($password)) return false;
        if($minLength) $minLength = preg_replace('/[^0-9]/','',$minLength);
        if(!$minLength  or
            !Numeric::validate($minLength) or
            $minLength < self::$minLength
        )
            $minLength = self::$minLength;
        self::$minLength = $minLength;
        $regex = '`^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9]).{'.self::$minLength.',254}$`';
        return parent::check($password,$regex);
    }
    private static $CODE = 'INVALID_PASSWORD';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
;
