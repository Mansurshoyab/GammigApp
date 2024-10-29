<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

final class VisibilityEnum extends Enum
{
    const PENDING = "pending";
    const DISPLAY = "display";
    const HIDDEN = "hidden";
    const ARCHIVED = "archived";

    /**
     * Get all visibility status values
     *
     * @return array
     */
    public static function fetch()
    {
        return [
            self::PENDING,
            self::DISPLAY,
            self::HIDDEN,
            self::ARCHIVED,
        ];
    }
}
