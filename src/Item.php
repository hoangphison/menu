<?php

namespace Spatie\Menu;

interface Item
{
    /**
     * Determine whether the item is active or not.
     *
     * @return bool
     */
    public function isActive();

    /**
     * Render the item in html.
     *
     * @return string
     */
    public function render();
}
