
<?php
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data=addslashes($data);
	return $data;
}

if( isset($_GET['nom_fich']) or isset($_GET['annee_etude']) or isset($_GET['module']) or isset($_GET['Type_fich']))
{
	$fich_nom=test_input($_GET['nom_fich']);
	$fich_annee_univ= test_input($_GET['annee_etude']); 
	$fich_module=test_input($_GET['module']);
	$fich_type=test_input($_GET['Type_fich']);

	if($fich_type=='cour'){$table='cour';}
	elseif($fich_type=='td' or $fich_type=='td_corr'){$table='td';}
	elseif($fich_type=='tp' or $fich_type=='tp_corr'){$table='tp';}
	elseif($fich_type=='emd' or $fich_type=='emd_corr'){$table='emd';}
	else $table='cour';

include('cnx_db.php');

	if (empty($fich_nom)) $fich_nom='';
	if (empty($fich_type)) $fich_type='';
	if (empty($fich_module)) $fich_module='';

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

	$fich_all=$bdd->query("SELECT * FROM  $table  WHERE  `cour_anne_univ` LIKE '%$fich_annee_univ%' AND  `cour_module` LIKE  '%$fich_module%' AND  `cour_nom` LIKE  '%$fich_nom%' AND `cour_type` LIKE  '%$fich_type%'
	AND `cour_sign_cmpt` < 3
	ORDER BY  `cour_date_pub` DESC  LIMIT $debut , $nbr_p_page");


	    	$cmpt_unit=$fich_all->rowCount();
	if($cmpt_unit==0)
	{
		$msg_erreur='Aucun resultat trouver';
	      echo('<h3 class="ph_erreur">'.$msg_erreur.'</h3>');
	}





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

		if ( preg_match('/'.$id_user.'/',$fich_unit['cour_sign_user_id']) ){$cont_sign='<div class="btn_sign">
					<h2>deja SIgnaler</h2>
					</div>
					';}
		else{ $cont_sign='
							<a>
				  <div class="btn_sign">
					<input type="hidden" value="'.$fich_unit['cour_id'].'" name="cour_id" class="cour_id">
					<input type="hidden" value="'.$fich_unit['cour_type'].'" name="cour_type" class="cour_type">
					<img src="./img/type_fichier/sign.png">
					<h2>Signaler</h2>
				  </div>

					</a>';}



		$date = date_create($fich_unit['cour_date_pub']);

		echo (' 
	  <div class="res_item res_dif">
          <img class="img_res" src="'.$ext.'">
          <h2 class="res_nom">'.$fich_unit['cour_nom'].'</h2>
          <h2 class="res_module">'.$fich_unit['cour_module'].'</h2>
          <h2 class="res_type">'.$type.'</h2>
          <h2 class="res_annee">'.$fich_unit['cour_anne_univ'].'</h2>
          <h2 class="res_partager_p"> '.$pseudo.' </h2>
		  <h2 class="res_nom">'.date_format($date, 'd-m-Y').'</h2>
          <a href="./'.utf8_encode($fich_unit['cour_path']).'" target="_blank">
            <div class="btn_voir"> 
              <img src="./img/type_fichier/voir.png">
              <h2>Voir</h2>
            </div>
          </a>

          <a href="./'.utf8_encode($fich_unit['cour_path']).'" download>
            <div class="btn_telecharger"> 
              <img src="./img/type_fichier/telecharger.png">
              <h2>Telecharger</h2>
            </div>
          </a>

 '.$cont_sign.'

        </div>  ');


	}

}
else 

{

	$fich_annee_univ=$_SESSION['user_annee_univ']; 

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

		$fich_all=$bdd->query("SELECT * FROM  $table  WHERE  `cour_anne_univ` = '$fich_annee_univ'
		AND `cour_sign_cmpt` < 3
		ORDER BY  `cour_date_pub` DESC  LIMIT $debut , $nbr_p_page");


	    	$cmpt_unit=$fich_all->rowCount();
	if($cmpt_unit==0)
	{
		$msg_erreur='Aucun resultat trouver dans '.$table.'';
	      echo('<h3 class="ph_erreur">'.$msg_erreur.'</h3>');
	}


		while($fich_unit=$fich_all->fetch())
		{
			$id_user=$fich_unit['cour_user_id'];
			$user_all=$bdd->query("SELECT *  FROM user WHERE user_id='$id_user'" );
			$user_unit=$user_all->fetch();

			if($id_user==-1) $pseudo='Administrateur';
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

			if ( preg_match('/'.$id_user.'/',$fich_unit['cour_sign_user_id']) ){$cont_sign='<div class="btn_sign">
					<h2>deja SIgnaler</h2>
					</div>
					';}
			else{ $cont_sign='
							<a>
				  <div class="btn_sign">
					<input type="hidden" value="'.$fich_unit['cour_id'].'" name="cour_id" class="cour_id">
					<input type="hidden" value="'.$fich_unit['cour_type'].'" name="cour_type" class="cour_type">
					<img src="./img/type_fichier/sign.png">
					<h2>Signaler</h2>
				  </div>

					</a>';}

			$date = date_create($fich_unit['cour_date_pub']);

			echo (' 
	  <div class="res_item res_dif">
          <img class="img_res" src="'.$ext.'">
          <h2 class="res_nom">'.$fich_unit['cour_nom'].'</h2>
          <h2 class="res_module">'.$fich_unit['cour_module'].'</h2>
          <h2 class="res_type">'.$type.'</h2>
          <h2 class="res_annee">'.$fich_unit['cour_anne_univ'].'</h2>
          <h2 class="res_partager_p"> '.$pseudo.' </h2>
		   <h2 class="res_nom">'.date_format($date, 'd-m-Y').'</h2>
          <a href="./'.utf8_encode($fich_unit['cour_path']).'" target="_blank">
            <div class="btn_voir"> 
              <img src="./img/type_fichier/voir.png">
              <h2>Voir</h2>
            </div>
          </a>

          <a href="./'.utf8_encode($fich_unit['cour_path']).'" download>
            <div class="btn_telecharger"> 
              <img src="./img/type_fichier/telecharger.png">
              <h2>Telecharger</h2>
            </div>
          </a>
		  '.$cont_sign.'



        </div>  ');


		}

	}
}

?>
