<?php

namespace Spatie\Menu\Html;

class Tag
{
    /** @var string */
    protected $tagName;

    /** @var \Spatie\Menu\Html\Attributes */
    protected $attributes;

    public function __construct($tagName, Attributes $attributes = null)
    {
        $this->tagName = $tagName;
        $this->attributes = $attributes ?: new Attributes();
    }

    public static function make($tagName, Attributes $attributes = null)
    {
        return new self($tagName, $attributes);
    }

    public function withContents($contents)
    {
        if (is_array($contents)) {
            $contents = implode('', $contents);
        }

        return $this->open().$contents.$this->close();
    }

    public function open()
    {
        if ($this->attributes->isEmpty()) {
            return "<{$this->tagName}>";
        }

        return "<{$this->tagName} {$this->attributes}>";
    }

    public function close()
    {
        return "</{$this->tagName}>";
    }
}
