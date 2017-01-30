<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 07/01/2017
 * Time: 14:04
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Bban
 * @package UltimatePHPValidation\Rules
 */
class Bban implements ValidationInterface
{
    /**
     * @param $bban
     * @return bool
     */
    public static function validate($bban)
    {
        if (mb_strlen($bban) !== 23) {
            return false;
        }
        $key = substr($bban, -2);
        $bank = substr($bban, 0, 5);
        $branch = substr($bban, 5, 5);
        $account = substr($bban, 10, 11);
        $account = strtr(
            $account,
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '12345678912345678923456789'
        );
        return 97 - bcmod(89 * $bank + 15 * $branch + 3 * $account, 97) === (int) $key;
    }
    private static $CODE = 'NOT_BBAN_NUM';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
