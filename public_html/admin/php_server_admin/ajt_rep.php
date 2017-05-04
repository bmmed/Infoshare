

<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
	$data=addslashes($data);
  return $data;
}
if( isset($_POST['reponce']) )
{
	$rep_msg_id=$_POST['id_msg'];
	$rep_texte=test_input($_POST['reponce']);
	$rep_user_id=-1;
	$rep_user_pseudo='Adminstrateur';

include('cnx_db.php');

$bdd->query("INSERT INTO `rep_msg`( `rep_user_id`, `rep_user_pseudo`, `rep_msg_id`, `rep_date_pub`, `rep_texte`) VALUES ('$rep_user_id','$rep_user_pseudo','$rep_msg_id',NOW(),'$rep_texte')");
$bdd =NULL;
echo '<script>window.location = "../forum_admin/forum_reponce.php?id_msg='.$rep_msg_id.'";</script>';

}

else  echo 'echec de l\'operation';

?>
