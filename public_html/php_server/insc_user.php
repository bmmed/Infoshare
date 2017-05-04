
<?php

session_start();
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data=addslashes($data);
  return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  /*
if(isset($_POST['pseudo']) and isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['jour']) and isset($_POST['mois']) and isset($_POST['annee']) and isset($_POST['sexe']) and isset($_POST['annee_etude']) and isset($_POST['email']) and isset($_POST['pwd']) and isset($_POST['cpwd']))
*/


  if (isset($_POST['pseudo'])) $pseudo=test_input($_POST['pseudo']);else $pseudo="";
  if (isset($_POST['nom']))$nom = test_input($_POST['nom']);else $nom="";
  if (isset($_POST['prenom']))$prenom = test_input($_POST['prenom']);else $prenom="";
  if (isset($_POST['jour']))$jour = test_input($_POST['jour']);else $jour="";
  if (isset($_POST['sexe']))$sexe = test_input($_POST['sexe']);else $sexe="";
  if (isset($_POST['mois']))$mois = test_input($_POST['mois']);else $mois="";
  if (isset($_POST['annee']))$annee = test_input($_POST['annee']);else $annee="";
  if (isset($_POST['annee_etude']))$annee_etude = test_input($_POST['annee_etude']);else $annee_etude="";
  if (isset($_POST['email']))$email=test_input($_POST['email']);else $email="";
  if (isset($_POST['pwd']))$pwd=test_input($_POST['pwd']);else $pwd="";
  if (isset($_POST['cpwd']))$cpwd=test_input($_POST['cpwd']);else $cpwd="";
  $date_naiss = $annee.'-'.$mois.'-'.$jour;



  if(empty($pseudo) OR empty($nom) OR empty($prenom) OR empty($annee_etude) OR empty($email) OR empty($pwd) OR empty($cpwd))


  {
       $msg_erreur='Attention, aucun chomp ne doit rester vide !';
          $_SESSION['msg_erreur']= $msg_erreur;
          header('location:../inscription.php');
          exit();
             
  }
  else{

    if($pwd==$cpwd){

include('cnx_db.php');




      $user_all=$bdd->query("SELECT * FROM  user WHERE user_pseudo LIKE '$pseudo'");
      while($user_unit=$user_all->fetch())
      {
        if($pseudo==$user_unit['user_pseudo']) 
        {
                 $msg_erreur='Ce pseudo existe deja !';
          $_SESSION['msg_erreur']= $msg_erreur;
          header('location:../inscription.php');
          exit();
             
        }
      }

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
        else {
          $msg_erreur='fausse image';
          $_SESSION['msg_erreur']= $msg_erreur;
          header('location:../inscription.php');
          exit();
             
             }


        /************************************************************************************/

      }
      else {
        if($sexe=='m')$fich_path='/img/user_m.png';
        else $fich_path='/img/user_f.png';

      }

      $pwd_hash=md5($pwd);


      $bdd->query("INSERT INTO `user`( `user_pseudo`, `user_nom`, `user_prenom`, `user_date_nais`, `user_sexe`, `user_annee_univ`, `user_email`, `user_m_p`, `user_img_path`, `user_date_insc`) VALUES ('$pseudo','$nom','$prenom','$date_naiss','$sexe','$annee_etude','$email','$pwd_hash','$fich_path',NOW())");

{
	$msg_ok='Vous etes bien inscrit veuiller vous connecter directement';
	echo '<script>window.location = "../index.php?msg_ok='.$msg_ok.'";</script>';
}

      


    } else{
                     $msg_erreur='Les mot de passe sont diferant !';
          $_SESSION['msg_erreur']= $msg_erreur;
          header('location:../inscription.php');
          exit();
    }

  }

}


?>
