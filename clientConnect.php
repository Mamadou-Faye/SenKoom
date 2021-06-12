<?php 
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=monpoisson', 'root', '');
if (isset($_POST['btnSubmitConnect'])) {
	$emailConnect = htmlspecialchars($_POST['emailConnect']);
	$mdpConnect = sha1($_POST['mdpConnect']);
	if (!empty($emailConnect) AND !empty($mdpConnect)) {
		$reqClient = $bdd->prepare('SELECT * FROM clients WHERE email = ?');
		$reqClient->execute(array($emailConnect));
		$isClient = $reqClient->rowCount();
		if ($isClient == 1) {
			$clientinfo = $reqClient->fetch();
			$_SESSION['idClient'] = $clientinfo['idClient'];
			$_SESSION['email'] = $clientinfo['email'];
			header('location:clients.php');
		}else{
			header('location:ClientConnect.php?erreur=Ce compte n\'existe pas !');
		}
	}else{
		header('location:ClientConnect.php?erreur=Tous les champs doivent être remplis !');
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Connexion</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<nav class="myNav">
		<h1>MaBoutique</h1>
		<div class="menu">
			<a href="index.php#acceuil">Acceuil</a>
			<a href="index.php#produits">Nos produits</a>
			<a href="index.php#services">Services</a>
			<a href="index.php#contacts">contacts</a>
		</div>
		<span><a href="panier.php">votre panier</a></span>
	</nav>
	<div class="myform" align="center">
		<h1>Se connecter</h1>
		<form action="" method="post">
			<p>
				<input type="email" name="emailConnect" placeholder="Email" autofocus>
			</p>
			<p>
				<input type="password" name="mdpConnect" placeholder="Mot de passe">
			</p>
			<span>
				<input type="submit" name="btnSubmitConnect" value="Se connecter">
			</span>
		</form>
		<?php if (isset($_GET['erreur'])) {
			$erreur = $_GET['erreur'];?>
			<font class="erreur" style="color: red; margin-top: 15px;"><?= $erreur; ?></font>
			<?php
		} ?>
		<?php if (isset($_GET['msg'])) {
			$msg = $_GET['msg'];?>
			<font style="color: green; margin-top: 15px;"><?= $msg; ?></font>
			<?php
		} ?>
		<p><a class="link-insc" href="ClientInscript.php">S'inscrire</a></p>
	</div>
</body>
</html>