<?php
session_start();
?>

<?php

										function test_input($data) {
											$data = trim($data);
											$data = stripslashes($data);
											$data = htmlspecialchars($data);
											$data=addslashes($data);
											return $data;
											}



if( isset($_FILES['fichier']) and isset($_POST['annee_etude'])and isset($_POST['module'])and isset($_POST['Type_fich']))
{

	$fich_annee_univ= test_input($_POST['annee_etude']); 
	$fich_module=test_input($_POST['module']);
	$fich_type=test_input($_POST['Type_fich']);
	$fich_nom= $_FILES['fichier']['name'];
	$fich_user_id=$_SESSION['user_id'];
	$fich_ext=$type=$_FILES['fichier']['type'];
	$time_fich=date('d-m-Y_H_i_s',time());

	if($fich_type=='cour'){$fich_path='/upload/cour/'.$time_fich.$fich_nom;
						   $fich_path=test_input($fich_path); $table='cour';}
	elseif($fich_type=='td' or $fich_type=='td_corr'){$fich_path='/upload/td/'.$time_fich.$fich_nom; 
							$fich_path=test_input($fich_path);$table='td';}
	elseif($fich_type=='tp' or $fich_type=='tp_corr'){$fich_path='/upload/tp/'.$time_fich.$fich_nom; 
							 $fich_path=test_input($fich_path);$table='tp';}
	elseif($fich_type=='emd' or $fich_type=='emd_corr'){$fich_path='/upload/emd/'.$time_fich.$fich_nom;
							$fich_path=test_input($fich_path);$table='emd';}


	include('cnx_db.php');


	$bdd->query("INSERT INTO `$table`( `cour_anne_univ`, `cour_module`, `cour_nom`, `cour_type`, `cour_date_pub`, `cour_user_id`, `cour_path`, `cour_ext`) VALUES ('$fich_annee_univ','$fich_module','$fich_nom','$fich_type',NOW(),'$fich_user_id','$fich_path','$fich_ext')");


	$nom_tmp=$_FILES['fichier']['tmp_name'];
	move_uploaded_file($nom_tmp, '..'.$fich_path);

	$bdd =NULL;
	echo '<script>window.location = "../cour.php";</script>';


}

else echo '<script>window.location = "../cour.php";</script>';

?>