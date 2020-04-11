<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brief extends Model
{
    protected $fillable = [
        'app_full_name', 'description', 'website', 'billing_id', 'voiceover_artist', 'country_accent',
    ];
}
