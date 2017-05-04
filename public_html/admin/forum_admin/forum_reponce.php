<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>

    <link rel="shortcut icon" href="../../img/logo_icon.png">

    <link rel="stylesheet" href="../../css/gle/gle.css">
    <link rel="stylesheet" 	 media="only screen and (min-width:901px) "		 			 href="../../css/gle/gle_large.css">
    <link rel="stylesheet"   media="only screen and (min-width:601px) and (max-width:900px)" href="../../css/gle/gle_medium.css">
    <link rel="stylesheet"   media="only screen and (min-width:100px) and (max-width:600px)" href="../../css/gle/gle_small.css">

    <link rel="stylesheet" href="./css/forum.css">
    <link rel="stylesheet" href="../css_admin/utilisateur.css">
    <link rel="stylesheet" href="./css/forum_rep.css">

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

      <div class="contenair_forum_rech" >
        <form action="./forum_admin.php" method="get">
          <input type="text" name="txt_rech" class="champ_rech" placeholder="Rechercher un message...">
          <input type="submit" value="Rechercher" class="btn_rech">

        </form>
      </div>



      <div class="contenair_msg">



        <?php

if(isset($_GET['id_msg'])){
  $msg_id=$_GET['id_msg'];

  include('../php_server_admin/cnx_db.php');

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
            <img src="../..' .$img.'">
            <h2 class="msg_user">' .$msg_unit['msg_user_pseudo'].'</h2>
          </div>

          <div class="msg">
                                <div class="contenaire_sup">
              <div class="slide_sup"> 

                <h2>Suprimer ce message</h2>
                <img src="../../img/close.png">
              </div>
              <div class="box_sup">

                <h3>Voulez vous vraiment suprimer ce message ?</h3>
                <div class="btn_sup_oui"> 
                  <img src="../../img/oui.png">
                  <h2>OUI</h2>
                </div>
                <div class="btn_sup_non"> 
                  <img src="../../img/non.png">
                  <h2>NON</h2>
                </div>
              </div>

              <div class="box_sup_valide">

                <form method="post" action="../php_server_admin/sup_msg.php" class="form_sup">
                  <input type="hidden" value="'.$msg_unit['msg_id'].'" name="sup_id" >
                  <input type="submit" value="suprimer">
                </form>
              </div>
            </div>

            <h2 class="msg_titre">'.$msg_unit['msg_titre'].'</h2>
            <h4 class="msg_date">le '.date_format($date, 'd-m-Y').' a '.date_format($date, 'H:i').'</h4>

            <div class="detail_msg">
              <p class="msg_cont">' .$msg_unit['msg_texte'].' </p>
              <div class="btn_rep"> 
                <h2>Repondre?</h2>
              </div>


              <div class="rep_form">
                <input type="hidden" value="' .$msg_unit['msg_id'].'" name="id_msg" id="id_msg">
                <textarea rows="3"  name="reponce" placeholder="Votre reponce..." class="reponce"></textarea>
                <input type="submit" value="Repondre" class="btn_repondre">
              </div>


            </div>
          </div>

          <hr class="ligne_fin">
        </div>

');

  $bdd=NULL;
}
else
{
  echo('pas de message ');

}


        ?>



      </div>



      <div class="contenair_rep">
        <?php 
include('../php_server_admin/rech_rep.php');
        ?>


      </div>


      <?php 
include('../page_element_admin/pagin.php');
      ?>

    </div>



    <div class="clear"></div>
    <?php 
include('./page_element/footer.php');
    ?>

    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/gle.js"></script>
    <script>


      $( ".rep_form" ).hide();


      $( ".btn_rep" ).click(function() {
        $( this).next().slideToggle( "slow", function() {

        });
      });
    </script>

    <script> 

      $(document).ready(function() {
        $('.btn_repondre').click(function() {
          $.post('../php_server_admin/ajt_rep.php',
                 { id_msg: $('#id_msg').val(),
                  reponce: $('.reponce').val()},
                 function(){
            $('.reponce').val('');
            $( ".rep_form" ).hide();
            maj_cont();

          } );
        });   

        function maj_cont()
        {
          $.get('../php_server_admin/rech_rep.php',
                {id_msg:$('#id_msg').val()},
                function(data){
            $('.contenair_rep').html(data);
            res_dif();
            box_sup();
          });
        }

        setInterval(maj_cont,7000);


      }); 


    </script>

  </body>
</html>
