<?php
session_start();
?>

<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>inscription</title>

  <link rel="shortcut icon" href="img/logo_icon.png">

  <link rel="stylesheet" href="./css/gle/gle.css">
  <link rel="stylesheet" 	 media="only screen and (min-width:901px) "		 			 href="./css/gle/gle_large.css">
  <link rel="stylesheet"   media="only screen and (min-width:601px) and (max-width:900px)" href="./css/gle/gle_medium.css">
  <link rel="stylesheet"   media="only screen and (min-width:100px) and (max-width:600px)" href="./css/gle/gle_small.css">
  <link rel="stylesheet" href="./css/input_style.css">
    <link rel="stylesheet" href="./css/inscription/insc.css">
    
  
<script src="js/inscription.js"></script>
  


 </head>
 <body>

    <header>
      <a href="index.php"><img class="logo" src="./img/small/logo_small.png"/></a>
   
    </header>
    <div class="header_fix"></div>





<?php 
    if( isset($_SESSION['msg_erreur']) )
    {
      echo('<h3 class="ph_erreur">'.$_SESSION['msg_erreur'].'</h3>');
     $_SESSION['msg_erreur']=null;
    }

    
    ?>

  <div class="formulaire"><!--le formuulaire d'inscription  -->

   <h1>Remplire le formulaire si dessue</h1>

   <form method="post" action="./php_server/insc_user.php" enctype="multipart/form-data">

    <div class="form_item">   
     <label for="pseudo">Votre Pseudo*: </label>  
     <input type="text" id="pseudo_inscription" required placeholder="votre pseudo EX : bbm29 " name="pseudo" onblur="is_pseudo()"> 
    </div> 

    <div class="form_item"> 
     <label for="nom">Votre Nom*: </label>   
     <input type="text" id="nom" required  placeholder="nom EX : Amrane" name="nom" onblur="is_name()">
    </div>  

    <div class="form_item"> 
     <label for="preN">Votre Prenom*: </label>  
     <input type="text" id="preN" required  placeholder="prenom EX : Ali "  name="prenom"  onblur="is_surname()">
    </div> 

    <div class="form_item">   
     <label for="sexe">sexe*: </label>  
     <select name="sexe" required>
     <option value="">sexe</option>
      <option value="m">Homme</option>
      <option value="f" >Femme</option>
     </select>
    </div> 

    <div class="form_item"> 
     <label for="d_j">Date de Naissance*: </label>
     <div class="date_contenair">
      <input type="number" id="d_j" required name="jour" placeholder="JJ"   min="1" max="31" class="style_date"> 
      <input type="number" id="d_m"  required  name="mois" placeholder="MM"  min="1" max="12" class="style_date">
      <input type="number" id="d_a"  required name="annee" placeholder="AAAA"  name="annee"  min="1962" max="<?php
echo (date('Y',(time()))-10);
?>" class="style_date" onblur="date()"> 
     </div>
    </div> 
    
    
    <div class="form_item">  
     <label for="user_img">Ajouter une photo:</label>
     <div>
     <input type="file" id="user_img"   name="fichier" class="user_img" accept=".jpg,.jpeg,.png"> 
     </div>
    </div> 

    <div class="form_item">   
     <label for="annee_etude">Année d'etude*: </label>  
     <select name="annee_etude" required>
     <option value="">Année d'etude</option>
      <option value="l2">L2</option>
      <option value="l3" >L3</option>
      <option value="m1" >M1</option>
      <option value="m2" >M2</option>
 


     </select>
    </div> 

    <div class="form_item"> 
     <label for="Email">Votre Adresse Email*: </label>
     <input type="email" id="Email"  name="email" placeholder="em@il EX : boite@sever.com" onblur="is_mail()" required> 
    </div>


    <div class="form_item">  
     <label for="pass">Votre mot de passe*: </label>
     <input type="password" id="pass"   name="pwd"  placeholder="mot de passe au moins 6 caractère" required> 
    </div> 

    <div class="form_item">     
     <label for="Cpass">Confirmer votre mot de passe*: </label>  
     <input type="password" id="Cpass" name="cpwd" placeholder="confirmer" onblur="valid_mdpass()">  
    </div> 


    <div class="box_conf">    
     <input type="checkbox" id="conf"  onclick="valid_mdpass()" required>  
     <label for="conf">Confirmer vos donner*: </label> 
    </div>

    <div class="btn_sub"><input type="submit" id="termine" value="s'inscrire" onsubmit="form_valide()"></div> 


   </form>


  </div>





    <div class="clear"></div>
    <?php 
include('page_element/footer.php');
    ?>

    <script src="./js/jquery.min.js"></script>
    <script src="./js/gle.js"></script>
        <script src="./js/bootstrap-filestyle.js"></script>

    <script>
      $(":file").filestyle('placeholder');
      $(":file").filestyle('placeholder', '.jpeg .png');

      $(":file").filestyle('buttonText');
      $(":file").filestyle('buttonText', 'votre Photo');
    </script>

 </body>
</html>