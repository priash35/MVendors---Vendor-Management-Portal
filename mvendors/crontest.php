<?php

$myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
$txt = "Snehali ".date('Y-m-d H:i:s')."\n";
fwrite($myfile, $txt);
fclose($myfile);
echo exec('whereis php');

?>