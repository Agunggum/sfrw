<?php
if ( ! ('library')) exit('No direct script access allowed');

function customError($errno, $errstr, $errfile, $errline) {
    date_default_timezone_set("Asia/Jakarta");
    $dates = gmdate("Y-m-d H:i:s", time()+60*60*7);
    $datesc = gmdate("Y-m-d", time()+60*60*7);
    if (!empty($errno) and DEBUG == 'true') {
        $_SESSION['XfTVKuhxT3LUAbp5C8z37lHdj'] = $errno;
        $_SESSION['zyA2QF2M25e3TyVmi2w99n2tB'] = $errstr;
        $_SESSION['6vhow83GCbV6jdXTMEgAJdqEN'] = $errline.", ".$errstr.", ".$errfile.", ".$_SERVER['REQUEST_URI'].", ".$dates;
        //echo "<code>Kesalahan terdeteksi!</code>";
        if($_SESSION['XfTVKuhxT3LUAbp5C8z37lHdj']=='2'){
        echo "<script>document.location='".$_SERVER['REQUEST_URI']."'</script>";
        }
        //exit();
    }else{
        $_SESSION['XfTVKuhxT3LUAbp5C8z37lHdj'] = $errno;
        $_SESSION['zyA2QF2M25e3TyVmi2w99n2tB'] = $errstr;
        $_SESSION['6vhow83GCbV6jdXTMEgAJdqEN'] = $errline.", ".$errstr.", ".$errfile.", ".$_SERVER['REQUEST_URI'].", ".$dates;
        //echo "<code>Kesalahan terdeteksi!</code>";
        //exit();
    }
}

function core($get) {
    $base = BASEPATH.$get.EXT;
    if(!empty($_SESSION['XfTVKuhxT3LUAbp5C8z37lHdj']) and !empty($_SESSION['zyA2QF2M25e3TyVmi2w99n2tB'])){
        return BASEPATH.'error/Handler'.EXT;
    }else{
        return $base;
    }
}

function option($get) {
    $base = BASEPATH.$get.EXT;
    return $base;
}

function anti_injection($data){
    $filter = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
    return $filter;
}

function validateDate($date, $format = 'Y-m-d'){
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

function anti_number_format($data){
    $filter = str_replace(",","",$data);
    return $filter;
}

function datelongind($ori) {
    $original = strtotime($ori);
    date_default_timezone_set('Asia/Jakarta');
    $chunks = array(
        array(60 * 60 * 24 * 365, 'tahun'),
        array(60 * 60 * 24 * 30, 'bulan'),
        array(60 * 60 * 24 * 7, 'minggu'),
        array(60 * 60 * 24, 'hari'),
        array(60 * 60, 'jam'),
        array(60, 'menit'),
        array(60/60, 'detik'),
    );

    list($tanggal,$waktu)=explode(" ",$ori);
    $nh = date('l', strtotime($tanggal));

	if($nh=="Sunday"){
        $namahari="Minggu";
	}else if($nh=="Monday"){
        $namahari="Senin";
	}else if($nh=="Tuesday"){
        $namahari="Selasa";
	}else if($nh=="Wednesday"){
        $namahari="Rabu";
	}else if($nh=="Thursday"){
        $namahari="Kamis";
	}else if($nh=="Friday"){
        $namahari="Jumat";
	}else if($nh=="Saturday"){
        $namahari="Sabtu";
	}else{
        $namahari="";
	}

    //$today = (time()+60*60*7);
    $today = gmdate("Y-m-d H:i:s", time()+60*60*7);
    $today = strtotime($today);
    $since = $today - $original;
    $long = "";

    /*if ($since > 604800)*/
    if ($since > 18144000)
    {
        //$print = date("M jS", $original);
        $print = $namahari.", ".date("j M", $original);
        if ($since > 31536000)
        {
            $print .= " " . date("Y", $original);
        }
        return $print;
    }

    for ($i = 0, $j = count($chunks); $i < $j; $i++)
    {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];

        if (($count = floor($since / $seconds)) != 0)
            break;
    }

    if ($since < 63072000)
    {
        if ($since < 86400)
        {
            $long = "";
        }
        else if ($since < 604800)
        {
            $long = "";
        }
        else if ($since < 18144000)
        {
            $long = "";
        }
        else if ($since < 31536000)
        {
            $long = $namahari.", ".date("j M", $original);
        }
        else if ($since > 31536000)
        {
            $long = $namahari.", ".date("j M", $original);
        }
    }

    $print = ($count == 1) ? '1 ' . $name : "$count {$name}";
    return $print . ' yang lalu ' . $long;

}

