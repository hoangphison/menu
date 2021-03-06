<?php

namespace Spatie\Menu;

interface HasHtmlAttributes
{
    /**
     * @param string $attribute
     * @param string $value
     *
     * @return $this
     */
    public function setAttribute($attribute, $value = '');

    /**
     * @param array $attributes
     *
     * @return $this
     */
    public function setAttributes(array $attributes);

    /**
     * @param string $class
     *
     * @return $this
     */
    public function addClass($class);
}
