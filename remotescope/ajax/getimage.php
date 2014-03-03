<?php
$remoteImage = "http://172.16.0.5/usr/yoics0.jpg";
$imginfo = getimagesize($remoteImage);
header("Content-type:".$imginfo['mime']);
readfile($remoteImage);
?>
