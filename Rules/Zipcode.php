<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 19/01/2017
 * Time: 00:16
 */

namespace UltimatePHPValidation\Rules;


use Ressources\Extensions\Plugins\Iso\Datas\Iso3166DataProvider;
use UltimatePHPValidation\Core\Regex;
use UltimatePHPValidation\Core\ValidationInterface;

class Zipcode extends Regex implements ValidationInterface
{
    public static function validate($zipcode, $countryCode='fr'){
        $data = new Iso3166DataProvider();
        if(!$regex = $data->getCountryPostalCodePattern($countryCode))
            return false;
        if($regex ==='n/a') $regex = '/^$/';
        return parent::check($zipcode,$regex);
    }
    private static $CODE = 'NOT_ZIPCODE';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
