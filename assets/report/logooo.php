<?php

$storagelocation=exo_getglobalvariable('HEPubStorageLocation', ''); 
$file=$storagelocation.'assets/img/sma1.png';
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Cache-Control: public, max-age=31536000');
    header('Pragma: public');
    header('Content-Length: '.filesize($file));
    header('Connection: Close');
    readfile($file);
    exit;
    }