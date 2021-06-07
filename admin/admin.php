<?php 

$bdd = new PDO('mysql:host=127.0.0.1;dbname=monpoisson;charset=utf8', 'root', '');
// Obtenir mes contacts
$reqContact = $bdd->prepare('SELECT * from contact');
$reqContact->execute();
// Obtenir la liste de mes clients
$reqClient = $bdd->prepare('SELECT * FROM clients');
$reqClient->execute();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style type="text/css">
		.myheader .info-commande{
			margin-bottom: 30px;
			background: #ddeeee;
			padding: 20px 30px;
			width: 300px;
			border-radius: 10px;
		}
		.myheader .info-commande button{
			text-decoration: none;
			color: #fff;
			background: #FF7B07;
			padding: 10px 20px;
			border: none;
			border-radius: 10px;
		}
		.myheader .info-commande button:hover{
			background: #fff;
			color: #FF7B07;
		}

		/*the modal style css*/
		.myheader .modal{
			display: none; /*hidden by default*/
			position: fixed; /* Stay in place */
			z-index: 1; /*sit in top*/
			left: 0;
			top: 0;
			width: 100%; /*full width*/
			height: 100%; /*full height*/
			overflow: auto; /*Enable scroll if needed*/
			background-color: rgb(0,0,0); /*fullback color*/
			background-color: rgba(0,0,0,0.4); /*Black w/ opacity*/
		}
		/* Modal content/box*/
		.myheader .modal .modal-content{
			background-color: #fefefe;
			margin: 15% auto; /*15% from the top and centered*/
			padding: 20px;
			border: 1px solid #888;
			width: 80%; /*Could be more or less, depencing on screen size*/
		}
		/*the close button*/
		.myheader .modal .modal-content .close{
			color: #aaa;
			float: right;
			font-size: 28px;
			font-weight: bold;
		}
		.myheader .modal .modal-content .close:hover, .close:focus{
			color: black;
			text-decoration: none;
			cursor: pointer;
		}
		.myheader .modal .modal-content .closeCommande{
			color: #aaa;
			float: right;
			font-size: 28px;
			font-weight: bold;
		}
		.myheader .modal .modal-content .closeCommande:hover, .closeCommande:focus{
			color: black;
			text-decoration: none;
			cursor: pointer;
		}
		.myheader .modal .modal-content .closeClient{
			color: #aaa;
			float: right;
			font-size: 28px;
			font-weight: bold;
		}
		.myheader .modal .modal-content .closeClient:hover, .closeClient:focus{
			color: black;
			text-decoration: none;
			cursor: pointer;
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
		<h1>Bienvenue Sur la Page d'Administration</h1>
		<div class="info-commande">
			<button id="mybtn">mes messages</button>
		</div>
		<div class="info-commande">
			<button id="btnCommande">mes commandes</button>	
		</div>
		<div class="info-commande">
			<button id="btnClient">mes clients</button>
		</div>

		<!-- mon modal contact -->
		<div id="myModal" class="modal">
			<div class="modal-content">
				<span class="close">&times;</span>
				<ul>
				<?php while ($infoContact = $reqContact->fetch()) {
					?>
					<li><?= $infoContact['idContact']; ?> - <?= $infoContact['nameC']; ?> - <?= $infoContact['emailC']; ?> - <?= $infoContact['numC']; ?> - <?= $infoContact['message']; ?></li><a href="supprimer.php?id=<?= $infoContact['idContact']; ?>" id="mes_actions">supprimer</a><hr/>
					<?php
				} ?>
				</ul>
			</div>
		</div>
		<!-- mon modal commande -->
		<div id="myModalCommande" class="modal">
			<div class="modal-content">
				<span class="closeCommande">&times;</span>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</ul>
			</div>
		</div>
		<!-- mon modal client -->
		<div id="myModalClient" class="modal">
			<div class="modal-content">
				<span class="closeClient">&times;</span>
				<p>mes clients</p>
			</div>
		</div>
	</header>
	<!-- <script src="script.js"></script> -->
	<script src="script.js"></script>
</body>
</html>