<?php
/*打开图片*/
//1.配置图片路径
$src="001.png";
//2,获取图片信息(同拖GD库提供的方法,得到你想要处理图片的基本信息)
$info=getimagesize($src);
//3,通过图片的编号获取图像的类型//后面的参数要不要点.//另外 jpeg 的缩写 jpg
$type=image_type_to_extension($info[2],false);
//4.在内存中创建一个和图像类型一样的图像-->拼出一个创建函数
$fun="imagecreatefrom{$type}";//背后jpeg-->imagecreatefromjpeg ;gif-=>imagecreatefromgif;png;反正创建不同格式图片用不同函数,这样写
//5,把图片复制到我们内存中
$image=$fun($src);
//下面能不能用$src(非内存地址)

/*操作图片*/
//(1)设置字体的路径 $font = '..ttf';<br><br>
$font="msyh.ttf";
//(2)设置水印内容 $content = '你好，php';<br><br>
$content="hello";

$col=imagecolorallocatealpha($image,255,255,255,50);

//(4)写入水印文字 imagetfftext($image,'字体大小','旋转角','x轴偏移量','y轴偏移量',$col,$font,$content,)//
imagettftext($image,20,0,20,30,$col,$font,$content);

/*输入图片*/
//浏览器输出--告诉浏览器,我们输出的格式是图片

header("content-type:".$info['mime']);
$fun1="image{$type}";//又是jpeg,png,gif函数各异的情况
$fun1($image);

//保存图片
$fun1($image,'newimage.'.$type);

/*销毁图片*/
//释放内存
imagedestroy($image);
imagedestroy($image);


?>
