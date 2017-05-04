<?php
    session_start();

 if(isset($_SESSION['user_pseudo']) ){
?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifier le compte</title>

  <link rel="shortcut icon" href="img/logo_icon.png">

  <link rel="stylesheet" href="./css/gle/gle.css">
  <link rel="stylesheet" 	 media="only screen and (min-width:901px) "		 			 href="./css/gle/gle_large.css">
  <link rel="stylesheet"   media="only screen and (min-width:601px) and (max-width:900px)" href="./css/gle/gle_medium.css">
  <link rel="stylesheet"   media="only screen and (min-width:100px) and (max-width:600px)" href="./css/gle/gle_small.css">
  <link rel="stylesheet" href="./css/input_style.css">
    <link rel="stylesheet" href="./css/inscription/insc.css">
    <link rel="stylesheet" href="./css/compte/compte.css">

<script src="js/inscription.js"></script>


 </head>
 <body>

 
    <?php 
include('page_element/header01.php');
    ?>


    <div class="clear"></div>


    <?php 
include('page_element/box_user.php');
    ?>









  <div class="formulaire"><!--le formuulaire d'inscription  -->

  
   
      <div class="contenaire_sup">
        <div class="slide_sup"> 

          <h2>Suprimer votre compte</h2>
          <img src="./img/close.png">
        </div>
        <div class="box_sup">

          <h3>Voulez vous vraiment suprimer votre compte ?</h3>
           <div class="btn_sup_oui"> 
              <img src="./img/oui.png">
              <h2>OUI</h2>
            </div>
              <div class="btn_sup_non"> 
              <img src="./img/non.png">
              <h2>NON</h2>
            </div>
       </div>
       
       <div class="box_sup_valide">

      <form method="post" action="./php_server/sup_compte.php" class="form_sup">
       <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="sup_id" >
       <input type="password" name="m_p_confirme" placeholder="votre mot de passe">
       <input type="submit" value="suprimer">
      </form>
       </div>
      </div>
  
  
  
   <h1>Remplire le formulaire si dessue</h1>
   <h3 class="ph_erreur"> Remplisser juste les champ que vous voulez changer **</h3>
   <form method="post" action="./php_server/modifier_compte.php" enctype="multipart/form-data">

    <div class="form_item">   
     <label for="pseudo">Votre Pseudo: </label>  
     <input type="text" id="pseudo_inscription" required placeholder="votre pseudo" name="pseudo" onblur="is_pseudo()" value="<?php echo $_SESSION['user_pseudo']; ?>"> 
    </div> 

    <div class="form_item"> 
     <label for="nom">Votre Nom: </label>   
     <input type="text" id="nom" required  placeholder="nom" name="nom" onblur="is_name()" value="<?php echo $_SESSION['user_nom']; ?>">
    </div>  

    <div class="form_item"> 
     <label for="preN">Votre Prenom: </label>  
     <input type="text" id="preN" required  placeholder="prenom"  name="prenom"  onblur="is_surname()" value="<?php echo $_SESSION['user_prenom']; ?>">
    </div> 

    <div class="form_item">   
     <label for="sexe">sexe: </label>  
     <select name="sexe" required value="f">
     <option value="">sexe</option>
      <option value="m"<?php if ($_SESSION['user_sexe']=='m') echo ('selected'); ?> >Homme</option>
      <option value="f"<?php if ($_SESSION['user_sexe']=='f') echo ('selected'); ?> >Femme</option>
     </select>
    </div> 
     <?php
$date = date_create($_SESSION['user_date_nais']);
?>
    <div class="form_item"> 
     <label for="d_j">Date de Naissance: </label>
     <div class="date_contenair">
      <input type="number" id="d_j" required name="jour" placeholder="JJ"   min="1" max="31" class="style_date" 
      value="<?php  echo date_format($date, 'd');?>"> 
      <input type="number" id="d_m"  required  name="mois" placeholder="MM"  min="1" max="12" class="style_date" value="<?php  echo date_format($date, 'm');?>">
      <input type="number" id="d_a"  required name="annee" placeholder="AAAA"  name="annee"  min="1962" max="2015" class="style_date" onblur="date()" value="<?php  echo date_format($date, 'Y');?>">
     </div>
    </div> 
  
   
    
    
    <div class="form_item">  
     <label for="user_img">Ajouter une photo :</label>
      <input type="file" id="user_img"   name="fichier" class="user_img" accept=".jpg,.jpeg,.png"> 
    </div> 

    <div class="form_item">   
     <label for="annee_etude">Année d'etude: </label>  
     <select name="annee_etude" required>
      <option value="l2" <?php if ($_SESSION['user_annee_univ']=='l2') echo ('selected'); ?>>L2</option>
      <option value="l3" <?php if ($_SESSION['user_annee_univ']=='l3') echo ('selected'); ?>>L3</option>
      <option value="m1" <?php if ($_SESSION['user_annee_univ']=='m1') echo ('selected'); ?>>M1</option>
      <option value="m2" <?php if ($_SESSION['user_annee_univ']=='m2') echo ('selected'); ?>>M2</option>



     </select>
    </div> 

    <div class="form_item"> 
     <label for="Email">Votre Adresse Email: </label>
     <input type="email" id="Email"  name="email" placeholder="em@il" onblur="is_mail()" value="<?php echo $_SESSION['user_email']; ?>"> 
    </div>


    <div class="form_item">  
     <label for="pass">Votre mot de passe: </label>
     <input type="password" id="pass"   name="pwd"  placeholder="mot de passe" required> 
    </div> 

    <div class="form_item">     
     <label for="Cpass">Confirmer votre mot de passe: </label>  
     <input type="password" id="Cpass" name="cpwd" placeholder="confirmer" onblur="valid_mdpass()">  
    </div> 


    <div class="box_conf">    
     <input type="checkbox" id="conf"  onclick="valid_mdpass()" required>  
     <label for="conf">Confirmer vos donner: </label> 
    </div>

    <div class="btn_sub"><input type="submit" id="termine" value="Modifier"></div> 


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

<?php }else{
    echo '<script> window.location = "index.php" </script>';
}
         ?>
