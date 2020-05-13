<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brief extends Model
{
    protected $fillable = [
        'company_name', 'company_logo', 'company_website', 'video_script', 'artist_gender', 'artist_accent',
        'voice_type', 'video_speed', 'logo_sample', 'other_info', 'billing_id',
    ];
}
