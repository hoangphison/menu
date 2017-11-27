<?php

namespace Spatie\Menu\Helpers;

class Str
{
    public static function startsWith($haystack, $needle)
    {
        if ($needle != '' && substr($haystack, 0, strlen($needle)) === $needle) {
            return true;
        }

        return false;
    }

    public static function removeFromStart($remove, $subject)
    {
        if (! self::startsWith($subject, $remove)) {
            return $subject;
        }

        return self::replaceFirst($remove, '', $subject);
    }

    public static function replaceFirst($search, $replace, $subject)
    {
        $position = strpos($subject, $search);

        if ($position !== false) {
            return substr_replace($subject, $replace, $position, strlen($search));
        }

        return $subject;
    }

    public static function ensureLeft($pattern, $subject)
    {
        if (strpos($subject, $pattern) === 0) {
            return $subject;
        }

        return $pattern.$subject;
    }

    public static function ensureRight($pattern, $subject)
    {
        if (strrpos($subject, $pattern) === strlen($subject) - 1) {
            return $subject;
        }

        return $subject.$pattern;
    }
}
