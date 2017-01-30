<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 19/01/2017
 * Time: 12:00
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Latitude
 * @package UltimatePHPValidation\Rules
 */
class Latitude extends Coordinate implements ValidationInterface
{
    public static function validate($latitude)
    {
        return parent::validate($latitude,$format='lat');
    }
}