function thousandsCurrencyFormat($num) {
  $x = round($num);
  $x_number_format = number_format($x);
  $x_array = explode(',', $x_number_format);
  $x_parts = array('rb', 'jt', 'mil', 'tri');
  $x_count_parts = count($x_array) - 1;
  $x_display = $x;
  $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : ' ');
  $x_display .= $x_parts[$x_count_parts - 1];
  return $x_display;
}

function date_indo($date) {
	list($thn,$bln,$tgl)=explode('-',$date);

	if($bln=='01'){
		$bl = 'Januari';
	}elseif($bln=='02'){
		$bl = 'Februari';
	}elseif($bln=='03'){
		$bl = 'Maret';
	}elseif($bln=='04'){
		$bl = 'April';
	}elseif($bln=='05'){
		$bl = 'Mei';
	}elseif($bln=='06'){
		$bl = 'Juni';
	}elseif($bln=='07'){
		$bl = 'Juli';
	}elseif($bln=='08'){
		$bl = 'Agustus';
	}elseif($bln=='09'){
		$bl = 'September';
	}elseif($bln=='10'){
		$bl = 'Oktober';
	}elseif($bln=='11'){
		$bl = 'November';
	}elseif($bln=='12'){
		$bl = 'Desember';
	}

	return $tgl." ".$bl." ".$thn;
}

function datetime_indo($date) {
  list($ltgl,$time)=explode(' ',$date);
  list($thn,$bln,$tgl)=explode('-',$ltgl);

	if($bln=='01'){
		$bl = 'Januari';
	}elseif($bln=='02'){
		$bl = 'Februari';
	}elseif($bln=='03'){
		$bl = 'Maret';
	}elseif($bln=='04'){
		$bl = 'April';
	}elseif($bln=='05'){
		$bl = 'Mei';
	}elseif($bln=='06'){
		$bl = 'Juni';
	}elseif($bln=='07'){
		$bl = 'Juli';
	}elseif($bln=='08'){
		$bl = 'Agustus';
	}elseif($bln=='09'){
		$bl = 'September';
	}elseif($bln=='10'){
		$bl = 'Oktober';
	}elseif($bln=='11'){
		$bl = 'November';
	}elseif($bln=='12'){
		$bl = 'Desember';
	}

	return $tgl." ".$bl." ".$thn;
}

function dateandtime_indo($date) {
  list($ltgl,$time)=explode(' ',$date);
  list($thn,$bln,$tgl)=explode('-',$ltgl);

	if($bln=='01'){
		$bl = 'Januari';
	}elseif($bln=='02'){
		$bl = 'Februari';
	}elseif($bln=='03'){
		$bl = 'Maret';
	}elseif($bln=='04'){
		$bl = 'April';
	}elseif($bln=='05'){
		$bl = 'Mei';
	}elseif($bln=='06'){
		$bl = 'Juni';
	}elseif($bln=='07'){
		$bl = 'Juli';
	}elseif($bln=='08'){
		$bl = 'Agustus';
	}elseif($bln=='09'){
		$bl = 'September';
	}elseif($bln=='10'){
		$bl = 'Oktober';
	}elseif($bln=='11'){
		$bl = 'November';
	}elseif($bln=='12'){
		$bl = 'Desember';
	}

	return $tgl." ".$bl." ".$thn.", ".$time;
}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';

	$macCommandString   =   "arp " . $ipaddress . " | awk 'BEGIN{ i=1; } { i++; if(i==3) print $3 }'";

    $mac = exec($macCommandString);

	return $ipaddress." ".$mac;
}

