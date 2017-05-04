<?php
    session_start();

 if(isset($_SESSION['user_pseudo']) ){
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InfoShare - acceuil</title>

    <link rel="shortcut icon" href="./img/logo_icon.png">
      
  
	<link rel="stylesheet" href="./slider/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="./slider/css/style.css"> <!-- Resource style -->

    <link rel="stylesheet" href="./css/gle/gle.css">
    <link rel="stylesheet" 	 media="only screen and (min-width:901px) "		 			 href="./css/gle/gle_large.css">
    <link rel="stylesheet"   media="only screen and (min-width:601px) and (max-width:900px)" href="./css/gle/gle_medium.css">
    <link rel="stylesheet"   media="only screen and (min-width:100px) and (max-width:600px)" href="./css/gle/gle_small.css">



    <link rel="stylesheet" href="./css/acceuil/acceuil.css">
    <link rel="stylesheet" 	 media="only screen and (min-width:901px) "		 			 href="./css/acceuil/acceuil_large.css">
    <link rel="stylesheet"   media="only screen and (min-width:601px) and (max-width:900px)" href="./css/acceuil/acceuil_medium.css">
    <link rel="stylesheet"   media="only screen and (min-width:100px) and (max-width:600px)" href="./css/acceuil/acceuil_small.css">

  <link rel="stylesheet" href="./css/cour/cour.css">


  </head>


  <body>
    <!-- changer le font -->	


    <?php 
include('page_element/header01.php');
    ?>


    <div class="clear"></div>
       <?php 
include('./slider/slider.php');
    ?>

    

    <?php 
include('page_element/box_user.php');
    ?>


    <div class="contenaire_milieu">
      <P class="present">
        bien venue sur le site INFOSHARE un site dédié aux étudiants en informatique , afin de leur permettre d'échanger les différent support de cours ou de td ou autre ... de manière à qu'il soit accessible à tous et à tout moment ,mais aussi un lieu d'échanges d'idées, d'astuce, comme dans les chroniques proposer à l'accueil et un forum ou vous pouvez poser vos questions et ainsi vous faire aider par les autres utilisateurs de notre site.

      </P>
      <hr class="ligne_fin">
      <div class="milieu">
              <div class="contenaire_rech">
        <div class="slide_rech"> 

          <img src="./img/Search.png">
          <h2>chercher une chronique</h2>

        </div>
        <div class="box_rech">

          <form method="get" action="">
            <input type="text" id="art_titre" name="art_titre" class="champ_rech" placeholder="Recherche par titre">
            <input type="text" id="art_url" name="art_url" class="champ_rech" placeholder="Recherche par URl">
            <input type="submit" value="rechrecher" class="btn_rech">
          </form>

        </div>
      </div>

           <?php 
include('./php_server/rech_art.php');
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

   
	<script src="./slider/js/jquery-2.1.4.js"></script>
    <script src="./slider/js/jquery.mobile.custom.min.js"></script>

   
    <script src="./slider/js/modernizr.js"></script> 
    <script src="./slider/js/main.js"></script> <!-- Resource jQuery -->
     <script src="./js/gle.js"></script>
   
  

  </body>
</html>
<?php }else{
    echo '<script> window.location = "index.php" </script>';
}
         ?>

