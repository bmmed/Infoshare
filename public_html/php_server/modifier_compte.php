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
if ($_SERVER["REQUEST_METHOD"] == "POST") {


	if (isset($_POST['pseudo']) and !empty ($_POST['pseudo'])) $pseudo=test_input($_POST['pseudo']);else $pseudo=$_SESSION['user_pseudo'];

	if (isset($_POST['nom']) and !empty ($_POST['nom']))$nom = test_input($_POST['nom']);else $nom=$_SESSION['user_nom'];

	if (isset($_POST['prenom']) and !empty ($_POST['prenom']))$prenom = test_input($_POST['prenom']);else $_SESSION['user_prenom'];

	if (isset($_POST['jour']) and isset($_POST['mois']) and isset($_POST['annee']) 
		and !empty ($_POST['jour']) and !empty ($_POST['mois']) and !empty ($_POST['annee']) )
	{
		$jour = test_input($_POST['jour']);
		$mois = test_input($_POST['mois']);
		$annee = test_input($_POST['annee']);
		$date_naiss = $annee.'-'.$mois.'-'.$jour;
	}else 	$date_naiss = $_SESSION['user_date_nais'];

	if (isset($_POST['sexe']) and !empty ($_POST['sexe']))$sexe = test_input($_POST['sexe']); else $sexe = $_SESSION['user_sexe'];
	if (isset($_POST['annee_etude']) and !empty ($_POST['annee_etude']))$annee_etude = test_input($_POST['annee_etude']);
	else $annee_etude= $_SESSION['user_annee_univ'];
	if (isset($_POST['email']) and !empty ($_POST['email']))$email=test_input($_POST['email']);else $email=$_SESSION['user_email'];
	if (isset($_POST['pwd']))$pwd=test_input($_POST['pwd']);else $pwd="";
	if (isset($_POST['cpwd']))$cpwd=test_input($_POST['cpwd']);else $cpwd="";




	if(empty($pseudo) OR empty($cpwd))


	{

		exit('<font color="red">Attention,  les chap de mot de passe sont vide !</font>');
	}
	else{

		if($pwd==$cpwd){

include('cnx_db.php');


			if(isset($_FILES['fichier']) and !empty($_FILES['fichier']['name']))
			{



				$fich_nom= $_FILES['fichier']['name'];
				$nom_tmp=$_FILES['fichier']['tmp_name'];
				$time_fich=date('m-Y',time());
				$fich_path='/upload/img_user/'.$time_fich.$fich_nom;

				/************************************************************************************/
				$img_ext=$_FILES['fichier']['type'];
				if ( strpos($img_ext,'png') or strpos($img_ext,'jpg')  or  strpos($img_ext,'jpeg'))
				{ 


					if ( file_exists('../'.$_SESSION['user_img_path']) ) {
						unlink( '../'.$_SESSION['user_img_path'] ) ;
					}


					if ( strpos($img_ext,'jpg')  or  strpos($img_ext,'jpeg'))
						$img = imagecreatefromjpeg ($_FILES['fichier']['tmp_name']);
					elseif ( strpos($img_ext,'png'))
						$img = imagecreatefrompng($_FILES['fichier']['tmp_name']);


					$size=getimagesize($_FILES['fichier']['tmp_name']);


					$larg=100;
					$long=100;

					$img_dest=imagecreatetruecolor($larg,$long);
					$copy=imagecopyresampled($img_dest,$img,0,0,0,0,$larg,$long,$size[0],$size[1]);

					imagejpeg($img_dest,'../'.$fich_path);


					imagedestroy($img_dest);
				} 
				else {exit('ce n\'est pas une image');}


				/************************************************************************************/

			}
			else {$fich_path=$_SESSION['user_img_path'];}

			$pwd_hash=md5($pwd);

			$user_id = $_SESSION['user_id'];

			
			$bdd->query("UPDATE `user` SET `user_pseudo`='$pseudo',`user_nom`='$nom',`user_prenom`='$prenom',`user_date_nais`='$date_naiss',`user_sexe`='$sexe',
`user_annee_univ`='$annee_etude',`user_email`='$email',`user_m_p`='$pwd_hash',`user_img_path`='$fich_path'
WHERE user_id = $user_id");


			{
				session_destroy();
				$msg_ok='Vos donnée ont etes bien modiefier veuiller vous connecter directement';
				echo '<script>window.location = "../index.php?msg_ok='.$msg_ok.'";</script>';
			}




		} else

			exit('<font color="red">les mot de passe sont diferant !</font>');

	}

}


?>
