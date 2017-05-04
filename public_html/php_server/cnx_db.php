<?php
try {
 $bdd = new PDO('mysql:host=mysql6.000webhost.com;dbname=id479352_sharus','id479352_bmmed','sharus');
} catch (PDOException $e) {
 die( "Erreur ! : " . $e->getMessage() );
}
?>