<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//koneksi ke database via methode/function yang ada di config.php
db::connectMySQL(BASEPATH);
// Define page route
if(isset($_GET['p'])){ $page = $_GET['p']; }else{ $page = ""; } define('ROUTE', $page);
/*****************************************************************/
/* Session control
/* Get Users variable
*/
if(isset($_SESSION['user'])){ $logs = $_SESSION['user']; }else{ $logs = ""; } define('BASESESSION', $logs);
/*****************************************************************/
/* Date timezone
*/
date_default_timezone_set("Asia/Jakarta");
define('DATEWMIN', gmdate("Y-m-d H:i:s", time()+60*60*7));
define('DATEO', gmdate("Y-m-d", time()+60*60*7));
/*****************************************************************/
/* Expired time
/* waktu sekarang GMT+7
/* waktu timeout (detik)
*/
define('WAKTUINI', time()+25200);
define('KADALUARSA', 7200);

/*****************************************************************/