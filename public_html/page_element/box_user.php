
<div class="contenaire_user">
<img src=".<?php echo $_SESSION['user_img_path']; ?>" class="img_user">
 
 <div class="box_user">

  <h2 class="txt_pseudo"><?php echo $_SESSION['user_pseudo']; ?></h2> 
	<form method="post" action="deconnexion.php">
		<input type="submit" value="Deconnexion" class="btn_decnx"> 
	</form>
	<a href="compte.php" class="lien_compte"><button class="btn_compte">Compte</button></a> 
</div>
</div>