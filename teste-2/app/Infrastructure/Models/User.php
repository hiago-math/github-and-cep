<?php

namespace Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Infrastructure\Models\Casts\Timestamp;
use Infrastructure\Models\Traits\UuidTrait;

class User extends Model
{
    use UuidTrait;
    use SoftDeletes;

    protected $table = 'users';
    protected $primaryKey = 'user_uid';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'user_uid',
        'github_id',
        'login',
        'name',
        'company',
        'bio',
        'node_id',
        'avatar_url',
        'gravatar_id',
        'url',
        'html_url',
        'type',
        'public_repos',
        'public_gists',
        'followers',
        'following',
        'created_at_github',
        'updated_at_github',
    ];

    protected $casts = [
        'created_at' => Timestamp::class,
        'updated_at' => Timestamp::class,
        'deleted_at' => Timestamp::class,
        'created_at_github' => Timestamp::class,
        'updated_at_github' => Timestamp::class
    ];
}
