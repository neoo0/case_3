<?php
/*��ͼƬ*/
//1.����ͼƬ·��
$src="001.png";
//2,��ȡͼƬ��Ϣ(ͬ��GD���ṩ�ķ���,�õ�����Ҫ����ͼƬ�Ļ�����Ϣ)
$info=getimagesize($src);
//3,ͨ��ͼƬ�ı�Ż�ȡͼ�������//����Ĳ���Ҫ��Ҫ��.//���� jpeg ����д jpg
$type=image_type_to_extension($info[2],false);
//4.���ڴ��д���һ����ͼ������һ����ͼ��-->ƴ��һ����������
$fun="imagecreatefrom{$type}";//����jpeg-->imagecreatefromjpeg ;gif-=>imagecreatefromgif;png;����������ͬ��ʽͼƬ�ò�ͬ����,����д
//5,��ͼƬ���Ƶ������ڴ���
$image=$fun($src);
//�����ܲ�����$src(���ڴ��ַ)

/*����ͼƬ*/
//(1)���������·�� $font = '..ttf';<br><br>
$font="msyh.ttf";
//(2)����ˮӡ���� $content = '��ã�php';<br><br>
$content="hello";

$col=imagecolorallocatealpha($image,255,255,255,50);

//(4)д��ˮӡ���� imagetfftext($image,'�����С','��ת��','x��ƫ����','y��ƫ����',$col,$font,$content,)//
imagettftext($image,20,0,20,30,$col,$font,$content);

/*����ͼƬ*/
//��������--���������,��������ĸ�ʽ��ͼƬ

header("content-type:".$info['mime']);
$fun1="image{$type}";//����jpeg,png,gif������������
$fun1($image);

//����ͼƬ
$fun1($image,'newimage.'.$type);

/*����ͼƬ*/
//�ͷ��ڴ�
imagedestroy($image);
imagedestroy($image);


?>
