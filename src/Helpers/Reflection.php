<?php

namespace Spatie\Menu\Helpers;

use ReflectionObject;
use Spatie\Menu\Item;
use ReflectionFunction;
use ReflectionParameter;

class Reflection
{
    public static function firstParameterType(callable $callable)
    {
        $reflection = is_object($callable)
            ? (new ReflectionObject($callable))->getMethod('__invoke')
            : new ReflectionFunction($callable);

        $parameters = $reflection->getParameters();

        $parameterTypes = array_map(function (ReflectionParameter $parameter) {
            return $parameter->getClass() ? $parameter->getClass()->name : null;
        }, $parameters);

        return isset($parameterTypes[0]) ? $parameterTypes[0] : '';
    }

    public static function itemMatchesType(Item $item, $type)
    {
        if ($type === '') {
            return true;
        }

        return $item instanceof $type;
    }
}
