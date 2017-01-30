<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 19/01/2017
 * Time: 08:46
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Charset
 * @package UltimatePHPValidation\Rules
 */
class Charset implements ValidationInterface
{
    /**
     * @param $charset
     * @param array $charsetList
     * @return bool
     */
    public static function validate($charset,$charsetList=[])
    {
        $available = mb_list_encodings();
        $charsetList = is_array($charsetList) ? $charsetList : [$charsetList];
        $charsetList = array_filter($charsetList, function ($c) use ($available) {
            return in_array($c, $available, true);
        });
        if (!$charsetList)
        {
            self::$CODE = 'INVALID_CHARSET_LIST';
            return false;
        }
        $detectedEncoding = mb_detect_encoding($charset, $charsetList, true);
        return in_array($detectedEncoding, $charsetList, true);
    }

    /**
     * @var string
     */
    private static $CODE = 'INVALID_CHARSET';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
