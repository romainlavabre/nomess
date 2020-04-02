<?php

namespace App\Lib;

class Token 
{
    public function requestToken()
    {
        
        $token = str_shuffle("abcdefghijklmnopqrstuvwxyz123456789&é'-è_çà=~#{[|`^@]}");

        mkdir(ROOT . 'App/src/Lib/TokenForm/file/' . $token . ' .txt');

        return $token;
        
    }

    public function closeToken($token)
    {
        $token = trim($token);

        if(file_exists(ROOT . 'App/src/Lib/TokenForm/file/' . $token . ' .txt')){
            unlink(ROOT . 'App/src/Lib/TokenForm/file/' . $token . ' .txt');
            return true;
        }else{
            return false;
        }
    }
}