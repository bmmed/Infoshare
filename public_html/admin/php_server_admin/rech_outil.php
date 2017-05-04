
<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
	$data=addslashes($data);
  return $data;
}


if( isset($_GET['outil_nom']) and isset($_GET['outil_annee_univ']))
{
	$outil_nom=test_input($_GET['outil_nom']);
	$outil_annee_univ= test_input($_GET['outil_annee_univ']); 


include('cnx_db.php');
	
	if (empty($outil_nom)) $outil_nom='';
	if (empty($outil_annee_univ)) $outil_annee_univ='';

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


	$outil_all=$bdd->query("SELECT * FROM  outil  WHERE  `outil_nom` LIKE '%$outil_nom%' AND `outil_annee_univ` LIKE '%$outil_annee_univ%' ORDER BY  `outil_date_pub` DESC  LIMIT $debut, $nbr_p_page");

	     	$cmpt_unit=$outil_all->rowCount();
	if($cmpt_unit==0)
	{
		$msg_erreur='Aucun resultat trouver';
	      echo('<h3 class="ph_erreur">'.$msg_erreur.'</h3>');
	}
	
	while($outil_unit=$outil_all->fetch())
	{

		$date = date_create($outil_unit['outil_date_pub']); /*date_format($date, 'd-m-Y')*/
		echo (' 
       <div class="res_item">
          <img class="img_res" src="../'.$outil_unit['outil_img_path'].'">
          <h2 class="res_nom">'.$outil_unit['outil_nom'].'</h2>
          <h2 class="res_annee">'.$outil_unit['outil_annee_univ'].'</h2>
          <a href="'.$outil_unit['outil_lien'].'" target="_blank">
            <div class="btn_voir"> 
              <img src="../img/link.png">
              <h2>Suivre le lien</h2>
            </div>
          </a>

          <div class="contenaire_sup">
            <div class="slide_sup"> 

              <h2>Suprimer cette outil</h2>
              <img src="../img/close.png">
            </div>
            <div class="box_sup">

              <h3>Voulez vous vraiment suprimer cette outil ?</h3>
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

              <form method="post" action="./php_server_admin/sup_outil.php" class="form_sup">
                <input type="hidden" value="'.$outil_unit['outil_id'].'" name="sup_id_outil" >
                <input type="submit" value="suprimer">
              </form>
            </div>
          </div>
        </div> ');


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

	$outil_all=$bdd->query("SELECT * FROM  outil  ORDER BY  `outil_date_pub` DESC  LIMIT $debut , $nbr_p_page");

	
	     	$cmpt_unit=$outil_all->rowCount();
	if($cmpt_unit==0)
	{
		$msg_erreur='Aucun resultat trouver';
	      echo('<h3 class="ph_erreur">'.$msg_erreur.'</h3>');
	}
	

	while($outil_unit=$outil_all->fetch())
	{

		$date = date_create($outil_unit['outil_date_pub']);
		echo (' 
       <div class="res_item">
          <img class="img_res" src="../'.$outil_unit['outil_img_path'].'">
          <h2 class="res_nom">'.$outil_unit['outil_nom'].'</h2>
          <h2 class="res_annee">'.$outil_unit['outil_annee_univ'].'</h2>
          <a href="'.$outil_unit['outil_lien'].'" target="_blank">
            <div class="btn_voir"> 
              <img src="../img/link.png">
              <h2>Suivre le lien</h2>
            </div>
          </a>

          <div class="contenaire_sup">
            <div class="slide_sup"> 

              <h2>Suprimer cette outil</h2>
              <img src="../img/close.png">
            </div>
            <div class="box_sup">

              <h3>Voulez vous vraiment suprimer cette outil ?</h3>
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

              <form method="post" action="./php_server_admin/sup_outil.php" class="form_sup">
                <input type="hidden" value="'.$outil_unit['outil_id'].'" name="sup_id" >
                <input type="submit" value="suprimer">
              </form>
            </div>
          </div>
        </div> ');


	}

}

?>