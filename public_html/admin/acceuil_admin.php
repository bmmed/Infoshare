
<?php
    session_start();

 if(isset($_SESSION['admin_pseudo'])){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>acceuil administrateur</title>

    <link rel="shortcut icon" href="../img/logo_icon.png">
    
    	<link rel="stylesheet" href="../slider/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="../slider/css/style.css"> <!-- Resource style -->

    <link rel="stylesheet" href="../css/gle/gle.css">
    <link rel="stylesheet" 	 media="only screen and (min-width:901px) "		 			 href="../css/gle/gle_large.css">
    <link rel="stylesheet"   media="only screen and (min-width:601px) and (max-width:900px)" href="../css/gle/gle_medium.css">
    <link rel="stylesheet"   media="only screen and (min-width:100px) and (max-width:600px)" href="../css/gle/gle_small.css">



    <link rel="stylesheet" href="../css/acceuil/acceuil.css">
    <link rel="stylesheet" 	 media="only screen and (min-width:901px) "		 			 href="../css/acceuil/acceuil_large.css">
    <link rel="stylesheet"   media="only screen and (min-width:601px) and (max-width:900px)" href="../css/acceuil/acceuil_medium.css">
    <link rel="stylesheet"   media="only screen and (min-width:100px) and (max-width:600px)" href="../css/acceuil/acceuil_small.css">

    <link rel="stylesheet" href="../css/cour/cour.css">
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
include('./page_element_admin/slider.php');
    ?>



    <?php 
include('./page_element_admin/box_user_admin.php');
    ?>


    <div class="contenaire_milieu">


      <div class="contenaire_ajout">
        <div class="slide_ajout"> 
          <h2>Ajouter un article</h2>
          <img src="../img/add02.png">

        </div>
        <div class="box_ajout">

          <form method="post" action="./php_server_admin/ajt_article.php" enctype="multipart/form-data">
            <input type="file" id="fichier"  name="fichier"  accept=".jpeg,.jpg,.png" data-icon="false" class="filestyle">
            <input type="text" name="art_titre" class="fichier" placeholder="titre">

            <input type="text" id="art_url" name="art_lien" class="fichier"  placeholder="lien vers l'article">

            <textarea rows="5" id="article_detail" name="art_texte" class="fichier" placeholder="detail de l'article" style="
    vertical-align: top;
"></textarea>


            <input type="submit" value="partager l'article" class="btn_partager">
          </form>

        </div>
      </div>

      <div class="contenaire_rech">
        <div class="slide_rech"> 

          <img src="../img/Search.png">
          <h2>chercher un article</h2>

        </div>
        <div class="box_rech">

          <form method="get" action="">
            <input type="text" id="art_titre" name="art_titre" class="champ_rech" placeholder="Recherche par titre">
            <input type="text" id="art_url" name="art_url" class="champ_rech" placeholder="Recherche par URl">
            <input type="submit" value="rechrecher" class="btn_rech">
          </form>

        </div>
      </div>



      <hr class="ligne_fin">
      <div class="milieu">

       
    <?php 
include('./php_server_admin/rech_art.php');
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

   <script src="../slider/js/jquery-2.1.4.js"></script>
    <script src="../slider/js/jquery.mobile.custom.min.js"></script>
       <script src="../slider/js/modernizr.js"></script> 
    <script src="../slider/js/main.js"></script> <!-- Resource jQuery -->
    
    <script src="../js/gle.js"></script>
        <script src="../js/bootstrap-filestyle.js"></script>
    
   
    
    
    <script>
      $(":file").filestyle('placeholder');
      $(":file").filestyle('placeholder', '.jpeg .png');

      $(":file").filestyle('buttonText');
      $(":file").filestyle('buttonText', "L'image de l'article");
    </script>

  </body>
</html>

<?php }else{
    echo '<script> window.location = "./index.php" </script>';
}
         ?>