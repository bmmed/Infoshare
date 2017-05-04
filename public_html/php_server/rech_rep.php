<?php

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
  
  $msg_id=$_GET['id_msg'];


include('cnx_db.php');


  $rep_all=$bdd->query("SELECT *  FROM rep_msg WHERE rep_msg_id='$msg_id' ORDER BY  `rep_date_pub` DESC LIMIT $debut , $nbr_p_page");


	    	$cmpt_unit=$rep_all->rowCount();
	if($cmpt_unit==0)
	{
		$msg_erreur='Aucun resultat trouver';
	      echo('<h3 class="ph_erreur">'.$msg_erreur.'</h3>');
	}



while($rep_unit=$rep_all->fetch())
{
  $date = date_create($rep_unit['rep_date_pub']);
  $id_user=$rep_unit['rep_user_id'];
  $user_all=$bdd->query("SELECT *  FROM user WHERE user_id='$id_user'" );
  $user_unit=$user_all->fetch();
  
    if($id_user==-1){$img='/img/admin.png';}
  else $img=$user_unit['user_img_path'];
  
  echo('
        


          <div class="rep_item res_dif">

            <div class="rep_info">
              <img src="../' .$img.'">
              <h2 class="msg_user">' .$rep_unit['rep_user_pseudo'].'</h2>
              
            </div>

            <div class="rep">
            
                <p class="rep_cont"> ' .$rep_unit['rep_texte'].' </p>
				<h4 class="msg_date">le '.date_format($date, 'd-m-Y').' a '.date_format($date, 'H:i').'</h4>

      
            </div>

          </div>


       
  
');
	
}
$bdd = NULL;

?>