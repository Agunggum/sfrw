<?php
require_once "app/Models/Users".EXT;
require_once model('login');

use app\Models\Users;

class Logincontroller extends Controller {

    public static function loginform($uri,$get){
        $loginModel = new Loginmodel;
        return $loginModel->loginformmodel($uri,$get);
    }
   
    static public function signout($nik,$log){
        $loginModel = new Loginmodel;
        return $loginModel->signoutmodel($nik,$log);
    }
    
    static public function namelog($fild){
        $users = new Users;
        $fillable = implode(", ", $users->fill);
        $cek = permintaanMysql("SELECT ".$fillable." FROM ".Users::schematable()." WHERE nik = '".BASESESSION."'");
        $j   = mysqlAmbilArray($cek);
        
        $fillabled = explode(", ", $fillable);
        for($ar=1; $ar<count($fillabled); $ar++){
            if($fild == $fillabled[$ar]){ return $j[$fillabled[$ar]]; }
        }
    }

}
$login = new Logincontroller();