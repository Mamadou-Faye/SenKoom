<?php require "panier.php"; ?>
<?php 

$bdd = new PDO('mysql:host=127.0.0.1;dbname=monpoisson;charset=utf8', 'root', '');
if (!isset($_SESSION['idClient'])) {
	header('location:clientConnect.php?erreur=Connectez-vous ici maintenant !');
}
?>
