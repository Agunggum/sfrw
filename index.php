<?php
include 'env.php';
/*
*---------------------------------------------------------------
* SESSION START
*---------------------------------------------------------------
*/
ob_start();
session_start();
// The PHP file extension
EXTENSIONLIBRARY;
EXTENSIONAUTOLOAD;
/*
 * --------------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 * --------------------------------------------------------------------
 *
 * And away we go...
 *
*/
$app = require_once __DIR__.'/bootstrap/app.php';
/* End of file index.php */
/* Location: ./index.php */
