<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 27/01/2017
 * Time: 12:43
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Isbn
 * @package UltimatePHPValidation\Rules
 */
class Isbn implements ValidationInterface
{

    /**
     * L'International Standard Book Number (ISBN) validation
     *
     * @param string   $isbn
     * @param int|null $format 10 or 13. Leave empty for both.
     *
     * @return bool
     */
    public static function validate($isbn, $format = null)
    {
        if ($format !== null && !in_array($format, [10, 13], true)) {
            throw new \InvalidArgumentException('ISBN type option must be 10 or 13');
        }
        $isbn = str_replace(' ', '', $isbn);
        $isbn = str_replace('-', '', $isbn); // this is a dash
        $isbn = str_replace('?', '', $isbn); // this is an authentic hyphen
        switch($format)
        {
            case 10:
                if(self::validateIsbn10($isbn)) return true;
                break;
            case 13:
                if(self::validateIsbn13($isbn)) return true;
                break;
            default:
                if(self::validateIsbn10($isbn) || self::validateIsbn13($isbn)) return true;
                break;
        }
        self::$CODE = 'NOT_VALID_ISBN';
        return false;
    }
    private static function validateIsbn10($isbn10)
    {
        if (strlen($isbn10) != 10) {
            return false;
        }
        if (!preg_match('/\\d{9}[0-9xX]/i', $isbn10)) {
            return false;
        }
        $check = 0;
        for ($i = 0; $i < 10; ++$i) {
            if ($isbn10[$i] == 'X') {
                $check += 10 * intval(10 - $i);
            }
            $check += intval($isbn10[$i]) * intval(10 - $i);
        }
        return $check % 11 == 0;
    }
    private static function validateIsbn13($isbn13)
    {
        if (strlen($isbn13) != 13 || !ctype_digit($isbn13)) {
            return false;
        }
        $check = 0;
        for ($i = 0; $i < 13; $i += 2) {
            $check += $isbn13[$i];
        }
        for ($i = 1; $i < 12; $i += 2) {
            $check += $isbn13[$i] * 3;
        }
        return $check % 10 == 0;
    }
    private static $CODE = null;
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
