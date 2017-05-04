<?php
session_start();
?>

<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
	$data=addslashes($data);
  return $data;
}
if(isset($_POST['cour_id'])and isset($_POST['cour_type']))
{

	$cour_id= test_input($_POST['cour_id']); 
	$cour_type=test_input($_POST['cour_type']);


	if($cour_type=='cour'){$table='cour';}
	elseif($cour_type=='td' or $cour_type=='td_corr'){$table='td';}
	elseif($cour_type=='tp' or $cour_type=='tp_corr'){$table='tp';}
	elseif($cour_type=='emd' or $cour_type=='emd_corr'){$table='emd';}

include('cnx_db.php');

	
	$user_id=$_SESSION['user_id'];
	$bdd->query("UPDATE `$table` SET 
	`cour_sign_cmpt`= cour_sign_cmpt+1,
	`cour_sign_user_id`=CONCAT(cour_sign_user_id ,'/$user_id/' )
	WHERE  `cour_id` = $cour_id ");

	$bdd =NULL;
	echo 1;


}

else echo 0;

?>