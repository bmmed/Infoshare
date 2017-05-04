<?php
    session_start();

 if(isset($_SESSION['user_pseudo']) ){
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InfoShare - outil</title>

    <link rel="shortcut icon" href="./img/logo_icon.png">

    <link rel="stylesheet" href="./css/gle/gle.css">
    <link rel="stylesheet" 	 media="only screen and (min-width:901px) "		 			 href="./css/gle/gle_large.css">
    <link rel="stylesheet"   media="only screen and (min-width:601px) and (max-width:900px)" href="./css/gle/gle_medium.css">
    <link rel="stylesheet"   media="only screen and (min-width:100px) and (max-width:600px)" href="./css/gle/gle_small.css">


    <link rel="stylesheet" href="./css/outil/outil.css">




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
include('./php_server/rech_outil.php');
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