function getUserIP() {
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = $_SERVER['HTTP_CLIENT_IP'];
    $forward = $_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

function get_client_browser()
{
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    // Make case insensitive.
    $t = strtolower($user_agent);

    // If the string *starts* with the string, strpos returns 0 (i.e., FALSE). Do a ghetto hack and start with a space.
    // "[strpos()] may return Boolean FALSE, but may also return a non-Boolean value which evaluates to FALSE."
    //     http://php.net/manual/en/function.strpos.php
    $t = " " . $t;

    // Humans / Regular Users     
    if     (strpos($t, 'opera'     ) || strpos($t, 'opr/')     ) return 'Opera'            ;
    elseif (strpos($t, 'edge'      )                           ) return 'Edge'             ;
    elseif (strpos($t, 'chrome'    )                           ) return 'Chrome'           ;
    elseif (strpos($t, 'safari'    )                           ) return 'Safari'           ;
    elseif (strpos($t, 'firefox'   )                           ) return 'Firefox'          ;
    elseif (strpos($t, 'msie'      ) || strpos($t, 'trident/7')) return 'Internet Explorer';

    // Search Engines 
    elseif (strpos($t, 'google'    )                           ) return '[Bot] Googlebot'   ;
    elseif (strpos($t, 'bing'      )                           ) return '[Bot] Bingbot'     ;
    elseif (strpos($t, 'slurp'     )                           ) return '[Bot] Yahoo! Slurp';
    elseif (strpos($t, 'duckduckgo')                           ) return '[Bot] DuckDuckBot' ;
    elseif (strpos($t, 'baidu'     )                           ) return '[Bot] Baidu'       ;
    elseif (strpos($t, 'yandex'    )                           ) return '[Bot] Yandex'      ;
    elseif (strpos($t, 'sogou'     )                           ) return '[Bot] Sogou'       ;
    elseif (strpos($t, 'exabot'    )                           ) return '[Bot] Exabot'      ;
    elseif (strpos($t, 'msn'       )                           ) return '[Bot] MSN'         ;

    // Common Tools and Bots
    elseif (strpos($t, 'mj12bot'   )                           ) return '[Bot] Majestic'     ;
    elseif (strpos($t, 'ahrefs'    )                           ) return '[Bot] Ahrefs'       ;
    elseif (strpos($t, 'semrush'   )                           ) return '[Bot] SEMRush'      ;
    elseif (strpos($t, 'rogerbot'  ) || strpos($t, 'dotbot')   ) return '[Bot] Moz or OpenSiteExplorer';
    elseif (strpos($t, 'frog'      ) || strpos($t, 'screaming')) return '[Bot] Screaming Frog';
       
    // Miscellaneous
    elseif (strpos($t, 'facebook'  )                           ) return '[Bot] Facebook'     ;
    elseif (strpos($t, 'pinterest' )                           ) return '[Bot] Pinterest'    ;
       
    // Check for strings commonly used in bot user agents  
    elseif (strpos($t, 'crawler' ) || strpos($t, 'api'    ) ||
            strpos($t, 'spider'  ) || strpos($t, 'http'   ) ||
            strpos($t, 'bot'     ) || strpos($t, 'archive') ||
            strpos($t, 'info'    ) || strpos($t, 'data'   )    ) return '[Bot] Other'   ;
    return 'Other (Unknown)';
}

function anti_right($in){
  $simple_string = $in;$ciphering = "AES-128-CTR";$iv_length = openssl_cipher_iv_length($ciphering);$options = 0;$m_iv = '1234567891011121';$m_key = "antimaling";$d=openssl_decrypt($simple_string, $ciphering, $m_key, $options, $m_iv);
  if($d){ return $d; }else{ echo "not be open"; exit();  }
}

function done($in){
  $simple_string = $in;$ciphering = "AES-128-CTR";$iv_length = openssl_cipher_iv_length($ciphering);$options = 0;$m_iv = '1234567891011121';$m_key = "antimaling";$d=openssl_decrypt($simple_string, $ciphering, $m_key, $options, $m_iv);
  if($d){ echo $d; }else{ echo "not be open"; exit();  }
}

function requestme($a,$b) {
    $code = '5aD1z/ptxT6PwA==';
    $anticheat = '5aD1z/ptxT6PwA==';
    $sub=$b;$fuk=anti_right($code);if($sub>=$fuk or $code!=$anticheat){ done($a);exit(); }else{ return $anticheat;  }
}

function requestyou($a,$get) {
  if(empty($get)){ done($a);exit(); }
}

function hpindo($nohp) {
     // kadang ada penulisan no hp 0811 239 345
     $nohp = str_replace(" ","",$nohp);
     // kadang ada penulisan no hp (0274) 778787
     $nohp = str_replace("(","",$nohp);
     // kadang ada penulisan no hp (0274) 778787
     $nohp = str_replace(")","",$nohp);
     // kadang ada penulisan no hp 0811.239.345
     $nohp = str_replace(".","",$nohp);

     // cek apakah no hp mengandung karakter + dan 0-9
     if(!preg_match('/[^+0-9]/',trim($nohp))){
         // cek apakah no hp karakter 1-3 adalah +62
         if(substr(trim($nohp), 0, 2)=='62'){
             $hp = trim($nohp);
         }
         // cek apakah no hp karakter 1 adalah 0
         elseif(substr(trim($nohp), 0, 1)=='0'){
             $hp = '62'.substr(trim($nohp), 1);
         }
     }else{
        $hp = '62';
     }
     return $hp;
 }

 function mydays($tanggal1,$tanggal2){
    $start = new DateTime($tanggal1);
    $end = new DateTime($tanggal2);
    $days = $start->diff($end);
    return $days->days;
 }

function mydaysnull($days){
    if($days == 0){
        return ($days+1).' Hari';
    }else{
        return $days.' Hari';
    }
}

// Konvesi dd-mm-yyyy -> yyyy-mm-dd
function tgl_ind_to_eng($tgl) {
    $tgl_eng=substr($tgl,6,4)."-".substr($tgl,3,2)."-".substr($tgl,0,2);
    return $tgl_eng;
}

// Konvesi yyyy-mm-dd -> dd-mm-yyyy
function tgl_eng_to_ind($tgl) {
    $tgl_ind=substr($tgl,8,2)."-".substr($tgl,5,2)."-".substr($tgl,0,4);
    return $tgl_ind;
}

function tgl_eng_to_format($tgl) {
    $tgl_ind=substr($tgl,5,2)."/".substr($tgl,8,2)."/".substr($tgl,0,4);
    return $tgl_ind;
}

function tgl_eng_to_format_time($tgl) {
    $tgl_ind=substr($tgl,5,2)."/".substr($tgl,8,2)."/".substr($tgl,0,4)."".substr($tgl,10,6);
    return $tgl_ind;
}

function tgl_eng_to_year($tgl) {
    $tgl_ind=substr($tgl,0,4);
    return $tgl_ind;
}

function tgl_eng_to_ind_no_date($tgl) {
    $bl = substr($tgl,5,2);
    if($bl=='01'){
        $bl2="JANUARI";
    }elseif($bl=='02'){
        $bl2="FEBRUARI";
    }elseif($bl=='03'){
        $bl2="MARET";
    }elseif($bl=='04'){
        $bl2="APRIL";
    }elseif($bl=='05'){
        $bl2="MEI";
    }elseif($bl=='06'){
        $bl2="JUNI";
    }elseif($bl=='07'){
        $bl2="JULI";
    }elseif($bl=='08'){
        $bl2="AGUSTUS";
  	}elseif($bl=='09'){
        $bl2="SEPTEMBER";
  	}elseif($bl=='10'){
        $bl2="OKTOBER";
  	}elseif($bl=='11'){
        $bl2="NOVEMBER";
  	}elseif($bl=='12'){
        $bl2="DESEMBER";
    }

    $tgl_ind=$bl2." ".substr($tgl,0,4);
    return $tgl_ind;
}

function tgl_eng_to_ind_no_date2($tgl) {
    $bl = substr($tgl,5,2);
  	if($bl=='01'){
        $bl2="JAN";
  	}elseif($bl=='02'){
        $bl2="FEB";
  	}elseif($bl=='03'){
        $bl2="MAR";
  	}elseif($bl=='04'){
        $bl2="APR";
  	}elseif($bl=='05'){
        $bl2="MAY";
  	}elseif($bl=='06'){
        $bl2="JUN";
  	}elseif($bl=='07'){
        $bl2="JUL";
  	}elseif($bl=='08'){
        $bl2="AUG";
  	}elseif($bl=='09'){
        $bl2="SEP";
  	}elseif($bl=='10'){
        $bl2="OKT";
  	}elseif($bl=='11'){
        $bl2="NOV";
  	}elseif($bl=='12'){
        $bl2="DEC";
  	}

    $tgl_ind=substr($tgl,8,2)."-".$bl2."-".substr($tgl,0,4);
    return $tgl_ind;
}

function tgl_eng_to_ind_no_date3($tgl) {
  	$bl = substr($tgl,5,2);
  	if($bl=='01'){
        $bl2="JANUARI";
  	}elseif($bl=='02'){
        $bl2="FEBRUARI";
  	}elseif($bl=='03'){
        $bl2="MARET";
  	}elseif($bl=='04'){
        $bl2="APRIL";
  	}elseif($bl=='05'){
        $bl2="MEI";
  	}elseif($bl=='06'){
        $bl2="JUNI";
  	}elseif($bl=='07'){
        $bl2="JULI";
  	}elseif($bl=='08'){
        $bl2="AGUSTUS";
  	}elseif($bl=='09'){
        $bl2="SEPTEMBER";
  	}elseif($bl=='10'){
        $bl2="OKTOBER";
  	}elseif($bl=='11'){
        $bl2="NOVEMBER";
  	}elseif($bl=='12'){
        $bl2="DESEMBER";
  	}

  	$tgl_ind=substr($tgl,8,2)."-".$bl2."-".substr($tgl,0,4);
  	return $tgl_ind;
}

function format_angka($angka) {
    $hasil = number_format($angka,0, ",",".");
    return $hasil;
}

function format_angka2($angka) {
  	$hasil = number_format($angka,0, ",","");
  	return $hasil;
}

function format_angka4($angka) {
  	$hasil = number_format($angka);
  	return $hasil;
}

function format_decimal($angka) {
  	$hasil = number_format($angka,1);
  	return $hasil;
}

function format_decimal2($angka) {
  	$hasil = number_format($angka,2, ",",".");
  	return $hasil;
}

function terbilang($x) {
    $abil = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    if ($x < 12)
        return " " . $abil[$x];
    elseif ($x < 20)
        return Terbilang($x - 10) . " Belas" ;
    elseif ($x < 100)
        return Terbilang($x / 10) . " Puluh" . Terbilang($x % 10);
    elseif ($x < 200)
        return " seratus" . Terbilang($x - 100);
    elseif ($x < 1000)
        return Terbilang($x / 100) . " Ratus" . Terbilang($x % 100);
    elseif ($x < 2000)
        return " seribu" . Terbilang($x - 1000);
    elseif ($x < 1000000)
        return Terbilang($x / 1000) . " Ribu" . Terbilang($x % 1000);
    elseif ($x < 1000000000)
        return Terbilang($x / 1000000) . " Juta" . Terbilang($x % 1000000);
}

function goodday(){
    $a = date('H:i');
    $b = time();
    $hour = date("G",$b);

    if ($hour>1 && $hour<5)
    {
        return "[".$a." WIB] By morning";
    }
    elseif ($hour>=5 && $hour<10)
    {
        return "[".$a." WIB] Good morning";
    }
    elseif ($hour >=10 && $hour<15)
    {
        return "[".$a." WIB] Good afternoon";
    }
    elseif ($hour >=15 && $hour<17)
    {
        return "[".$a." WIB] Good afternoon";
    }
    elseif ($hour >=17 && $hour<18)
    {
        return "[".$a." WIB] Towards Evening";
    }
    elseif ($hour >=18 && $hour<19)
    {
        return "[".$a." WIB] Dusk";
    }
    elseif ($hour >=19)
    {
        return "[".$a." WIB] Good night";
    }
}

function scriptisNumberKey(){
        echo '<script>function isNumberKey(evt){ var charCode = (evt.which) ? evt.which : evt.keyCode; if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) return false; return true; } </script>';
}
/* End of file library.php */
/* Location: ./library/library.php */
