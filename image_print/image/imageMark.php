<?php
/*1*/
$url="001.png";
$info=getimagesize($url);
$type=image_type_to_extension($info[2],false);
$fun="imagecreatefrom{$type}";
$image=$fun($url);

/*2*/
//1,设置水印图片路径

$url1="logo.png";
$info1=getimagesize($url1);
$type1=image_type_to_extension($info1[2],false);
$fun1="imagecreatefrom{$type1}";
$water=$fun1($url1);
//6,合并图片

imagecopymerge($image,$water,20,30,0,0,$info1[0],$info1[1],50);//这句话本身是把水印全部盖上去;

//操作原图片和水印图片的步骤相同，多了一个合并图片函数://可以看作把水印(小)图片复制到目标(大)图片上,然后大图片就变了

//imagecopymerge($img,$water,xoffset,yoffset,xstart,ystart,xend,yend,opacity);
//参数分别表示：目标图片，水印图片，复印到目标图片的位置x处，复印到目标图片的位置y处，从水印图片的x处开始复制，从水印图片的y处开始复制，从水印图片的x处结束复制，从水印图片的y处结束复制，水印图片的透明度。

//7,先从内存中消除水印图片，再从内存消除大图片
imagedestroy($water);

/*3*/
header("content-type:".$info['mime']);//$info[mime]和 $info[2]的区别
$func="image{$type}";
$func($image);

$func($image,"new_water.".$type);

/*4*/
imagedestroy($image);

?>






