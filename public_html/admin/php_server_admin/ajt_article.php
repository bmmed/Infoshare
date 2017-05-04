
<?php
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data=addslashes($data);
	return $data;
}
if( isset($_FILES['fichier']) and isset($_POST['art_titre'])and isset($_POST['art_texte'])and isset($_POST['art_lien']))
{

	$art_titre= test_input($_POST['art_titre']); 
	$art_texte=test_input($_POST['art_texte']);
	$art_lien=test_input($_POST['art_lien']);
	$fich_nom= $_FILES['fichier']['name'];
	$time_fich=date('m-Y',time());
	$fich_path='/upload/img_article/'.$time_fich.$fich_nom;

include('cnx_db.php');


	/************************************************************************************/
	$img_ext=$_FILES['fichier']['type'];
	if ( strpos($img_ext,'png') or strpos($img_ext,'jpg')  or  strpos($img_ext,'jpeg'))
	{ 


if ( strpos($img_ext,'jpg')  or  strpos($img_ext,'jpeg'))
		$img = imagecreatefromjpeg ($_FILES['fichier']['tmp_name']);
		elseif ( strpos($img_ext,'png'))
		$img = imagecreatefrompng($_FILES['fichier']['tmp_name']);
		
		
		$size=getimagesize($_FILES['fichier']['tmp_name']);

		if($size[0]>550){
			$p_c=(550*100)/$size[0];

			$larg=$size[0]*$p_c/100;
			$long=$size[1]*$p_c/100;
		}else{
			$larg=$size[0];
			$long=$size[1];
		}



		$img_dest=imagecreatetruecolor($larg,$long);
		$copy=imagecopyresampled($img_dest,$img,0,0,0,0,$larg,$long,$size[0],$size[1]);

		imagejpeg($img_dest,'../..'.$fich_path);


		imagedestroy($img_dest);
	} 
	else {

		exit('ce n\'est pas une image');
	}


	/************************************************************************************/	

	$bdd->query("INSERT INTO `article`(`art_date_pub`, `art_titre`, `art_texte`, `art_img_path`, `art_lien`) VALUES (NOW(),'$art_titre','$art_texte','$fich_path','$art_lien')");


	$bdd =NULL;
	echo'<script>window.location = "../acceuil_admin.php";</script>';


}

else echo 'echec de l\'operation';

?>