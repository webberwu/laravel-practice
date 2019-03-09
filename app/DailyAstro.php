<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class DailyAstro extends Model
{
    protected $dateFormat = 'U';

    protected $casts = [
        'day' => 'date',
    ];

    protected $fillable = [
        'day',
        'astro_id',
        'overall_star',
        'overall_content',
        'love_star',
        'love_content',
        'career_star',
        'career_content',
        'money_star',
        'money_content',
    ];

    public const MAP_NAMES = [
        0 => '牡羊座',
        1 => '金牛座',
        2 => '雙子座',
        3 => '巨蟹座',
        4 => '獅子座',
        5 => '處女座',
        6 => '天秤座',
        7 => '天蠍座',
        8 => '射手座',
        9 => '魔羯座',
        10 => '水瓶座',
        11 => '雙魚座',
    ];

    /**
     * getAstroNameAttribute 星座中文名稱
     *
     * @return string
     */
    public function getAstroNameAttribute(): string
    {
        return static::MAP_NAMES[$this->astro_id] ?? '';
    }
}
