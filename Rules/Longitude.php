<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 19/01/2017
 * Time: 12:03
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Longitude
 * @package UltimatePHPValidation\Rules
 */
class Longitude extends Coordinate implements ValidationInterface
{
    public static function validate($longitude)
    {
        return parent::validate($longitude,$format='long');
    }
}
