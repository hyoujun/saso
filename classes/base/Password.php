<?php
namespace saso\classes\base;

class Password {
    public static function makeHash($password){
        $password = hash('sha256', $password);
        $password = 'stok-administra_sistemo'.$password.'plej_simpla';
        for($i = 0; $i < 1000; $i++){
        $password = hash('sha256',$password);
        }
        return $password;
    }
}

