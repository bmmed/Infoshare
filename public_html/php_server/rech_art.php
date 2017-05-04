
<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
	$data=addslashes($data);
  return $data;
}

if( isset($_GET['art_titre']) and isset($_GET['art_url']))
{
	$art_titre=test_input($_GET['art_titre']);
	$art_url= test_input($_GET['art_url']); 

include('cnx_db.php');
	
	if (empty($art_titre)) $art_titre='';
	if (empty($art_url)) $art_url='';

	/******************************************************************************************/
	$nbr_p_page=6;
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



	$art_all=$bdd->query("SELECT * FROM  article  WHERE  (`art_titre` LIKE '%$art_titre%' OR `art_texte` LIKE '%$art_titre%') AND  `art_lien` LIKE  '%$art_url%' ORDER BY  `art_date_pub` DESC  LIMIT $debut , $nbr_p_page");

	
    	$cmpt_unit=$art_all->rowCount();
	if($cmpt_unit==0)
	{
		$msg_erreur='Aucun resultat trouver';
	      echo('<h3 class="ph_erreur">'.$msg_erreur.'</h3>');
	}


	
	while($art_unit=$art_all->fetch())
	{
	

		$date = date_create($art_unit['art_date_pub']); /*date_format($date, 'd-m-Y')*/
		echo (' 
                <div class="article">
          <img src="./'.$art_unit['art_img_path'].'" class="img_article">
          <h2>'.$art_unit['art_titre'].'</h2>
          <img class="btn_plus_inf" src="./img/article/plus_inf.png">
          <div class="detail_article">
		   <h2>le '.date_format($date, 'd-m-Y').'</h2>
            <p>'.$art_unit['art_texte'].' </p>
			
		  
            <a href="'.$art_unit['art_lien'].'" target="_blank">un lien pour plus d\'info</a>

          </div>


          <hr class="ligne_fin">
        </div>  ');


	}

}else

{

include('cnx_db.php');
	
/******************************************************************************************/
		$nbr_p_page=6;
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


	$art_all=$bdd->query("SELECT * FROM  article  ORDER BY  `art_date_pub` DESC  LIMIT $debut , $nbr_p_page");

	    	$cmpt_unit=$art_all->rowCount();
	if($cmpt_unit==0)
	{
		$msg_erreur='Aucun resultat trouver';
	      echo('<h3 class="ph_erreur">'.$msg_erreur.'</h3>');
	}
	
	while($art_unit=$art_all->fetch())
	{

		$date = date_create($art_unit['art_date_pub']); 
		echo (' 
                <div class="article">
          <img src="./'.$art_unit['art_img_path'].'" class="img_article">
          <h2>'.$art_unit['art_titre'].'</h2>
          <img class="btn_plus_inf" src="./img/article/plus_inf.png">
          <div class="detail_article">
		   <h2>le '.date_format($date, 'd-m-Y').'</h2>
            <p>'.$art_unit['art_texte'].' </p>
			
		  
            <a href="'.$art_unit['art_lien'].'" target="_blank">un lien pour plus d\'info</a>

          </div>


          <hr class="ligne_fin">
        </div> ');


	}


}

?>