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
if( isset($_POST['sup_id']) and isset($_POST['m_p_confirme']))
{
	$m_p_confirme=md5(test_input($_POST['m_p_confirme']));
	$sup_id=test_input($_POST['sup_id']);

	if($m_p_confirme==$_SESSION['user_m_p']  and  $sup_id==$_SESSION['user_id']){


include('cnx_db.php');
		
		
		$fich_path=$_SESSION['user_img_path'];
		if ( strpos($fich_path,'upload/img_user'))
		{
		
		if ( file_exists('../'.$fich_path) ) {
			unlink( '../'.$fich_path ) ;
		}
		}
		$bdd->query("DELETE FROM user WHERE user_id='$sup_id'");
		$bdd =NULL;
		echo '<script>window.location = "../index.php";</script>';

	}else  echo '<script>window.location = "../compte.php";</script>';


}

else  echo '<script>window.location = "../compte.php";</script>';

?>