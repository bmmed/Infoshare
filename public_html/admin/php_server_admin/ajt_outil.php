
<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
	$data=addslashes($data);
  return $data;
}
if( isset($_FILES['fichier']) and isset($_POST['outil_nom'])and isset($_POST['outil_lien'])and isset($_POST['outil_annee_univ']))
{

	$outil_nom= test_input($_POST['outil_nom']); 
	$outil_lien=test_input($_POST['outil_lien']);
	$outil_annee_univ=test_input($_POST['outil_annee_univ']);
	$fich_nom= $_FILES['fichier']['name'];
	$time_fich=date('m-Y',time());
	$fich_path='/upload/img_outil/'.$time_fich.$fich_nom;
	
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

		$larg=70;
		$long=70;

		$img_dest=imagecreatetruecolor($larg,$long);
		$copy=imagecopyresampled($img_dest,$img,0,0,0,0,$larg,$long,$size[0],$size[1]);

		imagejpeg($img_dest,'../..'.$fich_path);


		imagedestroy($img_dest);
	} 
	else {exit('ce n\'est pas une image');}


	/************************************************************************************/
	
	$bdd->query("INSERT INTO `outil`(`outil_date_pub`, `outil_nom`, `outil_lien`, `outil_annee_univ`, `outil_img_path`) VALUES (NOW(),'$outil_nom','$outil_lien','$outil_annee_univ','$fich_path')");


	$bdd =NULL;
	echo'<script>window.location = "../outil_admin.php";</script>';


}

else echo 'echec de l\'operation';

?>