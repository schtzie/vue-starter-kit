<?php

namespace App\Enums\AuditTrails;

use Illuminate\Support\Str;

enum EventEnum: string
{
    case CREATED = 'created';
    case UPDATED = 'updated';
    case DELETED = 'deleted';
    case RESTORED = 'restored';
    case DETACH = 'detach';
    case ATTACH = 'attach';
    case SYNC = 'sync';

    /**
     * Set badge color on DataTable
     */
    public function badgeColor(): string
    {
        return match ($this) {
            self::CREATED, self::ATTACH => 'success',
            self::UPDATED => 'info',
            self::DELETED, self::DETACH => 'danger',
            self::RESTORED, self::SYNC => 'primary',
        };
    }

    /**
     * Status
     * 
     * @return array 
     */
    public function badge($value): array
    {
        return [
            'value' => $value,
            'text' => Str::ucfirst($value),
            'color' => $this->badgeColor()
        ];
    }
}
