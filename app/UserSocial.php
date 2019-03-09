<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSocial extends Model
{
    public const PROVIDER_TYPE_GOOGLE = 0;

    public const MAP_PROVIDER_TYPES = [
        self::PROVIDER_TYPE_GOOGLE => 'Google',
    ];

    protected $dateFormat = 'U';

    protected $fillable = [
        'provider_type',
        'provider_id',
        'avatar',
    ];

    /**
     * getProviderNameAttribute 第三方服務名稱
     *
     * @return string
     */
    public function getProviderNameAttribute(): string
    {
        return static::MAP_PROVIDER_TYPES[$this->provider_id] ?? '';
    }
}
