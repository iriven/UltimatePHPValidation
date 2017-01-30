<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 19/01/2017
 * Time: 15:09
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Between
 * @package UltimatePHPValidation\Rules
 */
final class Between extends Range implements ValidationInterface
{
    public static function validate($num, $bound=['min' => null, 'max' => null, 'inclusive' => true])
    {
        return parent::validate($num, $bound);
    }
}
