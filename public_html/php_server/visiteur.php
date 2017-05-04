<?php
session_start();
$msg_erreur='Pour interagir sur le Forum, veuillez vous connecter ou bien vous inscrire.';
$_SESSION['msg_erreur']= $msg_erreur;
header('location:../index.php');
exit();
?>

