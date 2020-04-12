<?php
namespace App\Http\Controllers\Utilities;

class TransactionUtility  
{
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
