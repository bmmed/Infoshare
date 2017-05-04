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
if( isset($_POST['admin_pseudo']) and isset($_POST['admin_m_p']) and !empty($_POST['admin_pseudo'])and !empty($_POST['admin_m_p']))
{
	$pseudo=test_input($_POST['admin_pseudo']); 
	$m_p=md5(test_input($_POST['admin_m_p']));


include('cnx_db.php');

	$user_info=$bdd->query("SELECT *  FROM admin WHERE admin_pseudo='$pseudo'");
	$donnee=$user_info->fetch();

	if ($m_p==$donnee['admin_m_p'])
	{
		$bdd =NULL;
		$_SESSION=$donnee;
		echo '<script>window.location = "../acceuil_admin.php";</script>';
	}

	else  echo '<script>window.location = "../index.php";</script>';

}

else  echo '<script>window.location = "../index.php";</script>';

?>