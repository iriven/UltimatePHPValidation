<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 18/01/2017
 * Time: 10:52
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Contains
 * @package UltimatePHPValidation\Rules
 */
class Contains implements ValidationInterface
{
    /**
     * @param mixed $context
     * @param null $needle
     * @return bool
     */
    public static  function validate($context, $needle=null)
    {
        if(is_object($context))
            return isset($context->$needle);
        if (is_string($context) and strpos($context,','))
            $context = array_map('strval', explode(',', $context));
        if (is_array($context))
            return in_array($needle, $context);
        return false !== mb_stripos($context, $needle, 0, mb_detect_encoding($context));
    }
    private static $CODE = 'NOT_FOUND';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
