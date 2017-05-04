
<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
	$data=addslashes($data);
  return $data;
}

if(isset($_GET['Type_fich']))
{

	$fich_type=test_input($_GET['Type_fich']);

	if($fich_type=='cour'){$table='cour';}
	elseif($fich_type=='td' or $fich_type=='td_corr'){$table='td';}
	elseif($fich_type=='tp' or $fich_type=='tp_corr'){$table='tp';}
	elseif($fich_type=='emd' or $fich_type=='emd_corr'){$table='emd';}
	else $table='cour';

include('cnx_db.php');
	

	if (empty($fich_type)) $fich_type='';
  
  
  
	/******************************************************************************************/
	$nbr_p_page=8;
	if(!isset($_GET['page'])){
		$page=1;
		$debut=0;
		$_SESSION['page_act']=$_SERVER["REQUEST_URI"];

	}
	else
	{
		$debut=($_GET['page']-1)*($nbr_p_page);
		$page=$_GET['page'];
	}
	if(isset($_GET['page']) and $_GET['page']>2)
		$pred=$_SESSION['page_act']."&page=".($page-1);
	else 
		$pred=$_SESSION['page_act'];

	$suiv=$_SESSION['page_act']."&page=".($page+1);


	/******************************************************************************************/

	$fich_all=$bdd->query("SELECT * FROM  $table  WHERE `cour_type` LIKE  '%$fich_type%' AND `cour_sign_cmpt` >= 1  ORDER BY  `cour_date_pub` DESC  LIMIT $debut , $nbr_p_page");


	while($fich_unit=$fich_all->fetch())
	{
		$id_user=$fich_unit['cour_user_id'];
		$user_all=$bdd->query("SELECT *  FROM user WHERE user_id='$id_user'" );
		$user_unit=$user_all->fetch();

	
			if($id_user=='-1') $pseudo='Administrateur';
		else $pseudo=$user_unit['user_pseudo'];
		
		
		if($fich_unit['cour_type']=='cour'){$type='COUR (Tutoriele)';}
		elseif($fich_unit['cour_type']=='td'){$type='TD';}
		elseif($fich_unit['cour_type']=='td_corr'){$type='Td Corriger';}
		elseif($fich_unit['cour_type']=='tp'){$type='TP';}
		elseif($fich_unit['cour_type']=='tp_corr'){$type='Tp Corriger';}
		elseif($fich_unit['cour_type']=='emd'){$type='EMD';}
		elseif($fich_unit['cour_type']=='emd_corr'){$type='Emd Corriger';}

		$texte = $fich_unit['cour_ext'];
		if ( preg_match('/pdf/',$texte) ){ $ext='./img/type_fichier/fich_pdf.png';} 
		elseif ( preg_match('/word/',$texte) ){ $ext='./img/type_fichier/fich_word.png';} 
		elseif ( preg_match('/png/',$texte) ){ $ext='./img/type_fichier/fich_png.png';} 
		elseif ( preg_match('/jpg/',$texte) ){ $ext='./img/type_fichier/fich_jpeg.png';}
		elseif ( preg_match('/jpeg/',$texte) ){ $ext='./img/type_fichier/fich_jpeg.png';}
		elseif ( preg_match('/presentation/',$texte) ){ $ext='./img/type_fichier/fich_pp.png';}
		elseif ( preg_match('/octet-stream/',$texte) ){ $ext='./img/type_fichier/fich_rar.png';}
		elseif ( preg_match('/spreadsheet/',$texte) ){ $ext='./img/type_fichier/fich_xls.png';}
		else { $ext='./img/type_fichier/fich_rar.png';}

		$date = date_create($fich_unit['cour_date_pub']);

		echo (' 
	  <div class="res_item res_dif">
          <img class="img_res" src="../'.$ext.'">
          <h2 class="res_nom">'.$fich_unit['cour_nom'].'</h2>
          <h2 class="res_module">'.$fich_unit['cour_module'].'</h2>
          <h2 class="res_type">'.$type.'</h2>
          <h2 class="res_annee">'.$fich_unit['cour_anne_univ'].'</h2>
          <h2 class="res_partager_p"> '.$pseudo.' ID: '.$id_user.'</h2>
		  <h2 class="res_nom">'.date_format($date, 'd-m-Y').'</h2>
          <a href="../'.$fich_unit['cour_path'].'" target="_blank">
            <div class="btn_voir"> 
              <img src="./../img/type_fichier/voir.png">
              <h2>Voir</h2>
            </div>
          </a>

          <a href="../'.$fich_unit['cour_path'].'" download>
            <div class="btn_telecharger"> 
              <img src="./../img/type_fichier/telecharger.png">
              <h2>Telecharger</h2>
            </div>
          </a>
		  
		  <div class="btn_sign_ok">
	<input type="hidden" value="'.$fich_unit['cour_id'].'" name="cour_id" class="cour_id">
	<input type="hidden" value="'.$fich_unit['cour_type'].'" name="cour_type" class="cour_type">
	<img src="../img/oui.png">
	<h2>Autoriser</h2>
 </div>


        
				                
      <div class="contenaire_sup">
        <div class="slide_sup"> 

          <h2>Suprimer ce fichier</h2>
          <img src="../img/close.png">
        </div>
        <div class="box_sup">

          <h3>Voulez vous vraiment suprimer ce fichier ?</h3>
           <div class="btn_sup_oui"> 
              <img src="../img/oui.png">
              <h2>OUI</h2>
            </div>
              <div class="btn_sup_non"> 
              <img src="../img/non.png">
              <h2>NON</h2>
            </div>
       </div>
       
       <div class="box_sup_valide">

      <form method="post" action="./php_server_admin/sup_fich.php" class="form_sup">
       <input type="hidden" value="'.$fich_unit['cour_id'].'" name="sup_id" >
       <input type="hidden" value="'.$fich_unit['cour_type'].'" name="Type_fich" >
       <input type="submit" value="suprimer">
      </form>
       </div>
      </div>
      </div>  ');


	}

}
else 

{


include('cnx_db.php');

	$arr = array('cour','td','tp','emd');
	foreach ($arr as &$table) {
      		/******************************************************************************************/
		$nbr_p_page=2;
		if(!isset($_GET['page'])){
			$page=1;
			$debut=0;
			$_SESSION['page_act']=$_SERVER["REQUEST_URI"];

		}
		else
		{
			$debut=($_GET['page']-1)*($nbr_p_page);
			$page=$_GET['page'];
		}
		if(isset($_GET['page']) and $_GET['page']>2)
			$pred=$_SESSION['page_act']."?page=".($page-1);
		else 
			$pred=$_SESSION['page_act'];

		$suiv=$_SESSION['page_act']."?page=".($page+1);


		/******************************************************************************************/



		$fich_all=$bdd->query("SELECT * FROM  $table WHERE `cour_sign_cmpt` >= 1  ORDER BY  `cour_date_pub` DESC  LIMIT $debut , $nbr_p_page");



		if (empty($fich_all)) {echo 'rien';}

		while($fich_unit=$fich_all->fetch())
		{
			$id_user=$fich_unit['cour_user_id'];
			$user_all=$bdd->query("SELECT *  FROM user WHERE user_id='$id_user'" );
			$user_unit=$user_all->fetch();

			if($id_user==-1) $pseudo='Administrateur';
		else{ $pseudo=$user_unit['user_pseudo'];}
			
			if($fich_unit['cour_type']=='cour'){$type='COUR (Tutoriele)';}
			elseif($fich_unit['cour_type']=='td'){$type='TD';}
			elseif($fich_unit['cour_type']=='td_corr'){$type='Td Corriger';}
			elseif($fich_unit['cour_type']=='tp'){$type='TP';}
			elseif($fich_unit['cour_type']=='tp_corr'){$type='Tp Corriger';}
			elseif($fich_unit['cour_type']=='emd'){$type='EMD';}
			elseif($fich_unit['cour_type']=='emd_corr'){$type='Emd Corriger';}

		$texte = $fich_unit['cour_ext'];
		if ( preg_match('/pdf/',$texte) ){ $ext='./img/type_fichier/fich_pdf.png';} 
		elseif ( preg_match('/word/',$texte) ){ $ext='./img/type_fichier/fich_word.png';} 
		elseif ( preg_match('/png/',$texte) ){ $ext='./img/type_fichier/fich_png.png';} 
		elseif ( preg_match('/jpg/',$texte) ){ $ext='./img/type_fichier/fich_jpeg.png';}
		elseif ( preg_match('/jpeg/',$texte) ){ $ext='./img/type_fichier/fich_jpeg.png';}
		elseif ( preg_match('/presentation/',$texte) ){ $ext='./img/type_fichier/fich_pp.png';}
		elseif ( preg_match('/octet-stream/',$texte) ){ $ext='./img/type_fichier/fich_rar.png';}
		elseif ( preg_match('/spreadsheet/',$texte) ){ $ext='./img/type_fichier/fich_xls.png';}
		else { $ext='./img/type_fichier/fich_rar.png';}
			
			$date = date_create($fich_unit['cour_date_pub']);
			
			echo (' 
	  <div class="res_item res_dif">
          <img class="img_res" src="../'.$ext.'">
          <h2 class="res_nom">'.$fich_unit['cour_nom'].'</h2>
          <h2 class="res_module">'.$fich_unit['cour_module'].'</h2>
          <h2 class="res_type">'.$type.'</h2>
          <h2 class="res_annee">'.$fich_unit['cour_anne_univ'].'</h2>
          <h2 class="res_partager_p"> '.$pseudo.' ID:'.$id_user.'</h2>
		  <h2 class="res_nom">'.date_format($date, 'd-m-Y').'</h2>
          <a href="../'.$fich_unit['cour_path'].'" target="_blank">
            <div class="btn_voir"> 
              <img src="./../img/type_fichier/voir.png">
              <h2>Voir</h2>
            </div>
          </a>

          <a href="../'.$fich_unit['cour_path'].'" download>
            <div class="btn_telecharger"> 
              <img src="./../img/type_fichier/telecharger.png">
              <h2>Telecharger</h2>
            </div>
          </a>

		  <div class="btn_sign_ok">
	<input type="hidden" value="'.$fich_unit['cour_id'].'" name="cour_id" class="cour_id">
	<input type="hidden" value="'.$fich_unit['cour_type'].'" name="cour_type" class="cour_type">
	<img src="../img/oui.png">
	<h2>Autoriser</h2>
 </div>

     
				                
      <div class="contenaire_sup">
        <div class="slide_sup"> 

          <h2>Suprimer ce fichier</h2>
          <img src="../img/close.png">
        </div>
        <div class="box_sup">

          <h3>Voulez vous vraiment suprimer ce fichier ?</h3>
           <div class="btn_sup_oui"> 
              <img src="../img/oui.png">
              <h2>OUI</h2>
            </div>
              <div class="btn_sup_non"> 
              <img src="../img/non.png">
              <h2>NON</h2>
            </div>
       </div>
       
       <div class="box_sup_valide">

      <form method="post" action="./php_server_admin/sup_fich.php" class="form_sup">
       <input type="hidden" value="'.$fich_unit['cour_id'].'" name="sup_id" >
              <input type="hidden" value="'.$fich_unit['cour_type'].'" name="Type_fich" >
       <input type="submit" value="suprimer">
      </form>
       </div>
      </div>
      </div>
  ');


		}

	}
}


?>

