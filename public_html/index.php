<?php
session_start();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InfoShare</title>

    <link rel="shortcut icon" href="./img/logo_icon.png">


    <link rel="stylesheet" href="./css/gle/gle.css">
    <link rel="stylesheet" 	 media="only screen and (min-width:901px) "		 			 href="./css/gle/gle_large.css">
    <link rel="stylesheet"   media="only screen and (min-width:601px) and (max-width:900px)" href="./css/gle/gle_medium.css">
    <link rel="stylesheet"   media="only screen and (min-width:100px) and (max-width:600px)" href="./css/gle/gle_small.css">

    <link rel="stylesheet" href="./css/index/index.css">
    <link rel="stylesheet" 	 media="only screen and (min-width:901px) "		 			 href="./css/index/index_large.css">
    <link rel="stylesheet"   media="only screen and (min-width:601px) and (max-width:900px)" href="./css/index/index_medium.css">
    <link rel="stylesheet"   media="only screen and (min-width:100px) and (max-width:600px)" href="./css/index/index_small.css">



  </head>


  <body>
    <!-- changer le font -->	
    <header>
      <a href="index.php"><img class="logo" src="./img/small/logo_small.png"/></a>
      <nav class="menue_contenair">
        <img class="btn_menue_side" src="img/btn_menue.png" onclick="slide()">
        <ul class="menue_header">
          <li><a href="#top" class="cnx">Connexion</a></li>
          <li><a href="inscription.php">Inscription</a></li>
          <li><a href="forum_visiteur/forum.php">Forum</a></li>
          <li><a href="admin/index.php">admin</a></li>
        </ul>
      </nav>
    </header>
    <div class="header_fix"  id="top"></div>


<?php 
     if( isset($_SESSION['msg_erreur']) )
    {
      echo('<h3 class="ph_erreur">'.$_SESSION['msg_erreur'].'</h3>');
     $_SESSION['msg_erreur']=null;
    }

    
  if( isset($_GET['msg_ok']) )
    {
      echo('<h3 class="ph_ok">'.$_GET['msg_ok'].'</h3>');
    }
    
    
    ?>

    <div class="contenaire_cnx">
      <button class="slide_cnx">Connexion</button>
      <div class="box_cnx">

        <form method="post" action="php_server/login.php">
          <input type="text" id="pseudo"  placeholder="Pseudo" name="pseudo" class="champ pseudo">
          <input type="password" id="pass" placeholder="Mot de pass" name="mot_passe" class="champ">
          <input type="submit" value="connexion" class="btn_cnx">
        </form>
        <a href="inscription.php"><button  class="btn_insc">Inscription</button></a> 
        
      </div>
      
    </div>


    <div class="contenaire_pub anim01">


      <div class="pub_item">
        <div class="txt_pub"> 
          <h2>Nos Chroniques</h2>
          <P>Soyez informé des dernières nouveautés en informatique et tous ces divers domaines programmation, nouveautés numériques, astuces ,et conseil.Cela Grâce À nos Chroniques faites sur mesure pour vous.</P>
        </div> 

        <div class="img_pub">
          <img src="img/article/01.png" >
        </div>
      </div>





    </div>


    <div class="contenaire_pub anim02">


      <div class="pub_item">
        <div class="img_pub">
          <img src="img/article/02.png" >
        </div>

        <div class="txt_pub"> 
          <h2> Document et suport de cour</h2>
          <P>Prtagez vos cours Td Tp Emd avec tout le monde et ainsi facilite l'accès à ces ressources pour les camarades et les autres utilisateurs. Et retrouver tous les Documents et supports de cour que vous chercher avec une simple recherche  afin de bien préparer votre année.</P>
        </div> 


      </div>
    </div>


    <div class="contenaire_pub anim03">


      <div class="pub_item">
        <div class="txt_pub"> 
          <h2> Affichage </h2>
          <P>Consulter les affichages e les dernières nouvelles de n'importe où est à tout moment ainsi resté courant de ce qui se passe dans le département informatique ainsi rester toujours en contact avec l'administration pour tout nouveau. </P>
        </div> 

        <div class="img_pub">
          <img src="img/article/03.png">
        </div>
      </div>





    </div>


    <div class="contenaire_pub anim04">


      <div class="pub_item">
        <div class="img_pub">
          <img src="img/article/04.png">
        </div>
        <div class="txt_pub"> 
          <h2> Forum </h2>
          <P>Discutez, échangé des idées, des conseils, débattez des sujets et des possibles solutions à tout probleme , et être en contact avec vos camarades et autres professionnelles du métier afin de vous aider à réaliser tous vos projets. </P>
        </div> 


      </div>





    </div>


    <div class="contenaire_pub anim05">


      <div class="pub_item">
        <div class="txt_pub"> 
          <h2> Outils </h2>
          <P>Vous trouverez tous les outils professionnels qui vous assisteront pour votre année pédagogique ou tous vos projets informatiques . </P>
        </div> 

        <div class="img_pub">
          <img src="img/article/05.png">
        </div>
      </div>





    </div>




    <div class="clear"></div>
    <?php 
include('page_element/footer.php');
    ?>

    <script src="./js/jquery.min.js"></script>
    <script src="./js/gle.js"></script>
    <script src="./js/scrollreveal.min.js"></script>
    <script>
      window.sr=ScrollReveal() ;
      sr.reveal('.anim01',{ duration: 800 ,distance:'150px',origin:'left',opacity:0,delay:300,easing:'ease'} ) ;
      sr.reveal('.anim02',{ duration: 800 ,distance:'150px',origin:'right',opacity:0,delay:150,easing:'ease'}) ;
      sr.reveal('.anim03' ,{ duration: 800 ,distance:'150px',origin:'left',opacity:0,delay:150,easing:'ease'}) ;
      sr.reveal('.anim04' ,{ duration: 800 ,distance:'150px',origin:'right',opacity:0,delay:150,easing:'ease'}) ;
      sr.reveal('.anim05' ,{ duration: 800 ,distance:'150px',origin:'left',opacity:0,delay:150,easing:'ease'}) ;

    </script>

  </body>
</html>
