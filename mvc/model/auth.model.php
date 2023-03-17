<?php
use app\Models\Users;

class Loginmodel {

	function loginformmodel($uri,$get) {  
		if(isset($_POST['login']) and $_POST['login']=="MASUK"){

          $pass = anti_injection(md5($_POST['password']));
          $nik = anti_injection($_POST['nik']);

          $login1 = permintaanMysql("SELECT user, name, password FROM ".Users::schematable()." WHERE nik='".$nik."'");
          $data1 = mysqlAmbilArray($login1);
          
          if($data1['password'] != $pass){
              //A PHP array containing the data that we want to log.
              $dataToLog = array(
                  date("Y-m-d H:i:s"), //Date and time
                  get_client_ip(), //IP address
                  get_client_browser(), //browser
                  $nik, //Custom text
                  'login denied' //More custom text
              );
              //Turn array into a delimited string using
              //the implode function
              $data = implode(" ~ ", $dataToLog);
              //Add a newline onto the end.
              $data .= PHP_EOL;
              //The name of your log file.
              //Modify this and add a full path if you want to log it in 
              //a specific directory.
              $pathToFile = asset(BASESKIN).'logsignin.log';
              //Log the data to your file using file_put_contents.
              file_put_contents($pathToFile, $data, FILE_APPEND);
          
              $_SESSION['error'] = "true";
              arahkan('', 'erroralert', 'Please re-check the NIK or Password you entered, make sure the data you entered is correct.');
          }
          elseif(empty($_POST['captcha'])){
              //A PHP array containing the data that we want to log.
              $dataToLog = array(
                  date("Y-m-d H:i:s"), //Date and time
                  get_client_ip(), //IP address
                  get_client_browser(), //browser
                  $nik, //Custom text
                  'login denied : wrong captcha' //More custom text
              );
              //Turn array into a delimited string using
              //the implode function
              $data = implode(" ~ ", $dataToLog);
              //Add a newline onto the end.
              $data .= PHP_EOL;
              //The name of your log file.
              //Modify this and add a full path if you want to log it in 
              //a specific directory.
              $pathToFile = asset(BASESKIN).'logsignin.log';
              //Log the data to your file using file_put_contents.
              file_put_contents($pathToFile, $data, FILE_APPEND);
              
              $_REQUEST['error'] = "true";
              arahkan('', 'erroralert', 'The captcha code you entered is wrong, make sure the data you enter is correct.');
          }
          elseif(!empty($_POST['captcha']) and strtoupper($_POST['captcha']) != strtoupper($_SESSION['captcha'])){
              //A PHP array containing the data that we want to log.
              $dataToLog = array(
                  date("Y-m-d H:i:s"), //Date and time
                  get_client_ip(), //IP address
                  get_client_browser(), //browser
                  $nik, //Custom text
                  'login denied : wrong captcha' //More custom text
              );
              //Turn array into a delimited string using
              //the implode function
              $data = implode(" - ", $dataToLog);
              //Add a newline onto the end.
              $data .= PHP_EOL;
              //The name of your log file.
              //Modify this and add a full path if you want to log it in 
              //a specific directory.
              $pathToFile = asset(BASESKIN).'logsignin.log';
              //Log the data to your file using file_put_contents.
              file_put_contents($pathToFile, $data, FILE_APPEND);
              
              $_SESSION['error'] = "true";
              arahkan('', 'erroralert', 'The captcha code you entered is wrong, make sure the data you enter is correct.');
          }
          else{
              $ketemu = barisAngkaMysql($login2);

              if ($ketemu != 0){
                  /*session_start();
                  session_register("nik");
                  session_register("password");*/
                  
                  $_SESSION['nik'] = $data1['nik'];
                  $_SESSION['nama_lengkap'] = $data1['nama_lengkap'];
                  $_SESSION['accessme'] = $data2['accessme'];
                  $_SESSION['functionme'] = $data1['id_function'];
                  /*$_SESSION['tokenlog'] = $data2['token'];
                  $_SESSION['codeaccess'] = $_POST['accessloccode'];*/
            
                  //A PHP array containing the data that we want to log.
                  $dataToLog = array(
                      date("Y-m-d H:i:s"), //Date and time
                      get_client_ip(), //IP address
                      get_client_browser(), //browser
                      $nik, //Custom text
                      'login success' //More custom text
                  );
                  //Turn array into a delimited string using
                  //the implode function
                  $data = implode(" ~ ", $dataToLog);
                  //Add a newline onto the end.
                  $data .= PHP_EOL;
                  //The name of your log file.
                  //Modify this and add a full path if you want to log it in 
                  //a specific directory.
                  $pathToFile = asset(BASESKIN).'logsignin.log';
                  //Log the data to your file using file_put_contents.
                  file_put_contents($pathToFile, $data, FILE_APPEND);

                  //membuat sesi timeout
                  $_SESSION['timeout']=WAKTUINI+KADALUARSA;
                  $_SESSION['timelog']=WAKTUINI+KADALUARSA+13;
                  $_SESSION['error'] = "false";
                  arahkan($uri, 'successalert', '');
              }
              else{
                  $_SESSION['error'] = "true";
                  arahkan('', 'erroralert', 'Login denied.');
              }
          }

      }
      requestyou("6/OlkaM4gS2Cnfdwm1qhhzaDOmtJTzKywe1lq/GzdVvl/nTflBPBweoLq51OYamKd/rt9m+xqnpQGL5S4ZZ873X4/P4uUgRMzVQ/L2s9RMqS03rHVRkpsPU0A/712GctgsrHJTgoeGbMC+yAEbUMA8ST7U8TTJCFsi3N215YL7AjCK9+cuNu",$get);
	}
    
    function signoutmodel($nik,$log){
        //jika waktu sekarang kurang dari sesi timeout
        if(BASESESSION!="" and $log > $_SESSION['timeout']){
            //A PHP array containing the data that we want to log.
            $dataToLog = array(
                date("Y-m-d H:i:s"), //Date and time
                get_client_ip(), //IP address
                get_client_browser(), //browser
                $nik, //Custom text
                'signout' //More custom text
            );
            //Turn array into a delimited string using
            //the implode function
            $data = implode(" ~ ", $dataToLog);
            //Add a newline onto the end.
            $data .= PHP_EOL;
            //The name of your log file.
            //Modify this and add a full path if you want to log it in 
            //a specific directory.
            $pathToFile = asset(BASESKIN).'logsignin.log';
            //Log the data to your file using file_put_contents.
            file_put_contents($pathToFile, $data, FILE_APPEND);

            session_destroy();
            require_once view('pagelogout');
            echo "<script>setTimeout(function () { window.location.href = '".BASEURL."?p=signout&log=".$_SESSION['timeout']."'; }, 2000);</script>";
        }else{
            require_once view('pagelogin');
            echo "<script>setTimeout(function () { window.location.href = '".BASEURL."'; }, 2000);</script>";
        }
    }
    
}
?>