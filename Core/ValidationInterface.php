<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 07/01/2017
 * Time: 14:00
 */

namespace UltimatePHPValidation\Core;


interface ValidationInterface
{
    public static function validate($value);
    public static function getCode();

}
