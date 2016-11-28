<?
session_start();
$checknum=dechex(rand(0x10000,0x99999));
$ssecuritycode=substr(md5(hexdec($checknum)),6,6);
$ssecuritycode=strtoupper($ssecuritycode);
$_SESSION['ssecuritycode'] = $ssecuritycode;

function createimagestr($str)
	{
	$w = 58;
	$h = 20;
	$i = imagecreate($w,$h);
	$bg = imagecolorallocate ($i, 0xEE, 0xEE, 0xEE);
	$fg = imagecolorallocate ($i, 0xFF, 0xFF, 0xFF);
	$sc = imagecolorallocate ($i, 0x41, 0x4B, 0x56);
	imagestring ($i, 200, 2, 2,  $str , $sc);
	$x = 15;
	$y = $h - 10;
	$base = 0;
	$largest = 0;
	$interval = 900;
	$nextinterval = $interval;
	$x = 11;
	header("Content-Type: image/png");
	imagepng($i);
	}
	createimagestr($ssecuritycode);
	?>