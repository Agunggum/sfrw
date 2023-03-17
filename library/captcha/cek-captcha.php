<?php
session_start();
if($_POST['captcha'] == $_SESSION['captcha']){
	echo 'Kode yang anda masukkan benar, yaiut <font size="5">'.$_SESSION['captcha'].'</font>';
}
else{
	echo 'Kode yang anda masukkan salah, seharusnya <font size="5">'.$_SESSION['captcha'].'</font><br />
	      Bukan <font size="5">'.$_POST['captcha'].'</font>';
}
?>