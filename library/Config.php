<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class db {

	static public function connectMySQL($base) {
        $array = fileCon($base);
		if($array[4] == 'MySql'){
			if($array[3]!=''){
			mysql_connect($array[0], $array[1], $array[2]);
			mysql_select_db($array[3]) or die(print "Konfigurasi dalam server : Tidak terhubung dengan database.");
			}
		}elseif($array[4] == 'MySqli'){
			if($array[3]!=''){
			$mysqli = new mysqli($array[0], $array[1], $array[2], $array[3]);
			if ($mysqli->connect_error){
				exit("Konfigurasi dalam server : Tidak terhubung dengan database.");
			}
			}
		}else{
			exit("Tidak Terhubung ke database Anda: pastikan jalur berikut sudah benar pada library/config.txt.");
		}
	}

	static public function closeConnectMySQL($base) {
        $array = fileCon($base);
		if($array[4] == 'MySql'){
			if($array[3]!=''){
			mysql_close();
			}
		}elseif($array[4] == 'MySqli'){
			if($array[3]!=''){
			$mysqli = new mysqli($array[0], $array[1], $array[2], $array[3]);
			$mysqli->close();
			}
		}
	}

}
//instance object database
$db = new db();
/* End of file config.php */
/* Location: ./library/config.php */
