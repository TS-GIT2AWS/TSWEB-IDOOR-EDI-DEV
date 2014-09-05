<?php namespace Editor\Helpers;

use Carbon\Carbon;
use tidy;

class UrlString {

    /**
     * Capatilize first letter of each word of a string.
     *
     * @param string  $value
     * @return string
     */
    public static function title($value)
    {
        return mb_convert_case($value, MB_CASE_TITLE);
    }

}