<?php if ( ! defined('APPPATH')) exit('No direct script access allowed'); ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>sfrw</title>
    <meta name="description" content="S-FRW">
    <link rel="shortcut icon" href="<?php echo BASEURL; ?>bootstrap/theme/globe-network.png" />
    <meta property="og:title" content="S-FRW>" />
    <meta property="og:image" content="<?php echo BASEURL; ?>bootstrap/theme/globe-network.png" />
    <meta property="og:url" content="<?php echo  BASEURL; ?>" />
    <meta property="og:description" content="S-FRW <?php echo VERSIONFRMAEWORK; ?>" />
    <meta property="og:site_name" content="S-FRW" />
    <style>
        @import "bootstrap/theme/css/bootstrap.css?v=0.1";
        @import "bootstrap/theme/fontawesome/css/all.css";
    </style>
    <script src="bootstrap/theme/js/jquery-1.11.1.min.js"></script>
    <script src="bootstrap/theme/js/bootstrap.min.js"></script>
    <script src="bootstrap/theme/fontawesome/js/all.js"></script>
    <script src="bootstrap/theme/js/main.js?v=0.4"></script>
</head>
<body>
    <div class="container col-12 d-flex justify-content-center">
        <?php require_once route('route'); ?>
    </div>
</body>