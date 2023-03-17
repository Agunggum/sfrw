<?php
namespace app\Models;

class Users {

    //schema table users
    public $fill = [
        'nik', 
        'nama_lengkap',
    ];
    
    static public function schematable($table = "master_users") {
        return $table; 
    }
    
}