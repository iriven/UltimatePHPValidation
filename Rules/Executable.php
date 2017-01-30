<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 18/01/2017
 * Time: 11:05
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Executable
 * @package UltimatePHPValidation\Rules
 */
class Executable extends File implements ValidationInterface
{
    public static function validate($file)
    {
        if ($file instanceof \SplFileInfo) {
            return $file->isExecutable();
        }
        return (parent::validate($file) && is_executable($file));
    }
    private static $CODE = 'NOT_EXECUTABLE';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
