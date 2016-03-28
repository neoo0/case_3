<?php
$url="001.png";
$info=getimagesize($url);
$type=image_type_to_extension($info[2],false);
$fun="imagecreatefrom".$type;
$image=$fun($url);

/*2*/
//要实现缩略图的话，得把原图压缩在一个空白画板里（控制画板的长和宽）<br>
//1.$image_thumb = imagecreatetruecolor(300,200)//创建300*200的空白画布<br>
$image_thumb=imagecreatetruecolor(300,200);
//2.核心步骤:将原图压缩到新建的真色彩画布上,并按照一定比例压缩
//imagecopyresampled($image,$image_thumb,0,0,0,0,300,200,'原图宽',原图高');//300*200意思的铺满它,四个0代表左上角对齐
imagecopyresampled($image_thumb,$image,0,0,0,0,300,200,$info[0],$info[1]);
imagedestroy($image);

/*3*/
//$image_thumb格式??-->
header("content-type:".$info['mime']);
$funs="image{$type}";
$funs($image_thumb);

$funs($image_thumb,"bianbian.".$type);
/*4*/
imagedestroy($image);



?>