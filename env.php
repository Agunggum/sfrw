<?php
define('ENVIRONMENT', 'local');
define('DEBUG', 'true');
define('BASEURL', 'http://localhost/');
define('BASESKIN', 'default'.'/');

define('WEBTITLE', 'xxxx');
define('WEBTITLETOP', 'xxxx');
define('WEBNAME', 'xxxx');
define('VERSION', '0.0.1');
define('TVERSION', '');
if(date('Y')=='2023'){ define('COPYR', ''.date('Y')); }else{ define('COPYR', '2023 - '.date('Y')); }

define('AUTOLOAD', 'app');
define('EXT', '.php');
define('EXTENSIONLIBRARY', include('library/Library'.EXT));
define('EXTENSIONAUTOLOAD', include('library/Autoload'.EXT));
define('FILECONFIG', 'library/config.txt');