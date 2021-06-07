<?php 
session_start();
$login = "fayem7409@gmail.com";
$mdp = "fayefaye@20";
if (isset($_POST['btnSubmit'])) {
	if (!empty($_POST['login']) AND !empty($_POST['mdp'])) {
		if ($_POST['login'] == $login AND $_POST['mdp'] == $mdp) {
			$_SESSION['login'] = $_SESSION[$login];
			$_SESSION['mdp'] = $_SESSION[$mdp];
			header('location:admin.php');
		}else{
			header('location:connexion.php?erreur=Login ou Mot de passe incorrect !');
		}
	}else{
		header('location:connexion.php?erreur=Veuillez remplir tous les champs svp !');
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style type="text/css">
		.myheader form p input{
			width:300px;
			height: 40px;
			border: none;
			border-radius: 5px;
			outline: none;
			padding: 5px 10px;
		}
		.myheader form p input:hover{
			background: #eee;
		}
		.myheader form span input{
			width:150px;
			height: 40px;
			outline: none;
			cursor: pointer;
			border:none;
			border-radius: 5px;
			background: #FF7B07;
			color: #fff;
			font-size: 15px;
		}
		.myheader form span input:hover{
			background: #ddeeee;
		}

	</style>
</head>
<body>
	<nav class="myNav">
		<h1>MaBoutique</h1>
		<div class="menu">
			<a href="#acceuil">Acceuil</a>
			<a href="#produits">Nos produits</a>
			<a href="#services">Services</a>
			<a href="#contacts">contacts</a>
		</div>
		<span><a href="panier.php">Commande</a></span>
	</nav>
	<header class="myheader" id="">
		<h1>Se connecter ici</h1>
		<form action="" method="post">
			<p>
				<input type="email" name="login" placeholder="Email">
			</p>
			<p>
				<input type="password" name="mdp" placeholder="Mot de passe">
			</p>
			<span>
				<input type="submit" name="btnSubmit" value="Se connecter">
			</span>
		</form>
	</header>
</body>
</html>