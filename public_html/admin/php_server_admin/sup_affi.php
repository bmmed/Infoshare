
<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
	$data=addslashes($data);
  return $data;
}

if( isset($_POST['sup_id']) )
{

	$sup_id=test_input($_POST['sup_id']);

include('cnx_db.php');
	
	
		
		$fich_all=$bdd->query("SELECT *  FROM affichage WHERE aff_id='$sup_id'" );
		$fich_unit=$fich_all->fetch();
		$fich_path=$fich_unit['affi_path'];
		
		
		if ( file_exists('../..'.$fich_path) ) {
			unlink( '../..'.$fich_path ) ;
		}
	
	$bdd->query("DELETE FROM affichage WHERE aff_id='$sup_id'");
	$bdd =NULL;
echo'<script>window.location = "../affichage_admin.php";</script>';

}

else  echo 'exhec de la supression';

?>