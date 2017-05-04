<?php

$img_ext=$_FILES['fichier']['type'];
if ( strpos($img_ext,'png') or strpos($img_ext,'jpg')  or  strpos($img_ext,'jpeg'))
{ 



$img = imagecreatefromjpeg ($_FILES['fichier']['tmp_name']);
$size=getimagesize($_FILES['fichier']['tmp_name']);
$larg=$size[0];
$long=$size[1];

$p_c=(550*100)/$size[0];



$larg=$size[0]*$p_c/100;
$long=$size[1]*$p_c/100;

$img_dest=imagecreatetruecolor($larg,$long);
$copy=imagecopyresampled($img_dest,$img,0,0,0,0,$larg,$long,$size[0],$size[1]);

/*imagejpeg($img_dest,'../css_admin/'.$fichier);*/


imagedestroy($img_dest);
} 
    else {exit('ce nes pas une image');}
?>