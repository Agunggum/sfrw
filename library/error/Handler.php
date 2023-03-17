<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$arrerr = explode(", ", $_SESSION['6vhow83GCbV6jdXTMEgAJdqEN']);
if($arrerr[1] == "Trying to get property of non-object"){ $errstr = "Query tidak terdeteksi pada fungsi query, cari di setiap folder yang memakai query atau telusuri halaman target"; }else{ $errstr = $arrerr[1]; }
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo "ATASI : ".$errstr; ?></title>
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
<body class="bg-dark">
    <div class="container col-12">
        <div class="my-2">
            <div class="alert alert-dark">
                <small class="float-right font-weight-bold">S-FRW <?php echo VERSIONFRMAEWORK; ?> <i class="fa fa-copy"></i></small>
                <h3 class="col-12 p-1 text-wrap" title="ATASI : <?php echo $errstr; ?>"><span class="text-danger">ATASI : </span><?php echo $errstr; ?></h3>
                <h5 class="col-12 p-1 text-wrap"><strong class="text-danger">pada file</strong> <?php echo $arrerr[2]; ?></h5>
            </div>
            <div class="col-12 bg-secondary p-3 rounded">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="alert alert-secondary">
                            <div class="border-bottom border-dark p-2 mb-1 col-12 text-truncate">
                                <strong>Baris ke :</strong> <span class="text-danger font-weight-bold"><?php echo $arrerr[0]; ?></span>
                            </div>
                            <div class="border-bottom border-dark p-2 mb-1 col-12 text-truncate">
                                <strong>Halaman Target :</strong> <span class="text-danger font-weight-bold"><?php echo $arrerr[3]; ?></span>
                            </div>
                            <div class="border-bottom border-dark p-2 mb-1 col-12 text-truncate">
                                <strong>Nomor Kode :</strong> <span class="text-danger font-weight-bold"><?php echo $_SESSION['XfTVKuhxT3LUAbp5C8z37lHdj']; ?></span>
                            </div>
                            <div class="border-bottom border-dark p-2 mb-1 col-12 text-truncate">
                                <strong>Waktu :</strong> <span class="text-danger font-weight-bold"><?php echo $arrerr[4]; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="alert alert-secondary">
                            <pre class="comment bg-dark text-white rounded p-3 mt-3 border border-danger text-wrap">
                            <?php 
                            $filename = $arrerr[2];
                                $read = file($filename); 
                                $numberline = 1;
                                foreach ($read as $line_number => $last_line) {
                                    if($numberline == $arrerr[0] or ($numberline == $arrerr[0] and basename($filename) == "option.php")){
                                        echo '<div class="row mb-2 bg-danger"><div class="col-1 mx-0 pl-1 pr-0">'.$numberline++.'.</div> <div class="col-10">'.htmlspecialchars(html_entity_decode($last_line))."</div></div>";
                                    }else{
                                        echo '<div class="row mb-2"><div class="col-1 mx-0 pl-1 pr-0">'.$numberline++.'.</div> <div class="col-10">'.htmlspecialchars(html_entity_decode($last_line)).'</div></div>';
                                    }
                                }
                            ?></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script language="javascript">
$(document).ready(function() {
    $(".comment").shorten();
	$(".comment-small").shorten({showChars: 10});
});
</script>
</body>
</html>
<?php $_SESSION['XfTVKuhxT3LUAbp5C8z37lHdj'] = ""; $_SESSION['zyA2QF2M25e3TyVmi2w99n2tB'] = ""; $_SESSION['6vhow83GCbV6jdXTMEgAJdqEN'] = ""; ?>