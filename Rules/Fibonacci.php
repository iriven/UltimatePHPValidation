<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 18/01/2017
 * Time: 16:18
 */

namespace UltimatePHPValidation\Rules;


use Ressources\Systems\Libraries\Helpers\Form\Validation\Rules\Numeric;
use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Fibonacci
 * @package UltimatePHPValidation\Rules
 */
class Fibonacci extends Numeric implements ValidationInterface
{
    public static function validate($input)
    {
        if (!parent::validate($input)) return false;
        $sequence = [0, 1];
        $position = 1;
        while ($input > $sequence[$position])
        {
            ++$position;
            $sequence[$position] = $sequence[$position - 1] + $sequence[$position - 2];
        }
        return $sequence[$position] === (int) $input;
    }
    private static $CODE = 'NOT_FIBONNACI_NUM';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
