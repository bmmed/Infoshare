
<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
	$data=addslashes($data);
  return $data;
}
if( isset($_FILES['fichier']) and isset($_POST['affi_titre'])and isset($_POST['affi_type'])and isset($_POST['affi_annee_univ']))
{

	$affi_titre= test_input($_POST['affi_titre']); 
	$affi_type=test_input($_POST['affi_type']);
	$affi_annee_univ=test_input($_POST['affi_annee_univ']);
	$fich_nom= $_FILES['fichier']['name'];
	$fich_ext=$type=$_FILES['fichier']['type'];
	$time_fich=date('m-Y',time());
	$fich_path='/upload/affichage/'.$time_fich.$fich_nom;
	
include('cnx_db.php');
	
	$bdd->query("INSERT INTO `affichage`(`aff_nom`, `aff_titre`, `aff_date_pub`, `aff_annee_univ`, `aff_type`, `affi_ext` , `affi_path`) VALUES ('$fich_nom','$affi_titre',NOW(),'$affi_annee_univ','$affi_type','$fich_ext','$fich_path')");


	$nom_tmp=$_FILES['fichier']['tmp_name'];
	move_uploaded_file($nom_tmp, '../..'.$fich_path);

	$bdd =NULL;
	echo'<script>window.location = "../affichage_admin.php";</script>';


}

else echo 'echec de l\'operation';

?>