<?php
session_start();

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

    
    <style>
  .link_visiteur
{
  text-decoration:none;
}
</style>

    <header>
      <a href="../index.php"><img class="logo" src="../img/small/logo_small.png"/></a>
      <nav class="menue_contenair">
        <img class="btn_menue_side" src="../img/btn_menue.png" onclick="slide()">
        <ul class="menue_header">
          <li><a href="../index.php" class="cnx">Connexion</a></li>
          <li><a href="../inscription.php">Inscription</a></li>
          <li><a href="./forum.php">Forum</a></li>
        </ul>
      </nav>
    </header>
    <div class="header_fix"  id="top"></div>



    <div class="clear"></div>

    <div class="contenaire_milieu">

      <div class="contenair_forum_rech">
        <form  method="GET">
          <input type="text" name="txt_rech" class="champ_rech" placeholder="Rechercher un message...">
          <input type="submit" value="Rechercher" class="btn_rech">

        </form>
      </div>




      <div class="ajout_msg_contenair">
<hr class="ligne_fin">
        <a href="../php_server/visiteur.php" class="link_visiteur">
       <h2 class="logo_ajt_msg">Publier un message ?</h2>
          </a>
        <hr class="ligne_fin">
      </div>

      <div class="contenair_msg">  
         <?php 
include('../php_server/msg_rech_visiteur.php');
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