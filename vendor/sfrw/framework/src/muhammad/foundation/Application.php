<?php 
namespace muhammad\foundation;

class Application
{
    public function publicPath()
    {
        define('VERSIONFRMAEWORK', '2.0');

        if(BASEURL == (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/"){
        require_once core('Core');
        }else{
            die("cek dulu BASEURL yang ada di env.php ya :) <br>- " . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/");
        }
    }
}