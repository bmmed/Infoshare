
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




	$fich_all=$bdd->query("SELECT *  FROM user WHERE user_id='$sup_id'" );
	$fich_unit=$fich_all->fetch();
	$fich_path=$fich_unit['user_img_path'];
	if ( strpos($fich_path,'upload/img_user'))
	{

		if ( file_exists('../..'.$fich_path) ) {
			unlink( '../..'.$fich_path ) ;
		}
	}

	$bdd->query("DELETE FROM user WHERE user_id='$sup_id'");
	$bdd =NULL;
	echo'<script>window.location = "../utilisateur_admin.php";</script>';

}

else  echo 'exhec de la supression';

?>