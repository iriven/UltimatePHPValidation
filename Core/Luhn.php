<?php
/**
 * Created by PhpStorm.
 * User: Iriven
 * Date: 07/01/2017
 * Time: 13:52
 */

namespace UltimatePHPValidation\Core;

/**
 * Class Luhn
 * @package UltimatePHPValidation\Core
 */
abstract class Luhn
{
    public static function check($luhn, $length, $unDecorate = true, $hyphens = [])
    {
        $luhn = $unDecorate ? self::unDecorate($luhn, $hyphens) : $luhn;
        if (strlen($luhn) != $length)  return false;
        $expr = sprintf('/\\d{%d}/i', $length);
        if (!preg_match($expr, $luhn)) return false;
        $check = 0;
        for ($i = 0; $i < $length; $i += 2)
        {
            if ($length % 2 == 0) {
                $check += 3 * (int) substr($luhn, $i, 1);
                $check += (int) substr($luhn, $i + 1, 1);
            } else {
                $check += (int) substr($luhn, $i, 1);
                $check += 3 * (int) substr($luhn, $i + 1, 1);
            }
        }
        return $check % 10 == 0;
    }

    /**
     * @param string $luhn
     * @param array  $hyphens
     *
     * @return string
     */
    public static function unDecorate($luhn, $hyphens = [])
    {
        $hyphensLength = count($hyphens);
        // removing hyphens
        for ($i = 0; $i < $hyphensLength; ++$i) {
            $luhn = str_replace($hyphens[$i], '', $luhn);
        }
        return $luhn;
    }

}
