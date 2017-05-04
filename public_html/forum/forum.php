<?php
    session_start();

 if(isset($_SESSION['user_pseudo']) ){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>

    <link rel="shortcut icon" href="../img/logo_icon.png">

    <link rel="stylesheet" href="../css/gle/gle.css">
    <link rel="stylesheet" 	 media="only screen and (min-width:901px) "		 			 href="../css/gle/gle_large.css">
    <link rel="stylesheet"   media="only screen and (min-width:601px) and (max-width:900px)" href="../css/gle/gle_medium.css">
    <link rel="stylesheet"   media="only screen and (min-width:100px) and (max-width:600px)" href="../css/gle/gle_small.css">

    <link rel="stylesheet" href="./css/forum.css">

  </head>


  <body>
    <!-- changer le font -->	


    <?php 
include('./page_element/header01.php');
    ?>


    <div class="clear"></div>


    <?php 
include('./page_element/box_user.php');
    ?>


    <div class="contenaire_milieu">

      <div class="contenair_forum_rech">
        <form  method="GET">
          <input type="text" name="txt_rech" class="champ_rech" placeholder="Rechercher un message...">
          <input type="submit" value="Rechercher" class="btn_rech">

        </form>
      </div>




      <div class="ajout_msg_contenair">
<hr class="ligne_fin">
       <h2 class="logo_ajt_msg">Publier un message ?</h2>
        <form method="post" action="../php_server/ajt_msg.php" class="msg_form">
          <input type="text" placeholder="Le titre de votre message" name="ajt_msg_titre" class="ajt_cham_titre">
          <textarea rows="3"  name="message" placeholder="Votre message..." class="message"></textarea>
          <input type="submit" value="publier" class="btn_publier">
        </form>
        <hr class="ligne_fin">
      </div>

      <div class="contenair_msg">  
         <?php 
include('../php_server/msg_rech.php');
    ?>   

      </div>

       <?php 
include('../page_element/pagin.php');
    ?>

    </div>



    <div class="clear"></div>
    <?php 
include('./page_element/footer.php');
    ?>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/gle.js"></script>
    <script src="./js/forum.js"></script>


 
  </body>
</html>
<?php }else{
    echo '<script> window.location = "../index.php" </script>';
}
         ?>