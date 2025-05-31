<?php

namespace App\Models;

use App\Enums\AuditTrails\EventEnum;
use App\Traits\Date\HasSerializeDate;
use DateTimeImmutable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Audit as AuditContract;

class Audit extends Model implements AuditContract
{
    use \OwenIt\Auditing\Audit;
    use HasFactory, HasUlids;

    /**
     * DateTime
     */
    use HasSerializeDate;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     *
     * @var array
     */
    protected $appends = [];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'audits';

    /**
     * {@inheritdoc}
     */
    protected $casts = [
        'old_values'   => 'json',
        'new_values'   => 'json',
        'created_at'   => 'datetime:Y-m-d H:i:s',
        'updated_at'   => 'datetime:Y-m-d H:i:s',
    ];

    /**
     * Serialized Date
     * 
     * @param mixed $date 
     * @return string 
     */
    protected function getSerializedDate($date): DateTimeImmutable
    {
        return $this->serializeDate($date);
    }

    /**
     * Get the Event Type attributes.
     * 
     * @return \Illuminate\Database\Eloquent\Casts\Attribute 
     */
    protected function event(): Attribute
    {
        return Attribute::make(
            get: fn($value) => EventEnum::tryFrom($value)->badge($value),
        );
    }
}
