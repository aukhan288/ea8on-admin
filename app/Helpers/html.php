<?php

use App\Helpers\HtmlHelper;
use Spatie\Html\Element;

if (!function_exists('html')) {
    function html($tag, $attributes = [])
    {
        return HtmlHelper::create($tag, $attributes);
    }
}