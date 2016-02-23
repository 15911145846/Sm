<?php 
$aa = file_get_contents("./aaab.php");

$temp = gzinflate(base64_decode($aa));
$FP = fopen("aaacd.php","w");
fwrite($FP,$temp);
fclose($FP);