<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 07/01/2017
 * Time: 14:07
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Rib
 * @package UltimatePHPValidation\Rules
 */
class Rib extends Bban  implements ValidationInterface
{
    /**
     * @param $rib
     * @return bool
     */
    public static function validate($rib)
    {
        return parent::validate($rib);
    }
}
