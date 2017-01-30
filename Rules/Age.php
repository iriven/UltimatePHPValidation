<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 24/01/2017
 * Time: 22:55
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

class Age extends Comparison implements ValidationInterface
{
    /**
     * @param $BirthDate
     * @param array $params
     * @return bool
     */
    public static function validate($BirthDate, $params = [])
    {
        $defaults = ['15',true];
        $params = is_array($params)?array_values($params):[$params];
        $params += $defaults;
        list($AgeMin, $inclusive) = $params;
        if (!Boolean::validate($inclusive) OR
            !Numeric::validate($AgeMin))
        {
            self::$CODE = 'INVALID_ARGS';
            return false;
        }
        $cdate = new \DateTime(date('Y-m-d', strtotime($BirthDate)));
        $today = new \DateTime(date('d-m-Y'));
        $interval = $cdate->diff($today);
        $age = $interval->y;
        $Operator = $inclusive? '>=':'>';
        return parent::validate($age,[$Operator,$AgeMin, $inclusive]);
    }
    private static $CODE = 'TOO_YOUNG';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
