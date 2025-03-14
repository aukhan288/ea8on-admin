<?php

namespace App\Helpers;
use Spatie\Html\Element;

use Spatie\Html\Html as SpatieHtml;

class HtmlHelper
{
    protected $element;

    public function __construct($tag, $attributes = [])
    {
        $this->element = SpatieHtml::element($tag, $attributes);
    }

    public function __call($method, $args)
    {
        return $this->element->$method(...$args);
    }

    public function __toString()
    {
        return $this->element->toHtml();
    }

    public static function create($tag, $attributes = [])
    {
        return new static($tag, $attributes);
    }
}