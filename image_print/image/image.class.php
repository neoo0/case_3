<?php
class Image{
	private $info;
	private $image;


	public function __construct($src){
		//图片信息只有内部调用,所以另外生成一个私有变量/
				//info[2]不清晰,把重要的三个分装成关联数组

		$info=getimagesize($src);
		$this->info=array(
			  "width"=> $info[0],
			  "height"=> $info[1],
			  "mime"=> $info['mine'],
		      "type"=> image_type_to_extension($info['2'],false)
			  );
		$fun="imagecreatefrom{$this->info['type']}";
		$this->image=$fun($src);
		//内存里的图片,调出来,
			}
		/*
	*压缩图片
	*/
	public function thumb($width,$height){//图片的宽高可以自定义
		$image_thumb=imagecreatetruecolor($width,$height);
		imagecopyresampled($image_thumb,$this->image,0,0,0,0,$width,$height,$this->info['width'],$this->info['height']);
		imagedestroy($this->image);
		$this->image=$image_thumb;		
	}
/* 	
 * 文字水印
 */	
	public  function  fontMark($content,$font_url,$size,$color,$local,$angle){//$color是数组,0-1-2-3,rgb,opacity??
			//
		$col=imagecolorallocatealpha($this->image,$color[0],$color[1],$color[2],$color[3]);
		imagettftext($this->image,$size,$angle,$local['x'],$local['y'],$col,$font_url,$content);//那个颜色在说明文档里可以吗,用一个数组做几个连起来的参数
	}
	
	/* 
	 * 图片水印
	 */
	public  function imageMark($source,$local,$alpha){//
		//能不能调用自己另一个析构函数,??
		$info1=getimagesize($source);
		$type1=image_type_to_extension($info1[2],false);
		$fun1="imagecreatefrom{$type1}";
		$water=$fun1($source);
		
		imagecopymerge($this->image,$water,$local['x'],$local['y'],0,0,$info1[0],$info1['1'],$alpha);
		imagedestroy($water);
		
		
	}
	
	/*在浏览器中显示*/
	public function show(){
		header("content-type:".$this->info['mime']);
		$fun="image{$this->info['type']}";
		$fun($this->image);
	}
	
	/*保存图片到硬盘里*/
	public function save($newname){//用户可以自定义名字
		//header("content-type:".$this->info['mime']);//??怎么没了
		$funs="image{$this->info['type']}";
		$funs($this->image,$newname.".".$this->info['type']);
	}
	
	/*销毁图图片*/
	//还是有不同的,写做水印的时候,在操作的时候去到一张,做压缩的时候画布作为最后的图片所以,最后销毁的要变
	public function __destruct(){
		imagedestroy($this->image);		
	}
	
}


?>