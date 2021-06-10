
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SamaJenn</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="css/all.css">
</head>
<body id="acceuil" class="panier-header">
	<nav class="myNav">
		<h1>MaBoutique</h1>
		<div class="menu">
			<a href="index.php#acceuil">Acceuil</a>
			<a href="index.php#produits">Nos produits</a>
			<a href="index.php#services">Services</a>
			<a href="index.php#contacts">contacts</a>
		</div>
		<span><a href="clientInscript.php">S'inscrire</a></span>
	</nav>
	<div class="row-header">
		<div class="col-header-back">
			<p>
				<a href="javascript:history.back()">
					<i class="fa fa-arrow-left" aria-hidden="true"></i>
					<em>retour au menu</em>
				</a>
			</p>
		</div>
		<div class="col-header-total">
			<p>
				<b>Taille</b>
				<span></span>
			</p>
		</div>
		<div class="col-header-taille">
			<p>
				<b>Totale</b>
				<span></span>
			</p>
		</div>
	</div>
	<div class="row-table">
        <div class="col-table">
            <table class="table-panier">
                <tr>
                    <th style="border-left: 1px solid #2B3433;">Mon plat</th>
                    <th>Nom</th>
                    <th>prix</th>
                    <th>taille</th>
                    <th>subtotale</th>
                    <th>suppr</th>
                </tr>
                <?php
                    $mesId = array_keys($_SESSION['panier']);
                    if(empty($mesId)){
                        $produits = array();
                        $panierEmpty = "Vous n'avez pas encore ajouté de produits à votre panier";
                        $linkPanierEmpty = "Veuillez commander ici";
                    }else{
                        $produits = $DB->query('SELECT * FROM produits WHERE id IN ('.implode(',',$mesId).')');
                        $panierValide = "Valider votre panier";
                    }
                ?>
                <?php foreach ($produits as $produit): ?>
                <tr>
                    <td class="td-img" style="border-left: 1px solid #2B3433;">
                    	<img src='images/<?= $produit->id;?>.jpg' alt='image1' style="width:100px; height:100px; border-radius: 10px;">
                    </td>
                    <td><span class="name"><?= $produit->name;?></span></td>
                    <td><span class="price"><?= number_format($produit->price, 2, ',', ' ');?></span></td>
                    <td><span class="quantity"><?= $_SESSION['panier'][$produit->id] ?></span></td>
                    <td><span class="subtotale"><?= number_format($produit->price * 1.17, 2, ',', ' ');?></span></td>
                    <td>
                    <span class="action">
                        <a class="del" href="panier.php?del=<?= $produit->id; ?>"><img src="images/trash.png" style="width: 40px;height: 40px;"></a>
                    </span>
                    </td>
                </tr>
               	<?php endforeach; ?>
            </table>
        </div>
        <?php 
        	if (isset($panierEmpty, $linkPanierEmpty)) {
        	?>
        	<div class="desc-panier-empty">
	        	<p>
	        		<?= $panierEmpty; ?>
	        	</p>
	        	<p>
	        		<a href="index.php#produits"><?= $linkPanierEmpty; ?></a>
	        	</p>
	        </div>
        	<?php
        	}
         ?>
         <?php 
        	if (isset($panierValide)) {
        	?>
        	<div class="desc-panier-empty">
	        	<p>
	        		<a href="ClientConnect.php"><?= $panierValide; ?></a>
	        	</p>
	        </div>
        	<?php
        	}
         ?>
    </div>
    <?php 
    	if (isset($_GET[''])) {
    		# code...
    	}
    ?>
	<footer>
		<p class="email">Email: fayem7409@gmail.com &copy; 2021 uvs</p>
		<p class="icon-social">
			<a href="#"><i class="fab fa-twitter"></i></a>
			<a href="#"><i class="fab fa-facebook"></i></a>
			<a href="#"><i class="fab fa-instagram"></i></a>
		</p>
		<span class="number">Contact: +00221785747666</span>
	</footer>
</body>
</html>