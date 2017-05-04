
<?php
    session_start();

 if(isset($_SESSION['admin_pseudo'])){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion utilisateurs</title>

    <link rel="shortcut icon" href="../img/logo_icon.png">

    <link rel="stylesheet" href="../css/gle/gle.css">
    <link rel="stylesheet" 	 media="only screen and (min-width:901px) "		 			 href="../css/gle/gle_large.css">
    <link rel="stylesheet"   media="only screen and (min-width:601px) and (max-width:900px)" href="../css/gle/gle_medium.css">
    <link rel="stylesheet"   media="only screen and (min-width:100px) and (max-width:600px)" href="../css/gle/gle_small.css">



    <link rel="stylesheet" href="../css/acceuil/acceuil.css">
    <link rel="stylesheet" 	 media="only screen and (min-width:901px) "		 			 href="../css/acceuil/acceuil_large.css">
    <link rel="stylesheet"   media="only screen and (min-width:601px) and (max-width:900px)" href="./css/acceuil/acceuil_medium.css">
    <link rel="stylesheet"   media="only screen and (min-width:100px) and (max-width:600px)" href="../css/acceuil/acceuil_small.css">

    <link rel="stylesheet" href="../css/cour/cour.css">
    <link rel="stylesheet" href="./css_admin/utilisateur.css">

  </head>


  <body>
    <!-- changer le font -->	


    <?php 
include('./page_element_admin/header01.php');
    ?>


    <div class="clear"></div>


    <?php 
include('./page_element_admin/box_user_admin.php');
    ?>


    <div class="contenaire_milieu">


      <div class="contenaire_rech">
        <div class="slide_rech"> 

          <img src="../img/Search.png">
          <h2>chercher un utilisateur</h2>

        </div>
        <div class="box_rech">

          <form method="get" action="">
            <input type="text" id="rech_id_user" name="user_id" class="champ_rech" placeholder="ID">
            <input type="text" id="rech_pseudo_user" name="user_pseudo" class="champ_rech" placeholder="Recherche par pseudo">
            <input type="text" id="rech_nom_user" name="user_nom" class="champ_rech" placeholder="Recherche par nom">
            <input type="text" id="rech_prenom_user" name="user_prenom" class="champ_rech" placeholder="Recherche par prenom">

            <h2 class="slide_rech_user">plus d'options de recherche...</h2>

            <div class="user_rech_detail">

              <input type="text" id="user_date_nais" name="user_date_nais" class="champ_rech" placeholder="date de naissance aaaa-mm-jj">
              <select name="user_annee_univ">
                <option value="">Année en cour</option>
                <option value="l2">L2</option>
                <option value="l3" >L3</option>
                <option value="m1" >M1</option>
                <option value="m2" >M2</option>
              </select>
              <select name="user_sexe" >
                <option value="">Sexe</option>
                <option value="m">Homme</option>
                <option value="f" >Femme</option>

              </select>

              <input type="email" id="rech_email_user" name="user_email" class="champ_rech" placeholder="Recherche par Email">
              <input type="text" id="rech_date_insc_user" name="user_date_insc" class="champ_rech" placeholder="date de d'inscription aaaa-mm-jj">

            </div>  
            <input type="submit" value="rechrecher" class="btn_rech">
          </form>

        </div>
      </div>



      <hr class="ligne_fin">
      <div class="milieu">
           <?php 
include('./php_server_admin/rech_user.php');
    ?>

      </div>

       <?php 
include('./page_element_admin/pagin.php');
    ?>

    </div>



    <div class="clear"></div>
    <?php 
include('./page_element_admin/footer.php');
    ?>

   <script src="../js/jquery.min.js"></script>
    <script src="../js/gle.js"></script>

  </body>
</html>
<?php }else{
    echo '<script> window.location = "./index.php" </script>';
}
         ?>