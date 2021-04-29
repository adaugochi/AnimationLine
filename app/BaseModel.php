<?php

namespace App;

use App\Traits\FormatDateTrait;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    const YES = 1;
    const NO = 0;

    use FormatDateTrait;
}
