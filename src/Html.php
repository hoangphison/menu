<?php

namespace Spatie\Menu;

use Spatie\Menu\Html\Attributes;
use Spatie\Menu\Traits\Activatable as ActivatableTrait;
use Spatie\Menu\Traits\HasParentAttributes as HasParentAttributesTrait;

class Html implements Item, Activatable, HasParentAttributes
{
    use ActivatableTrait, HasParentAttributesTrait;

    /** @var string */
    protected $html;

    /** @var string|null */
    protected $url = null;

    /** @var bool */
    protected $active = false;

    /** @var \Spatie\Menu\Html\Attributes */
    protected $parentAttributes;

    /**
     * @param string $html
     */
    protected function __construct($html)
    {
        $this->html = $html;
        $this->parentAttributes = new Attributes();
    }

    /**
     * Create an item containing a chunk of raw html.
     *
     * @param string $html
     *
     * @return static
     */
    public static function raw($html)
    {
        return new static($html);
    }

    /**
     * Create an empty item.
     *
     * @return static
     */
    public static function emptyItem()
    {
        return new static('');
    }

    /**
     * @return string
     */
    public function html()
    {
        return $this->html;
    }

    /**
     * @return string
     */
    public function render()
    {
        return $this->html;
    }
}
