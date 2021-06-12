<?php
session_start(); 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=monpoisson', 'root', '');

if (isset($_POST['btnValide'])) {
	$name = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars($_POST['email']);
	$number = htmlspecialchars($_POST['numero']);
	$adresse = htmlspecialchars($_POST['ville']);
	if (!empty($name) AND !empty($email) AND !empty($number) AND !empty($adresse)) {
		$namelength = strlen($name);
		if ($namelength <= 30) {
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$clientinfo = $bdd->prepare('SELECT * FROM clients where email = ? AND numero = ?');
				$clientinfo->execute(array($email, $number));
				$clientExist = $clientinfo->rowCount();
				if ($clientExist == 1) {
					header('location:cientConnect.php');
				}else{
					$insertClient = $bdd->prepare('INSERT INTO clients (name, email, numero, adresse) VALUES (?, ?, ?, ?)');
					$insertClient->execute(array($name, $email, $number, $adresse));
					header('location:clients.php');
				}
			}else{
				header('location:clientInscript.php?erreur=Veillez saisir une email valide svp !');
			}
		}else{
			header('location:clientInscript.php?erreur=Votre nom ne doit pas dépasser 30 caractères !');
		}
	}else{
		header('location:clientInscript.php?erreur=Tous les champs doivent être remplir !');
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>validation du panier</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- <style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap');
		@import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');

	</style> -->
</head>
<body class="">
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
	<header class="myFormInscript id="">
		<section class="form-validate">
			<h1>Veuillez remplir ce formulaire svp</h1>
			<form action="" method="post">
				<p>
					<input type="text" name="name" placeholder="Votre nom svp *">
				</p>
				<p>
					<input type="email" name="email" placeholder="Votre email svp *">
				</p>
				<p>
					<input type="tel" name="numero" placeholder="Votre numéro svp *">
				</p>
				<p>
					<select id="ville" name="ville">
						<option selected disabled>Votre ville</option>
						<option value="mbour">Mbour</option>
						<option value="saly">Saly</option>
						<option value="ngaparou">Ngaparou</option>
						<option value="samone">Somone</option>
						<option value="sindia">Sindia</option>
						<option value="campama">Campama Ngékokh</option>
						<option value="Ngandigale">Gandigale</option>
						<option value="nianing">Nianing</option>
						<option value="Warang">Warang</option>
						<option value="mbodiène">Mbodiène</option>
						<option value="joal">Joal</option>
						<option value="sandiara">Sandiara</option>
						<option value="thiadiaye">Thiadiaye</option>
					</select>
				</p>
				<span>
					<input type="submit" name="btnValide" value="Valider">
				</span>
			</form>
			<?php if (isset($_GET['erreur'])) {
				$erreur = $_GET['erreur'];?>
				<font style="color: red; margin-top: 15px;"><?= $erreur; ?></font>
				<?php
			} ?>
			<?php if (isset($_GET['msg'])) {
				$msg = $_GET['msg'];?>
				<font style="color: green; margin-top: 15px;"><?= $msg; ?></font>
				<?php
			} ?>
		</section>	
	</header>
	
</body>
</html>