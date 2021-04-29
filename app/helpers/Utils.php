<?php

namespace App\helpers;

use Paystack;

class Utils
{
    public static function slug($str)
    {
        return str_replace(' ', '-', strtolower($str));
    }

    public static function generateToken()
    {
        return Paystack::genTranxRef();
    }
}