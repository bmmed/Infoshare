<?php
    session_start();

 if(isset($_SESSION['user_pseudo']) ){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InfoShare - cour</title>

    <link rel="shortcut icon" href="./img/logo_icon.png">

    <link rel="stylesheet" href="./css/gle/gle.css">
    <link rel="stylesheet" 	 media="only screen and (min-width:901px) "		 			 href="./css/gle/gle_large.css">
    <link rel="stylesheet"   media="only screen and (min-width:601px) and (max-width:900px)" href="./css/gle/gle_medium.css">
    <link rel="stylesheet"   media="only screen and (min-width:100px) and (max-width:600px)" href="./css/gle/gle_small.css">


    <link rel="stylesheet" href="./css/cour/cour.css">
    <link rel="stylesheet" href="./css/input_style.css">




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

      <div class="contenaire_ajout">
        <div class="slide_ajout"> 
          <h2>Ajouter fichier</h2>
          <img src="./img/add02.png">

        </div>
        <div class="box_ajout">

          <form method="post" action="./php_server/ajt_fich.php" enctype="multipart/form-data" accept-charset="utf-8">
            <input type="file" id="fichier"  name="fichier"  accept=".pdf,.docx,.xlsx,.pptx,.jpeg,.jpg,.png,.rar" data-icon="false" class="filestyle">

            <select name="annee_etude" required class="annee_etude">
              <option value="">Année d'etude</option>
              <option value="l2">L2</option>
              <option value="l3" >L3</option>
              <option value="m1" >M1</option>
              <option value="m2" >M2</option>




            </select>

            <input type="text"  name="module" placeholder="Le module" class="nom_fich">
            <select name="Type_fich">
              <option value="cour">COURS</option>
              <option value="td">TD</option>
              <option value="td_corr">TD CORR</option>
              <option value="tp">TP</option>
              <option value="tp_corr">TP CORR</option>
              <option value="emd">EMD</option>
              <option value="emd_corr">EMD CORR</option>

            </select>




            <input type="submit" value="partager le fichier" class="btn_partager">
          </form>

        </div>
      </div>

      <div class="contenaire_rech">
        <div class="slide_rech"> 

          <img src="./img/Search.png">
          <h2>chercher un fichier</h2>

        </div>
        <div class="box_rech">

          <form method="get" action="">
            <input type="text" id="nom_fich"  name="nom_fich" placeholder="Nom du fichier" class="nom_fich">

            <select name="annee_etude">
             <option value="">toute les annee</option>
              <option value="l2">L2</option>
              <option value="l3" >L3</option>
              <option value="m1" >M1</option>
              <option value="m2" >M2</option>
            </select>

           <input type="text"  name="module" placeholder="Le module" class="nom_fich">





            <select name="Type_fich">
              <option value="cour">COURS</option>
              <option value="td">TD</option>
              <option value="td_corr">TD CORR</option>
              <option value="tp">TP</option>
              <option value="tp_corr">TP CORR</option>
              <option value="emd">EMD</option>
              <option value="emd_corr">EMD CORR</option>

            </select>




            <input type="submit" value="rechrecher" class="btn_rech">
          </form>

        </div>
      </div>

      <div class="contenair_res_rech">

       
                <?php 
include('./php_server/rech_fich.php');
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
    <script src="./js/bootstrap-filestyle.js"></script>
    <script>
      $(":file").filestyle('placeholder');
      $(":file").filestyle('placeholder', '.pdf .docx .xlsx .pptx .jpeg .png .rar');

      $(":file").filestyle('buttonText');
      $(":file").filestyle('buttonText', 'choisissez votre fichier');
    </script>
        <script> 
      $(document).ready(function() {
        $('.btn_sign').click(function() {
          var a=$(this);
          $.post('./php_server/sign_fich.php',
                 { cour_id: $('.btn_sign .cour_id').val(),
                  cour_type: $('.btn_sign .cour_type').val()},function(data){
          if(data == 1) a.html('<h2>deja Signaler</h2>');
            
          } );
          
        });     
      });
</script> 
    <script src="./js/gle.js"></script>
    



  </body>
</html>
<?php }else{
    echo '<script> window.location = "index.php" </script>';
}
         ?>
