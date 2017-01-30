<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 08/01/2017
 * Time: 06:50
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\Regex;
use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Searchquery
 * @package UltimatePHPValidation\Rules
 */
class Searchquery extends Regex implements ValidationInterface
{
    /**
     * @param $search
     * @return bool
     */
    public static function validate($search)
    {
        $regex = '/^[^<>;=#{}]{0,64}$/u';
        return parent::check($search,$regex);
    }
    private static $CODE = 'INVALID_SEARCH_QUERY';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
