<?php
/* 	require_once 'image.class.php';
	$src='001.png';
	$image=new 	Image($src);
	$image->thumb(150,300);
	$image->show(); */
	
/* 
 * 	require_once 'image.class.php';
	$src='001.png';
	$content='hello world';
	$font_url='msyh.ttf';
	$size=100;
	//111,白;100:红,010:绿
	$color=array(
		0=>0,
		1=>0,
		2=>0,
		3=>20			
	);
	$local=array(
		'x'=>70,
		'y'=>390	
	);
	$angle=20;
	$image=new 	Image($src);
	//老师的思路是先写函数,定义号参数,然后再复制到这
	$image->fontMark($content,$font_url,$size,$color,$local,$angle);
	$image->show();
	$image->save('hi_girl');
	 */
require_once 'image.class.php';
$src='001.png';
$source='logo.png';
$local=array(
		'x'=>20,
		'y'=>50
);
$alpha=70;
$image=new 	Image($src);
$image->imageMark($source,$local,$alpha);
$image->thumb(500,1200);

$font_url='msyh.ttf';
$size=100;
//111,白;100:红,010:绿
$color=array(
		0=>0,
		1=>0,
		2=>0,
		3=>20
);
$local=array(
		'x'=>1010,
		'y'=>610
);
$angle=20;
$image->fontMark("受伤", $font_url, $size, $color, $local, $angle);
$image->show();
	?>