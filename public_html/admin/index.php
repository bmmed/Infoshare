
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portail administrateur</title>

    <link rel="shortcut icon" href="../img/logo_icon.png">


    <link rel="stylesheet" href="../css/gle/gle.css">
    <link rel="stylesheet" 	 media="only screen and (min-width:901px) "		 			 href="../css/gle/gle.css">
    <link rel="stylesheet"   media="only screen and (min-width:601px) and (max-width:900px)" href="../css/gle/gle_medium.css">
    <link rel="stylesheet"   media="only screen and (min-width:100px) and (max-width:600px)" href="../css/gle/gle_small.css">

    <link rel="stylesheet" href="../css/index/index.css">
    <link rel="stylesheet" 	 media="only screen and (min-width:901px) "		 			 href="../css/index/index_large.css">
    <link rel="stylesheet"   media="only screen and (min-width:601px) and (max-width:900px)" href="../css/index/index_medium.css">
    <link rel="stylesheet"   media="only screen and (min-width:100px) and (max-width:600px)" href="../css/index/index_small.css">
    <link rel="stylesheet" href="./css_admin/index_admin.css">


  </head>


  <body>
    <!-- changer le font -->	

     
     
      <div class="contenaire_cnx">
      <img src="../img/small/logo_small01.png" class="cnx_logo">
      <hr class="ligne_fin_footer">
      <div class="box_cnx">
        
        <form method="post" action="./php_server_admin/login_admin.php">
          <input type="text" id="admin_pseudo"  placeholder="Pseudo administrateur" name="admin_pseudo" class="champ pseudo">
          <input type="password" id="admin_pass" placeholder="Mot de pass" name="admin_m_p" class="champ">
          <input type="submit" value="connexion" class="btn_cnx">
        </form>
      </div>
 
    </div>



    <script src=".../js/gle.js"></script>

  </body>
</html>
