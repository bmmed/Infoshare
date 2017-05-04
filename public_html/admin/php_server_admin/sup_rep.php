
<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
	$data=addslashes($data);
  return $data;
}

if( isset($_POST['sup_id']) and isset($_POST['msg_id']) )
{

	$sup_id=test_input($_POST['sup_id']);


include('cnx_db.php');
	
		
		$fich_all=$bdd->query("DELETE  FROM rep_msg WHERE rep_id='$sup_id'" );

	$bdd =NULL;
echo'<script>window.location = "../forum_admin/forum_reponce.php?id_msg='.$_POST['msg_id'].'";</script>';

}

else  echo 'exhec de la supression';

?>