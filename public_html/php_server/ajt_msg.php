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
if( isset($_POST['ajt_msg_titre']) and isset($_POST['message']))
{
	$msg_titre= test_input($_POST['ajt_msg_titre']); 
	$msg_texte=test_input($_POST['message']);
	$msg_user_id=$_SESSION['user_id'];
	$msg_user_pseudo=$_SESSION['user_pseudo'];

	
include('cnx_db.php');

	

$bdd->query("INSERT INTO msg (`msg_user_id`, `msg_user_pseudo`, `msg_date_pub`, `msg_titre`, `msg_texte`) VALUES ('$msg_user_id','$msg_user_pseudo',NOW(),'$msg_titre','$msg_texte')");

	$bdd =NULL;
echo '<script>window.location = "../forum/forum.php";</script>';

}

else  echo '<script>window.location = "../forum/forum.php";</script>';

?>