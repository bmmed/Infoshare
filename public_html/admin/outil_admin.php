
<?php
    session_start();

 if(isset($_SESSION['admin_pseudo'])){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>outil administrateur</title>

    <link rel="shortcut icon" href="../img/logo_icon.png">

    <link rel="stylesheet" href="../css/gle/gle.css">
    <link rel="stylesheet" 	 media="only screen and (min-width:901px) "		 			 href="../css/gle/gle_large.css">
    <link rel="stylesheet"   media="only screen and (min-width:601px) and (max-width:900px)" href="../css/gle/gle_medium.css">
    <link rel="stylesheet"   media="only screen and (min-width:100px) and (max-width:600px)" href="../css/gle/gle_small.css">


    <link rel="stylesheet" href="../css/outil/outil.css">
    <link rel="stylesheet" href="./css_admin/utilisateur.css">
    <link rel="stylesheet" href="../css/input_style.css">



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



      <div class="contenaire_ajout">
        <div class="slide_ajout"> 
          <h2>Ajouter un outil</h2>
          <img src="../img/add02.png">

        </div>
        <div class="box_ajout">

          <form method="post" action="./php_server_admin/ajt_outil.php" enctype="multipart/form-data">
            <input type="file" id="outil"  name="fichier"  accept=".jpeg,.png,.jpg" data-icon="false" class="filestyle">

           <input type="texte" class="nom_outil" name="outil_nom" placeholder="Nom de l'outil .">
           <input type="texte" class="nom_outil" name="outil_lien" placeholder="Le lien pour l'outil">
            <select name="outil_annee_univ" >
              <option value="">pour touts les niveaux</option>
              <option value="l2">L2</option>
              <option value="l3" >L3</option>
              <option value="m1" >M1</option>
              <option value="m2" >M2</option>
            </select>

            <input type="submit" value="partager l'outil" class="btn_partager">
          </form>

        </div>
      </div>



      <div class="contenaire_rech">
        <div class="slide_rech"> 

          <img src="../img/Search.png">
          <h2>chercher un outil</h2>

        </div>
        <div class="box_rech">

          <form method="get" action="">
            <input type="text" id="outil_nom"  name="outil_nom" placeholder="Nom de l'outil" class="nom_outil">

            <select name="outil_annee_univ" >
              <option value="">pour touts les niveaux</option>
              <option value="l2">L2</option>
              <option value="l3" >L3</option>
              <option value="m1" >M1</option>
              <option value="m2" >M2</option>
            </select>
            <input type="submit" value="rechrecher" class="btn_rech">
          </form>

        </div>
      </div>


      <div class="contenair_res_rech">
    
    <?php 
include('./php_server_admin/rech_outil.php');
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
    <script src="../js/bootstrap-filestyle.js"></script>
    
    <script>
      $(":file").filestyle('placeholder');
      $(":file").filestyle('placeholder', '.jpeg .png');

      $(":file").filestyle('buttonText');
      $(":file").filestyle('buttonText', 'Image outil');
    </script>
  </body>
</html>
<?php }else{
    echo '<script> window.location = "./index.php" </script>';
}
         ?>