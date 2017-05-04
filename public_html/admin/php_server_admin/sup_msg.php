
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
		
		$fich_all=$bdd->query("DELETE  FROM rep_msg WHERE rep_msg_id='$sup_id'" );

	
	$bdd->query("DELETE FROM msg WHERE msg_id='$sup_id'");
	$bdd =NULL;
echo'<script>window.location = "../forum_admin/forum_admin.php";</script>';

}

else  echo 'exhec de la supression';

?>