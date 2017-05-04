
<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
	$data=addslashes($data);
  return $data;
}

if( isset($_GET['user_id']) and isset($_GET['user_pseudo']) and isset($_GET['user_nom']) and isset($_GET['user_prenom']) and isset($_GET['user_date_nais']) and isset($_GET['user_annee_univ']) and isset($_GET['user_sexe']) and isset($_GET['user_email']) and isset($_GET['user_date_insc']))
{
	$user_id=test_input($_GET['user_id']);
	$user_pseudo= test_input($_GET['user_pseudo']); 
	$user_nom=test_input($_GET['user_nom']);
	$user_prenom= test_input($_GET['user_prenom']); 
	$user_date_nais=test_input($_GET['user_date_nais']);
	$user_annee_univ= test_input($_GET['user_annee_univ']); 
	$user_sexe=test_input($_GET['user_sexe']);
	$user_email= test_input($_GET['user_email']); 
	$user_date_insc=test_input($_GET['user_date_insc']);
	


include('cnx_db.php');
	
	if (empty($user_id)) $user_id='';
	if (empty($user_pseudo)) $user_pseudo='';
	if (empty($user_nom)) $user_nom='';
	if (empty($user_prenom)) $user_prenom='';
	if (empty($user_date_nais)) $user_date_nais='';
	if (empty($user_annee_univ)) $user_annee_univ='';
	if (empty($user_sexe)) $user_sexe='';
	if (empty($user_email)) $user_email='';
	if (empty($user_date_insc)) $user_date_insc='';
	

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

	$user_all=$bdd->query("SELECT * FROM  user 
	WHERE`user_id` LIKE '%$user_id%'
	AND `user_pseudo` LIKE '%$user_pseudo%' 
	AND  `user_nom` LIKE  '%$user_nom%'
	AND `user_prenom` LIKE '%$user_prenom%' 
	AND  `user_date_nais` LIKE  '%$user_date_nais%' 
	AND `user_sexe` LIKE '%$user_sexe%' 
	AND  `user_annee_univ` LIKE  '%$user_annee_univ%' 
	AND  `user_email` LIKE  '%$user_email%' 
	AND  `user_date_insc` LIKE  '%$user_date_insc%' 
	ORDER BY  `user_date_insc` DESC  LIMIT $debut , $nbr_p_page");

	     	$cmpt_unit=$user_all->rowCount();
	if($cmpt_unit==0)
	{
		$msg_erreur='Aucun resultat trouver';
	      echo('<h3 class="ph_erreur">'.$msg_erreur.'</h3>');
	}


	
	while($user_unit=$user_all->fetch())
	{

		$date_nais = date_create($user_unit['user_date_nais']); /*date_format($date, 'd-m-Y')*/
		$date_insc = date_create($user_unit['user_date_insc']);
		if($user_unit['user_sexe']=='m') $sexe='Homme';
		elseif($user_unit['user_sexe']=='f') $sexe='Femme';
		else $sexe='';
		echo (' 
        <div class="item_user res_dif">

          <img src="../'.$user_unit['user_img_path'].'" class="res_img_user">
          <h4 class="res_info_user">ID: '.$user_unit['user_id'].'</h4>
          <h4 class="res_info_user">Pseudo: '.$user_unit['user_pseudo'].'</h4>
          <h4 class="res_info_user">Nom: '.$user_unit['user_nom'].'</h4>
          <h4 class="res_info_user">Prenom: '.$user_unit['user_prenom'].'</h4>

          <h2 class="res_slide_detail">detail..</h2>
          <div class="res_detail_user">
            <h4 class="res_info_user">Niveau: '.$user_unit['user_annee_univ'].'</h4>
            <h4 class="res_info_user">Sexe: '.$sexe.'</h4>
            <h4 class="res_info_user">D-N: '.date_format($date_nais, 'd-m-Y').'</h4>
            <h4 class="res_info_user">Email: '.$user_unit['user_email'].'</h4>
            <h4 class="res_info_user">D-Insc: '.date_format($date_insc, 'd-m-Y').'</h4>
          </div>

            
      <div class="contenaire_sup">
        <div class="slide_sup"> 

          <h2>Suprimer cette utilisateur</h2>
          <img src="../img/close.png">
        </div>
        <div class="box_sup">

          <h3>Voulez vous vraiment suprimer cette utilisateur ?</h3>
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

      <form method="post" action="./php_server_admin/sup_user.php" class="form_sup">
       <input type="hidden" value="'.$user_unit['user_id'].'" name="sup_id" >
       <input type="submit" value="suprimer">
      </form>
       </div>
      </div>
  
  

        </div> ');


	}
}
else

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

	$user_all=$bdd->query("SELECT * FROM  user ORDER BY  `user_date_insc` DESC  LIMIT $debut , $nbr_p_page");

		     	$cmpt_unit=$user_all->rowCount();
	if($cmpt_unit==0)
	{
		$msg_erreur='Aucun resultat trouver';
	      echo('<h3 class="ph_erreur">'.$msg_erreur.'</h3>');
	}



	while($user_unit=$user_all->fetch())
	{

		$date_nais = date_create($user_unit['user_date_nais']); 
		$date_insc = date_create($user_unit['user_date_insc']);
		if($user_unit['user_sexe']=='m') $sexe='Homme';
		elseif($user_unit['user_sexe']=='f') $sexe='Femme';
		else $sexe='';
		echo (' 
        <div class="item_user res_dif">

          <img src="../'.$user_unit['user_img_path'].'" class="res_img_user">
          <h4 class="res_info_user">ID: '.$user_unit['user_id'].'</h4>
          <h4 class="res_info_user">Pseudo: '.$user_unit['user_pseudo'].'</h4>
          <h4 class="res_info_user">Nom: '.$user_unit['user_nom'].'</h4>
          <h4 class="res_info_user">Prenom: '.$user_unit['user_prenom'].'</h4>

          <h2 class="res_slide_detail">detail..</h2>
          <div class="res_detail_user">
            <h4 class="res_info_user">Niveau: '.$user_unit['user_annee_univ'].'</h4>
            <h4 class="res_info_user"> '.$sexe.'</h4>
            <h4 class="res_info_user">D-N: '.date_format($date_nais, 'd-m-Y').'</h4>
            <h4 class="res_info_user">Email: '.$user_unit['user_email'].'</h4>
            <h4 class="res_info_user">D-Insc: '.date_format($date_insc, 'd-m-Y').'</h4>
          </div>

            
      <div class="contenaire_sup">
        <div class="slide_sup"> 

          <h2>Suprimer cette utilisateur</h2>
          <img src="../img/close.png">
        </div>
        <div class="box_sup">

          <h3>Voulez vous vraiment suprimer cette utilisateur ?</h3>
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

      <form method="post" action="./php_server_admin/sup_user.php" class="form_sup">
       <input type="hidden" value="'.$user_unit['user_id'].'" name="sup_id" >
       <input type="submit" value="suprimer">
      </form>
       </div>
      </div>
  
  

        </div> ');


	}
	

}
?>