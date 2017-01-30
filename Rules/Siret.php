<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 07/01/2017
 * Time: 14:31
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

class Siret extends Siren  implements ValidationInterface
{
    public static function validate($insee,$length=14)
    {
        return parent::validate($insee, $length);
    }
    private static $CODE = 'NOT_SIRET';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
