<?php

use App\Models\Scolarship;

function scolarships($type,$all = false)
{
    if (!$all) {
        $scolarships = Scolarship::where('type',strtoupper($type))->where('status',1)->where('end_date','>=',today())->orderBy('created_at','DESC')->get();
    }else{
        $scolarships = Scolarship::where('type',strtoupper($type))->orderBy('created_at','DESC')->get();
    }

    return $scolarships;
}

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
