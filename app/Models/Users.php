<?php
namespace app\Models;

class Users {

    //schema table users
    public $fill = [
        'user', 
        'name',
    ];
    
    static public function schematable($table = "users") {
        return $table; 
    }
    
}