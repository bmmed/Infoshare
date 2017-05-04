<?php
session_start();

if(isset($_SESSION['user_pseudo']) ){
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InfoShare - affichage</title>

    <link rel="shortcut icon" href="./img/logo_icon.png">

    <link rel="stylesheet" href="./css/gle/gle.css">
    <link rel="stylesheet" 	 media="only screen and (min-width:901px) "		 			 href="./css/gle/gle_large.css">
    <link rel="stylesheet"   media="only screen and (min-width:601px) and (max-width:900px)" href="./css/gle/gle_medium.css">
    <link rel="stylesheet"   media="only screen and (min-width:100px) and (max-width:600px)" href="./css/gle/gle_small.css">


    <link rel="stylesheet" href="./css/affichage/affichage.css">




  </head>


  <body>
    <!-- changer le font -->	


    <?php 
  include('page_element/header01.php');
    ?>


    <div class="clear"></div>


    <?php 
  include('page_element/box_user.php');
    ?>


    <div class="contenaire_milieu">


      <div class="contenaire_rech">
        <div class="slide_rech"> 

          <img src="./img/Search.png">
          <h2>chercher un affihcage</h2>

        </div>
        <div class="box_rech">

          <form method="GET" action="">
            <input type="text" id="affi_nom"  name="affi_nom" placeholder="Nom de l'affichage" class="nom_affichage">
            <input type="text" name="affi_titre" class="nom_affichage" placeholder="Titre...">
            <select name="affi_annee_univ" >
              <option value="">Annee universitaire</option>
              <option value="tout">A tout les etudiant</option>
              <option value="l2">L2</option>
              <option value="l3" >L3</option>
              <option value="m1" >M1</option>
              <option value="m2" >M2</option>



            </select>


            <select name="affi_type" >
              <option value="">Le type de l'affichage</option>
              <option value="e_t">emplois de temp / EMD</option>
              <option value="note">Note</option>
              <option value="divers">Divers</option>
            </select>

            <input type="submit" value="rechrecher" class="btn_rech">
          </form>

        </div>
      </div>

      <div class="contenair_res_rech">

        <?php 
  include('./php_server/rech_affi.php');
        ?>



      </div>

      <?php 
  include('./page_element/pagin.php');
      ?>
    </div>



    <div class="clear"></div>
    <?php 
  include('page_element/footer.php');
    ?>

    <script src="./js/jquery.min.js"></script>
    <script src="./js/gle.js"></script>

  </body>
</html>
<?php }else{
  echo '<script> window.location = "index.php" </script>';
}
?>
