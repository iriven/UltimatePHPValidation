<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 18/01/2017
 * Time: 14:49
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class File
 * @package UltimatePHPValidation\Rules
 */
class File implements ValidationInterface
{
    /**
     * @param $file
     * @return bool
     */
    public static function validate($file)
    {
        if ($file instanceof \SplFileInfo)
            return $file->isFile();
        return (is_string($file) && is_file($file));
    }
    private static $CODE = 'NOT_FILE';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
