
<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
	$data=addslashes($data);
  return $data;
}


if( isset($_GET['affi_nom']) and isset($_GET['affi_titre'])and isset($_GET['affi_type'])and isset($_GET['affi_annee_univ']))
{
  $affi_nom=test_input($_GET['affi_nom']);
  $affi_titre= test_input($_GET['affi_titre']); 
  $affi_type=test_input($_GET['affi_type']);
  $affi_annee_univ=test_input($_GET['affi_annee_univ']);


include('cnx_db.php');

  if (empty($affi_nom)) $affi_nom='';
  if (empty($affi_titre)) $affi_titre='';
  if (empty($affi_type)) $affi_type='';
  if (empty($affi_annee_univ)) $affi_annee_univ='';
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


  $affi_all=$bdd->query("SELECT * FROM  affichage  WHERE  `aff_nom` LIKE '%$affi_nom%' AND  `aff_titre` LIKE  '%$affi_titre%' AND  `aff_type` LIKE  '%$affi_type%' AND `aff_annee_univ` LIKE  '%$affi_annee_univ%' ORDER BY  `aff_date_pub` DESC  LIMIT $debut , $nbr_p_page");
  
    	$cmpt_unit=$affi_all->rowCount();
	if($cmpt_unit==0)
	{
		$msg_erreur='Aucun resultat trouver';
	      echo('<h3 class="ph_erreur">'.$msg_erreur.'</h3>');
	}

	


  while($affi_unit=$affi_all->fetch())
  {

    if($affi_unit['aff_type']=='e_t')			{$type='emplois de temp / EMD';}
    elseif($affi_unit['aff_type']=='note')		{$type='Note';}
    elseif($affi_unit['aff_type']=='divers')	{$type='Divers';}


    $texte = $affi_unit['affi_ext'];
    if ( preg_match('/pdf/',$texte) ){ $ext='/img/type_fichier/fich_pdf.png';} 
    elseif ( preg_match('/word/',$texte) ){ $ext='/img/type_fichier/fich_word.png';} 
    elseif ( preg_match('/png/',$texte) ){ $ext='/img/type_fichier/fich_png.png';} 
    elseif ( preg_match('/jpg/',$texte) ){ $ext='/img/type_fichier/fich_jpeg.png';}
    elseif ( preg_match('/jpeg/',$texte) ){ $ext='/img/type_fichier/fich_jpeg.png';}
    elseif ( preg_match('/presentation/',$texte) ){ $ext='/img/type_fichier/fich_pp.png';}
    elseif ( preg_match('/octet-stream/',$texte) ){ $ext='/img/type_fichier/fich_rar.png';}
    elseif ( preg_match('/spreadsheet/',$texte) ){ $ext='/img/type_fichier/fich_xls.png';}
    else { $ext='/img/type_fichier/fich_rar.png';}

    $date = date_create($affi_unit['aff_date_pub']);
    echo (' 
        <div class="res_item res_dif">
          <img class="img_res" src=".'.$ext.'">
          <h2 class="res_nom">'.$affi_unit['aff_nom'].'</h2>
          <h2 class="res_annee">'.$affi_unit['aff_annee_univ'].'</h2>
          <h2 class="res_type">'.$type.'</h2>
          <h2 class="res_type">le'.date_format($date, 'd-m-Y').'</h2>

          <a href="./'.utf8_encode($affi_unit['affi_path']).'" target="_blank">
            <div class="btn_voir"> 
              <img src="./img/type_fichier/voir.png">
              <h2>Voir</h2>
            </div>
          </a>

          <a href="./'.utf8_encode($affi_unit['affi_path']).'" download>
            <div class="btn_telecharger"> 
              <img src="./img/type_fichier/telecharger.png">
              <h2>Telecharger</h2>
            </div>
          </a>

</div>');


  }

}else

{

include('cnx_db.php');



		
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
			$pred=$_SESSION['page_act']."?page=".($page-1);
		else 
			$pred=$_SESSION['page_act'];

		$suiv=$_SESSION['page_act']."?page=".($page+1);


		/******************************************************************************************/

  $affi_all=$bdd->query("SELECT * FROM  affichage   ORDER BY  `aff_date_pub` DESC  LIMIT $debut , $nbr_p_page");

  
    	$cmpt_unit=$affi_all->rowCount();
	if($cmpt_unit==0)
	{
		$msg_erreur='Aucun resultat trouver';
	      echo('<h3 class="ph_erreur">'.$msg_erreur.'</h3>');
	}


  while($affi_unit=$affi_all->fetch())
  {

    if($affi_unit['aff_type']=='e_t')			{$type='emplois de temp / EMD';}
    elseif($affi_unit['aff_type']=='note')		{$type='Note';}
    elseif($affi_unit['aff_type']=='divers')	{$type='Divers';}


    $texte = $affi_unit['affi_ext'];
    if ( preg_match('/pdf/',$texte) ){ $ext='/img/type_fichier/fich_pdf.png';} 
    elseif ( preg_match('/word/',$texte) ){ $ext='/img/type_fichier/fich_word.png';} 
    elseif ( preg_match('/png/',$texte) ){ $ext='/img/type_fichier/fich_png.png';} 
    elseif ( preg_match('/jpg/',$texte) ){ $ext='/img/type_fichier/fich_jpeg.png';}
    elseif ( preg_match('/jpeg/',$texte) ){ $ext='/img/type_fichier/fich_jpeg.png';}
    elseif ( preg_match('/presentation/',$texte) ){ $ext='/img/type_fichier/fich_pp.png';}
    elseif ( preg_match('/octet-stream/',$texte) ){ $ext='/img/type_fichier/fich_rar.png';}
    elseif ( preg_match('/spreadsheet/',$texte) ){ $ext='/img/type_fichier/fich_xls.png';}
    else { $ext='/img/type_fichier/fich_rar.png';}

    $date = date_create($affi_unit['aff_date_pub']);
    echo (' 
        <div class="res_item res_dif">
          <img class="img_res" src=".'.$ext.'">
          <h2 class="res_nom">'.$affi_unit['aff_nom'].'</h2>
          <h2 class="res_annee">'.$affi_unit['aff_annee_univ'].'</h2>
          <h2 class="res_type">'.$type.'</h2>
          <h2 class="res_type">le'.date_format($date, 'd-m-Y').'</h2>

          <a href="./'.utf8_encode($affi_unit['affi_path']).'" target="_blank">
            <div class="btn_voir"> 
              <img src="./img/type_fichier/voir.png">
              <h2>Voir</h2>
            </div>
          </a>

          <a href="./'.utf8_encode($affi_unit['affi_path']).'" download>
            <div class="btn_telecharger"> 
              <img src="./img/type_fichier/telecharger.png">
              <h2>Telecharger</h2>
            </div>
          </a>

</div> ');


  }


}

?>