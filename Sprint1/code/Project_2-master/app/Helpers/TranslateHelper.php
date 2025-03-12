<?php

namespace App\Helpers;

use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslateHelper
{
    public static function translate($text, $locale)
    {
        $tr = new GoogleTranslate();
        $tr->setSource('auto');
        $tr->setTarget($locale);

        return $tr->translate($text);
    }
}

