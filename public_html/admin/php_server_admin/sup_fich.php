
<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
	$data=addslashes($data);
  return $data;
}
if( isset($_POST['sup_id']) and isset($_POST['Type_fich']))
{

	$sup_id=test_input($_POST['sup_id']);
	$fich_type=test_input($_POST['Type_fich']);

		if($fich_type=='cour'){$table='cour';}
	elseif($fich_type=='td' or $fich_type=='td_corr'){$table='td';}
	elseif($fich_type=='tp' or $fich_type=='tp_corr'){$table='tp';}
	elseif($fich_type=='emd' or $fich_type=='emd_corr'){$table='emd';}


include('cnx_db.php');
	
	
	
		
		$fich_all=$bdd->query("SELECT *  FROM $table WHERE cour_id='$sup_id'" );
		$fich_unit=$fich_all->fetch();
		$fich_path=$fich_unit['cour_path'];
		
		
		if ( file_exists('../..'.$fich_path) ) {
			unlink( '../..'.$fich_path ) ;
		}
	
	$bdd->query("DELETE FROM $table WHERE cour_id='$sup_id'");
	$bdd =NULL;
echo'<script>window.location = "../cour_admin.php";</script>';

}

else  echo 'exhec de la supression';

?>