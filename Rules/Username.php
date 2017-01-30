<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 08/01/2017
 * Time: 06:17
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\Regex;
use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Username
 * @package UltimatePHPValidation\Rules
 */
class Username extends Regex implements ValidationInterface
{
    private static $minlenght = 4;
    private static $maxlenght = 32;
    /**
     * @param $username
     * @param int $maxLength
     * @return bool
     */
    public static function validate($username,$maxLength = 32)
    {
        if($maxLength) $maxLength = preg_replace('/[^0-9]/','',$maxLength);
        if(!$maxLength  or
            !Numeric::validate($maxLength) or
            $maxLength < self::$minlenght or
            $maxLength > self::$maxlenght
        )
            $maxLength = self::$maxlenght;
        self::$maxlenght = $maxLength;
        $regex = '/^\w{'.self::$minlenght.','.self::$maxlenght.'}$/';
        return parent::check($username, $regex);
    }
    private static $CODE = 'INVALID_USERNAME';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}

