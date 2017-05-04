

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

    <link rel="stylesheet" href="./css/forum_rep.css">

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



    <div class="contenaire_milieu">

      <div class="contenair_forum_rech">
        <form  method="GET" action="forum.php">
          <input type="text" name="txt_rech" class="champ_rech" placeholder="Rechercher un message...">
          <input type="submit" value="Rechercher" class="btn_rech">

        </form>
      </div>


      <div class="contenair_msg">


        <?php

  if(isset($_GET['id_msg'])){
    $msg_id=$_GET['id_msg'];
    
 include('../php_server/cnx_db.php');

    $msg_all=$bdd->query("SELECT *  FROM msg WHERE msg_id='$msg_id'");
    $msg_unit=$msg_all->fetch();

    $id_user=$msg_unit['msg_user_id'];
    $user_all=$bdd->query("SELECT *  FROM user WHERE user_id='$id_user'" );
    $user_unit=$user_all->fetch();
    $date = date_create($msg_unit['msg_date_pub']);

    if($id_user==-1){$img='/img/admin.png';}
    else $img=$user_unit['user_img_path'];


    echo('<div class="msg_item res_dif">
          <div class="msg_info">
            <img src="../' .$img.'">
            <h2 class="msg_user">' .$msg_unit['msg_user_pseudo'].'</h2>
          </div>

          <div class="msg">
            <h2 class="msg_titre">'.$msg_unit['msg_titre'].'</h2>
            <input type="hidden" value="' .$msg_unit['msg_id'].'" name="id_msg" id="id_msg">
            <h4 class="msg_date">le '.date_format($date, 'd-m-Y').' a '.date_format($date, 'H:i').'</h4>

            <div class="detail_msg">
              <p class="msg_cont">' .$msg_unit['msg_texte'].' </p>
              <div class="btn_rep">
              <a href="../php_server/visiteur.php" class="link_visiteur">
                <h2>Repondre?</h2>
                </a>
              </div>



            </div>
          </div>

          <hr class="ligne_fin">
        </div>

');

$bdd = NULL;
  }
  else
  {
    echo('pas de message ');

  }


        ?>


      </div>




      <div class="contenair_rep">

        <?php 
  include('../php_server/rech_rep.php');
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


    <script>  

      function maj_cont()
      {
        $.get('../php_server/rech_rep.php',
              {id_msg:$('#id_msg').val()},
              function(data){
          $('.contenair_rep').html(data);
          res_dif();
        });
      }
      setInterval(maj_cont,1000);
    </script>
  </body>
</html>
