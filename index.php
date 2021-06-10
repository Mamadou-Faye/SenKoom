<?php require "class.php"; ?>
<!-- Mon header -->
<?php require "header.php"; ?>

<!-- ma section des articles -->
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
					<p>desciption</p>
				</span>
				
				<span>
					<a class="addPanier" href="#">
						<!-- <img src="images/panierAchat1.png"> --><i class="fa fa-cart-plus"></i>
					</a>
				</span>
				
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</section>

<!-- Mon footer -->
<?php require "footer.php"; ?>
