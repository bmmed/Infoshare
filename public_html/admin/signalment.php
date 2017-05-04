
<?php
session_start();

if(isset($_SESSION['admin_pseudo'])){
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signalment administrateur</title>

        <link rel="shortcut icon" href="../img/logo_icon.png">

        <link rel="stylesheet" href="../css/gle/gle.css">
        <link rel="stylesheet" 	 media="only screen and (min-width:901px) "		 			 href="../css/gle/gle_large.css">
        <link rel="stylesheet"   media="only screen and (min-width:601px) and (max-width:900px)" href="../css/gle/gle_medium.css">
        <link rel="stylesheet"   media="only screen and (min-width:100px) and (max-width:600px)" href="../css/gle/gle_small.css">


        <link rel="stylesheet" href="../css/cour/cour.css">
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

            <div class="contenair_btn_sign">
                <?php
    include('php_server_admin/cnx_db.php');
    
    $nbr_all=$bdd->query("SELECT COUNT(*) AS nbr_cour  FROM cour WHERE `cour_sign_cmpt` >= 1" );
    $nbr_cour=$nbr_all->fetch();

    $nbr_all=$bdd->query("SELECT COUNT(*) AS nbr_td  FROM td WHERE `cour_sign_cmpt` >= 1" );
    $nbr_td=$nbr_all->fetch();

    $nbr_all=$bdd->query("SELECT COUNT(*) AS nbr_tp  FROM tp WHERE `cour_sign_cmpt` >= 1" );
    $nbr_tp=$nbr_all->fetch();

    $nbr_all=$bdd->query("SELECT COUNT(*) AS nbr_emd  FROM emd WHERE `cour_sign_cmpt` >= 1" );
    $nbr_emd=$nbr_all->fetch();

    $bdd=NULL;


    echo(' 
                    <a href="./signalment.php?Type_fich=cour">
                  <div class="btn_sign_type"> 
                    <h2>COUR </h2>
                    <h3>'.$nbr_cour['nbr_cour'].'</h3>
                  </div>
                </a>

                <a href="./signalment.php?Type_fich=td">
                  <div class="btn_sign_type"> 
                    <h2>TD </h2>
                    <h3>'.$nbr_td['nbr_td'].'</h3>
                  </div>
                </a>

                <a href="./signalment.php?Type_fich=tp">
                  <div class="btn_sign_type"> 
                    <h2>TP </h2>
                    <h3>'.$nbr_tp['nbr_tp'].'</h3>
                  </div>
                </a>

                <a href="./signalment.php?Type_fich=emd">
                  <div class="btn_sign_type"> 
                    <h2>EMD </h2>
                    <h3>'.$nbr_emd['nbr_emd'].'</h3>
                  </div>
                </a>
                    ');

                ?>


            </div>

            <div class="contenair_res_rech">

                <?php 
    include('./php_server_admin/rech_sign.php');
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
            $(":file").filestyle('placeholder', '.pdf .docx .xlsx .pptx .jpeg .png .rar');

            $(":file").filestyle('buttonText');
            $(":file").filestyle('buttonText', 'choisissez votre fichier');
        </script>
        <script> 
            $(document).ready(function() {
                $('.btn_sign_ok').click(function() {
                    var a=$(this);
                    $.post('./php_server_admin/sign_ok.php',
                           { cour_id: $('.btn_sign_ok .cour_id').val(),
                            cour_type: $('.btn_sign_ok .cour_type').val()},function(data){
                    a.html('<h2>ok</h2>');

                    } );

                });     
            });
        </script> 

    </body>
</html>
<?php }else{
    echo '<script> window.location = "./index.php" </script>';
}
?>