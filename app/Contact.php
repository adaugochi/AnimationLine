<?php

namespace App;

use App\Traits\FormatDateTrait;
use Illuminate\Database\Eloquent\Model;

class Contact extends BaseModel
{
    protected $fillable = [
        'first_name', 'last_name', 'contact_email', 'contact_company_name', 'message'
    ];
}
