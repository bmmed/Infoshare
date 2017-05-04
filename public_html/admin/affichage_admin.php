
<?php
    session_start();

 if(isset($_SESSION['admin_pseudo'])){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage Administrateur</title>

    <link rel="shortcut icon" href="../img/logo_icon.png">

    <link rel="stylesheet" href="../css/gle/gle.css">
    <link rel="stylesheet" 	 media="only screen and (min-width:901px) "		 			 href="../css/gle/gle_large.css">
    <link rel="stylesheet"   media="only screen and (min-width:601px) and (max-width:900px)" href="../css/gle/gle_medium.css">
    <link rel="stylesheet"   media="only screen and (min-width:100px) and (max-width:600px)" href="../css/gle/gle_small.css">


    <link rel="stylesheet" href="../css/affichage/affichage.css">
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
          <h2>Ajouter fichier</h2>
          <img src="../img/add02.png">

        </div>
        <div class="box_ajout">

          <form method="post" action="./php_server_admin/ajt_affi.php" enctype="multipart/form-data">
            <input type="file" id="affichage"  name="fichier" accept=".pdf,.docx,.xlsx,.jpeg,.jpg,.png,.rar" data-icon="false" class="filestyle">

           <input type="text" name="affi_titre" class="nom_affichage" placeholder="Titre...">
           
            <select name="affi_annee_univ" required>
            <option value="">Annee universitaire</option>
             <option value="tout">A tout les etudiant</option>
              <option value="l2">L2</option>
              <option value="l3" >L3</option>
              <option value="m1" >M1</option>
              <option value="m2" >M2</option>



            </select>


            <select name="affi_type" required>
             <option value="">Le type de l'affichage</option>
              <option value="e_t">emplois de temp / EMD</option>
              <option value="note">Note</option>
              <option value="divers">Divers</option>
           </select>





            <input type="submit" value="partager l'affichage" class="btn_partager">
          </form>

        </div>
      </div>

     
      <div class="contenaire_rech">
        <div class="slide_rech"> 

          <img src="../img/Search.png">
          <h2>chercher un affihcage</h2>

        </div>
        <div class="box_rech">

          <form method="GET" action="">
            <input type="text" id="affi_nom"  name="affi_nom" placeholder="Nom de l'affichage" class="nom_affichage">
            <input type="text" name="affi_titre" class="nom_affichage" placeholder="Titre...">
                        <select name="affi_annee_univ" >
            <option value="">Annee universitaire</option>
             <option value="tout">A tout les etudiant</option>
              <option value="l2">L2</option>
              <option value="l3" >L3</option>
              <option value="m1" >M1</option>
              <option value="m2" >M2</option>



            </select>


            <select name="affi_type" >
             <option value="">Le type de l'affichage</option>
              <option value="e_t">emplois de temp / EMD</option>
              <option value="note">Note</option>
              <option value="divers">Divers</option>
           </select>

            <input type="submit" value="rechrecher" class="btn_rech">
          </form>

        </div>
      </div>

      <div class="contenair_res_rech">
        
        
           <?php 
include('./php_server_admin/rech_affi.php');
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
      $(":file").filestyle('placeholder', '.pdf .docx .xlsx .jpeg .png .rar');

      $(":file").filestyle('buttonText');
      $(":file").filestyle('buttonText', 'choisissez votre fichier');
    </script>
  </body>
</html>
<?php }else{
    echo '<script> window.location = "./index.php" </script>';
}
         ?>