<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 18/01/2017
 * Time: 14:52
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Image
 * @package UltimatePHPValidation\Rules
 */
class Image extends File implements ValidationInterface
{
    /**
     * @param $value
     * @return bool
     */
    public static function validate($value)
    {
        if (!parent::validate($value))
            return false;
        if ($value instanceof \SplFileInfo)
            $value = $value->getPathname();
        $fileInfo = new \finfo(FILEINFO_MIME_TYPE);
        return (0 === mb_strpos($fileInfo->file($value), 'image/'));
    }
    private static $CODE = 'NOT_IMAGE_FILE';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
