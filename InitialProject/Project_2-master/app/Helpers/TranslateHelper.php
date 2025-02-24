<?php
namespace App\Helpers;

use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslateHelper
{
    public static function translate($text, $target)
    {
        $tr = new GoogleTranslate($target);
        return $tr->translate($text);
    }
}
