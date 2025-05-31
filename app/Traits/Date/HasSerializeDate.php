<?php

namespace App\Traits\Date;

use DateTimeInterface;

trait HasSerializeDate
{
    /**
     * Prepare a date for array / JSON serialization.
     */
    protected function serializeDate(DateTimeInterface $date): DateTimeInterface
    {
        return $date;
    }
}
