<?php require "class.php"; ?>
<?php require "header.php"; ?>	
<section class="mySection" id="produits">
	<h1>Nos Produits</h1>
	<div class="first-content">
	<?php $produits = $DB->query('SELECT * FROM produits'); ?>
	<?php foreach ($produits as $produit): ?>
		<div class="card">
			<div class="card-top">
				<img src="images/<?= $produit->id; ?>.jpg">
			</div>
			<div class="card-bottom">
				<span>
					<h1><?= $produit->name; ?></h1>
					<p><?= number_format($produit->price,2,',',' '); ?> Fcfa</p>
				</span>
				
				<span>
					<a class="addPanier" href="addpanier.php?id=<?= $produit->id; ?>">
						<!-- <img src="images/panierAchat1.png"> --><i class="fa fa-cart-plus"></i>
					</a>
				</span>
				
			</div>
		</div>
	<?php endforeach; ?>
	</div>
</section>

<!-- mon footer -->
<?php require "footer.php"; ?>