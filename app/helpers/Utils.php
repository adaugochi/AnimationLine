<?php

namespace App\helpers;

class Utils
{
    public static function slug($str)
    {
        return str_replace(' ', '-', $str);
    }

    public static function GenerateToken($length = 15)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max-1)];
        }

        return $token;
    }
}