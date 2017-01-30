<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 19/01/2017
 * Time: 11:35
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\Regex;
use UltimatePHPValidation\Core\ValidationInterface;

class Coordinate extends Regex implements ValidationInterface
{
    private static $code = 'NOT_GEO_COORDINATE';
    /**
     * Validates a geographic coordinate.
     *
     * Supported formats:
     *
     * - `<latitude>, <longitude>` Example: `-25.274398, 133.775136`
     *
     * - `format` - By default `both`, can be `long` and `lat` as well to validate
     *   only a part of the coordinate.
     *
     * @param string $check Geographic location as string
     * @param null|string $format Options for the validation logic.
     * @return bool
     */
    public static function validate($check,$format = 'both')
    {
        switch($format):
            case 'long':
            case 'longitude':
            $pattern = '/^[-+]?(180(\.0+)?|((1[0-7]\d)|([1-9]?\d))(\.\d+)?)$/';
            self::$code = 'NOT_LONG_COORDINATE';
                break;
            case 'lat':
            case 'latitude':
                $pattern = '/^[-+]?([1-8]?\d(\.\d+)?|90(\.0+)?)$/';
            self::$code = 'NOT_LAT_COORDINATE';
                break;
            default:
                $pattern = '/^[-+]?([1-8]?\d(\.\d+)?|90(\.0+)?),\s*[-+]?(180(\.0+)?|((1[0-7]\d)|([1-9]?\d))(\.\d+)?)$/';
                break;
            endswitch;
        return parent::check($check,$pattern);
    }
    /**
     * @return string
     */
    public static function getCode(){return self::$code;}
}
