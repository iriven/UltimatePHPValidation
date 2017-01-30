<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 08/01/2017
 * Time: 04:20
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\Luhn;
use UltimatePHPValidation\Core\ValidationInterface;

class Ccnum extends Luhn implements ValidationInterface
{
    private static $PATTERNS =  array(
        'all' => array(
            'amex'		=> '/^3[4|7]\\d{13}$/',
            'bankcard'	=> '/^56(10\\d\\d|022[1-5])\\d{10}$/',
            'diners'	=> '/^(?:3(0[0-5]|[68]\\d)\\d{11})|(?:5[1-5]\\d{14})$/',
            'disc'		=> '/^(?:6011|650\\d)\\d{12}$/',
            'electron'	=> '/^(?:417500|4917\\d{2}|4913\\d{2})\\d{10}$/',
            'enroute'	=> '/^2(?:014|149)\\d{11}$/',
            'jcb'		=> '/^(3\\d{4}|2100|1800)\\d{11}$/',
            'maestro'	=> '/^(?:5020|6\\d{3})\\d{12}$/',
            'mc'		=> '/^5[1-5]\\d{14}$/',
            'solo'		=> '/^(6334[5-9][0-9]|6767[0-9]{2})\\d{10}(\\d{2,3})?$/',
            'switch'	=> '/^(?:49(03(0[2-9]|3[5-9])|11(0[1-2]|7[4-9]|8[1-2])|36[0-9]{2})\\d{10}(\\d{2,3})?)|(?:564182\\d{10}(\\d{2,3})?)|(6(3(33[0-4][0-9])|759[0-9]{2})\\d{10}(\\d{2,3})?)$/',
            'visa'		=> '/^4\\d{12}(\\d{3})?$/',
            'voyager'	=> '/^8699[0-9]{11}$/'
        ),
        'fast' => '/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6011[0-9]{12}|3(?:0[0-5]|[68][0-9])[0-9]{11}|3[47][0-9]{13})$/'
    );
    /**
     * Validation of credit card numbers.
     * Returns true if $ccnum is in the proper credit card format.
     *
     * @param string|array $ccnum credit card number to validate
     * @param string|array $type 'all' may be passed as a sting, defaults to fast which checks format of most major credit cards
     *    if an array is used only the values of the array are checked.
     *    Example: array('amex', 'bankcard', 'maestro')
     * @return boolean Success
     */
    public static function validate($ccnum, $type = 'fast') {
        $hypens = ['-', ' '];
        $ccnum = str_replace($hypens, '', $ccnum);
        if (!boolval(preg_match('/.*[1-9].*/', $ccnum))) return false;
        $length=mb_strlen($ccnum);
        if ($length < 13) return false;
        switch($type):
            case (is_array($type)):
                foreach ($type as $cctype)
                {
                    $regex = self::$PATTERNS['all'][strtolower($cctype)];
                    if (Custom::validate($ccnum, $regex))
                        return parent::check($ccnum,$length);
                }
                break;
            case 'all':
                foreach (self::$PATTERNS['all'] as $regex)
                {
                    if (Custom::validate($ccnum, $regex))
                        return parent::check($ccnum,$length);
                }
                break;
            default:
                $regex = self::$PATTERNS['fast'];
                if (Custom::validate($ccnum, $regex))
                    return parent::check($ccnum,$length);
                break;
        endswitch;
        return false;
    }
    private static $CODE = 'NOT_A_VALID_CCNUM';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
