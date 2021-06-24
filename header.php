<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SamaJenn</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="css/all.css">
</head>
<body id="acceuil">
	<nav class="myNav">
		<h1>Sen~Koom</h1>
		<div class="menu">
			<a href="#acceuil">Acceuil</a>
			<a href="#produits">Nos produits</a>
			<a href="#services">Services</a>
			<a href="#contacts">contacts</a>
		</div>
		<span><a href="panier.php"><i class="fa fa-cart-plus"></i><span id="taille"><?= $panier->count(); ?></span></a></span>
	</nav>
	<header class="myheader" id="">
		<h1>Bienvenue Chez Nous</h1>
		<h3>Ici vous êtes à votre endroit idéal</h3>
		<div class="btnParcour">
			<a href="#produits">Parcourir</a>
		</div>
	</header>
