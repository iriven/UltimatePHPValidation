<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 18/01/2017
 * Time: 09:43
 */

namespace UltimatePHPValidation\Rules;


use Ressources\Extensions\Plugins\Iso\Datas\Iso3166DataProvider;
use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Countrycode
 * @package UltimatePHPValidation\Rules
 */
class Countrycode implements ValidationInterface
{
    /**
     * @param $countrycode
     * @return bool
     * @throws \Exception
     */
    public static function validate($countrycode)
    {
        $ISO = new Iso3166DataProvider();
        if(@$ISO->getCountryInfos($countrycode,true)) return true;
        return false;
    }

    private static $CODE = 'NOT_COUNTRY_ISOCODE';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
