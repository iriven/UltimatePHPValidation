<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 08/01/2017
 * Time: 05:39
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

class Vat implements ValidationInterface
{

    /**
     * Regular expression patterns per country code.
     *
     * @var array
     *
     * @link http://ec.europa.eu/taxation_customs/vies/faq.html?locale=lt#item_11
     * @link http://www.iecomputersystems.com/ordering/eu_vat_numbers.htm
     * @link http://en.wikipedia.org/wiki/VAT_identification_number
     */
    public static $patterns = array(
        'AT' => 'U[A-Z\d]{8}',
        'BE' => '0\d{9}',
        'BG' => '\d{9,10}',
        'CY' => '\d{8}[A-Z]',
        'CZ' => '\d{8,10}',
        'DE' => '\d{9}',
        'DK' => '(\d{2} ?){3}\d{2}',
        'EE' => '\d{9}',
        'EL' => '\d{9}',
        // ES: The first and last characters may be alpha or numeric; but they may not both be numeric:
        'ES' => '[A-Z]\d{7}[A-Z]|\d{8}[A-Z]|[A-Z]\d{8}',
        'FI' => '\d{8}',
        'FR' => '([A-Z]{2}|\d{2})\d{9}',
        'GB' => '\d{9}|\d{12}|(GD|HA)\d{3}',
        'HU' => '\d{8}',
        // IE: Seven digits and one last letter or six digits and two letters (second & last)
        'IE' => '\d{7}[A-Z]|\d[A-Z]\d{5}[A-Z]',
        'IT' => '\d{11}',
        'LT' => '(\d{9}|\d{12})',
        'LU' => '\d{8}',
        'LV' => '\d{11}',
        'MT' => '\d{8}',
        // NL: The 10th position following the prefix is always "B".
        'NL' => '\d{9}B\d{2}',
        'PL' => '\d{10}',
        'PT' => '\d{9}',
        'RO' => '\d{2,10}',
        'SE' => '\d{12}',
        'SI' => '\d{8}',
        'SK' => '\d{10}',
        'AL' => '[KJ]\d{8}L',
        'AU' => '\d{9}',
        'BY' => '\d{9}',
        'HR' => '\d{11}',
        'CA' => '[A-Z\d]{15}',
        'NO' => '\d{9}MVA',
        'PH' => '\d{12}',
        'RU' => '(\d{10}|\d{12})',
        'CH' => '(\d{6}|E\d{9}(TVA|MWST|IVA))',
        'TR' => '\d{10}',
        'UA' => '\d{12}',
        'AR' => '\d{11}',
        'CL' => '\d{8}-\d',
        'CO' => '\d{10}',
        'EC' => '\d{13}',
        'GT' => '\d{7}-\d',
        'MX' => '\d{3} \d{6} \d{3}',
        'VE' => '[JGVE]-\d{8}-?\d',
    );

    /**
     * Checks if $vat is a valid, European Union VAT number.
     *
     * @param $vat
     * @param null $countryCode
     * @return bool
     */
    public static function validate($vat,$countryCode=null)
    {
        if (!$vat) return false;
        $hypens = [' ', '.', '-', ',', ', '];
        $vat= str_replace($hypens, '', trim($vat));
        $countryCode = $countryCode?:substr($vat, 0, 2);
        if ( !isset(self::$patterns[$countryCode]))
            return false;
        $vat = substr($vat, 2);
        if (0 === preg_match('/^'.self::$patterns[$countryCode].'$/', $vat))
            return false;
        return true;
    }
    private static $CODE = 'NOT_VAT';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
