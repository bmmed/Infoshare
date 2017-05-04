<div class="contenaire_user">
<img src="../../img/admin.png" class="img_user">
 
 <div class="box_user">

  <h2 class="txt_pseudo"><?php echo $_SESSION['admin_pseudo'];?></h2> 
	<form method="post" action="../deconnexion_admin.php">
		<input type="submit" value="Deconnexion" class="btn_decnx"> 
	</form>
	
</div>
</div>