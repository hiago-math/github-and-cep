<?php

namespace Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Infrastructure\Models\Casts\Timestamp;
use Infrastructure\Models\Traits\UuidTrait;

class Address extends Model
{
    use UuidTrait;
    use SoftDeletes;

    protected $table = 'address';
    protected $primaryKey = 'address_uid';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'address_uid',
        'zip_code',
        'public_place',
        'complement',
        'district',
        'city',
        'uf',
        'ibge',
        'gia',
        'ddd',
        'siafi',
        'is_visible'
    ];

    protected $casts = [
        'created_at' => Timestamp::class,
        'updated_at' => Timestamp::class,
        'deleted_at' => Timestamp::class,
    ];
}
