<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 18/01/2017
 * Time: 10:20
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\Regex;
use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Human name validation
 * Class Name
 * @package UltimatePHPValidation\Rules
 */
class Name extends Regex implements ValidationInterface
{
    /**
     * Check for Human name validity
     * @param $name
     * @return bool
     */

    public static function validate($name){
        $regex = '/^[^0-9!<>,;?=+()@#"°{}_$%:]*$/ui';
        return parent::check($name,$regex);
    }
    private static $CODE = 'NOT_HUMAN_NAME';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
