
<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
	$data=addslashes($data);
  return $data;
}

if(isset($_GET['txt_rech'])){
  $msg_titre=test_input($_GET['txt_rech']);
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
		$pred=$_SESSION['page_act']."&page=".($page-1);
	else 
		$pred=$_SESSION['page_act'];

	$suiv=$_SESSION['page_act']."?&page=".($page+1);

	/******************************************************************************************/
  $msg_all=$bdd->query("SELECT *  FROM msg WHERE msg_titre LIKE '%$msg_titre%' OR msg_texte LIKE '%$msg_titre%' ORDER BY  `msg_date_pub` DESC  LIMIT $debut, $nbr_p_page");

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

  $msg_all=$bdd->query("SELECT *  FROM msg ORDER BY  `msg_date_pub` DESC  LIMIT $debut , $nbr_p_page");

}

	    	$cmpt_unit=$msg_all->rowCount();
	if($cmpt_unit==0)
	{
		$msg_erreur='Aucun resultat trouver';
	      echo('<h3 class="ph_erreur">'.$msg_erreur.'</h3>');
	}


while($msg_unit=$msg_all->fetch())
{
  $id_user=$msg_unit['msg_user_id'];
  $user_all=$bdd->query("SELECT *  FROM user WHERE user_id='$id_user'" );
  $user_unit=$user_all->fetch();
  
  $msg_id=$msg_unit['msg_id'];
  $nbr_all=$bdd->query("SELECT COUNT(*) AS nbr_rep  FROM rep_msg WHERE rep_msg_id='$msg_id'" );
  $nbr=$nbr_all->fetch();
  
    if($id_user==-1){$img='/img/admin.png';}
  else $img=$user_unit['user_img_path'];
  
  
  $date = date_create($msg_unit['msg_date_pub']);

  echo('<div class="msg_item res_dif">

          <div class="msg_info">
            <img src="../.' .$img.'">
            <h2 class="msg_user">' .$msg_unit['msg_user_pseudo'].'</h2>
          </div>

          <div class="msg">
            <h2 class="msg_titre">'.$msg_unit['msg_titre'].'</h2>
            <h4 class="msg_date">le '.date_format($date, 'd-m-Y').' a '.date_format($date, 'H:i').'</h4>
            <div class="detail_msg">
              <p class="msg_cont">' .$msg_unit['msg_texte'].' </p>
              <a href="forum_reponce.php?id_msg='.$msg_unit['msg_id'].'" class="nbr_reponce"><button>' .$nbr['nbr_rep'].' Reponces</button> </a>

              <div class="btn_rep"> 
			  <a href="../php_server/visiteur.php" class="link_visiteur">
                <h2>Repondre?</h2>
				</a>
              </div>



            </div>
          </div>

          <hr class="ligne_fin">
        </div>
');
}
$bdd =NULL;

?>