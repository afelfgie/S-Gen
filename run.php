#!/data/data/com.termux/files/usr/bin/php
<?php
if(strtolower(substr(PHP_OS, 0, 3)) == "win") {
$bersih="cls";
} else {
$bersih="clear";
}
function input($echo) {
	echo $echo." -->\033[32;1m ";
}
menu:
system($bersih);
$green  = "\e[92m";
$red    = "\e[91m";
$yellow = "\e[93m";
$blue   = "\e[36m";
$r = "\033[31m";
$w = "\033[37m";
$W = "\033[36;1m";
echo "\033[31;1m
 ____
/ ___|   ┏━╸┏━╸┏┓╻
\___ \╺━╸┃╺┓┣╸ ┃┗┫
 ___) |  ┗━┛┗━╸╹ ╹
|____/\n";
echo "\033[32mShortlink-Generator\n";
echo $blue."
\033[33m===============================================>
$r-------------[+]$w Author     $r:$W Mr.CBR
$r  -------------[+]$w Code      $r:$W PHP
$r   -------------[+]$w Github    $r:$W http://github.com/afelfgie
$r   -------------[+]$w Team      $r:$W Mls18hckr
$r  -------------[+]$w Version   $r:$W 0.2
$r-------------[+]$w Date       $r:$W 02-10-2018\033[33m
\033[33m===============================================>\n";
echo "\n";
if(isset($argv[1])) {
	$url=$argv[1];
} else {
	echo "\033[31mUsage : \033[37mphp run.php www.example.com\n";
	die();
}
$param="https://www.googleapis.com/urlshortener/v1/url?key=AIzaSyDKvTCsXX3Vipbqyhj3a0JH1D3JYMuB5VM";
$post = array(
"longUrl"=> $url
);
$jsondata = json_encode($post);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$param);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type:application/json"));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsondata);
$response=curl_exec($ch);
curl_close($ch);
$json=json_decode($response);
//print_r($json);
if(isset($json->error)) {
	echo $json->error->message;
	} else {
		echo "\033[36;1mLink   :\033[37m ".$json->longUrl."\n";
		echo "\033[36;1mResult :\033[37m 
".$json->id."\n";
		}
echo "\033[33m===============================================>\n";
