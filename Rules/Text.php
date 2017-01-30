<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 18/01/2017
 * Time: 10:28
 */

namespace UltimatePHPValidation\Rules;


use UltimatePHPValidation\Core\Regex;
use UltimatePHPValidation\Core\ValidationInterface;

/**
 * Class Text
 * @package UltimatePHPValidation\Rules
 */
class Text extends Regex implements ValidationInterface
{
    /**
     * Check for HTML field validity (no XSS please !)
     * @param $text
     * @return bool
     */
    public static function validate($text)
    {
            $events  = 'onmousedown|onmousemove|onmmouseup|onmouseover|onmouseout|onload|onunload|onfocus|onblur';
            $events .= '|onsubmit|ondblclick|onclick|onkeydown|onkeyup|onkeypress|onmouseenter|onmouseleave|onerror';
            $events .= '|onselect|onreset|onabort|ondragdrop|onresize|onactivate|onafterprint|onmoveend|onchange';
            $events .= '|onafterupdate|onbeforeactivate|onbeforecopy|onbeforecut|onbeforedeactivate|onbeforeeditfocus';
            $events .= '|onbeforepaste|onbeforeprint|onbeforeunload|onbeforeupdate|onmove|onbounce|oncellchange';
            $events .= '|oncontextmenu|oncontrolselect|oncopy|oncut|ondataavailable|ondatasetchanged|onfocusout';
            $events .= '|ondatasetcomplete|ondeactivate|ondrag|ondragend|ondragenter|onmousewheel|ondragleave';
            $events .= '|ondragover|ondragstart|ondrop|onerrorupdate|onfilterchange|onfinish|onfocusin|onstart|onstop';
            $events .= '|onhashchange|onhelp|oninput|onlosecapture|onmessage|onmouseup|onmovestart|onselectstart';
            $events .= '|onoffline|ononline|onpaste|onpropertychange|onreadystatechange|onresizeend|onresizestart';
            $events .= '|onrowenter|onrowexit|onrowsdelete|onrowsinserted|onscroll|onsearch|onselectionchange';
        return (!parent::check($text,'/<[ \t\n]*script/ims') &&
            !parent::check($text,'/('.$events.')[ \t\n]*=/ims') &&
            !parent::check($text,'/.*script\:/ims') &&
            !parent::check($text,'/<[ \t\n]*(i?frame|form|input|embed|object)/ims')
        );
    }
    private static $CODE = 'INVALID_TEXT';
    /**
     * @return string
     */
    public static function getCode(){return self::$CODE;}
}
