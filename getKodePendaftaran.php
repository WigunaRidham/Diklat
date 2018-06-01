<?php
session_start();

$kd_pendaftaran=$_GET["q"];
$_SESSION["kdp"]=$kd_pendaftaran;
echo $$kd_pendaftaran."@";
?>
