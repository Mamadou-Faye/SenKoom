<!-- Mes services -->
	<section class="myServices" id="services">
		<div class="description">
			<h1>Nos Services</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud.</p>
		</div>
		<div class="content-service">
			<div class="propos-me">
				<img src="images/faye1.jpg" alt="faye">
				<h1>Mamadou Faye</h1>
				<p>
					<a href="#"><i class="fab fa-twitter"></i></a>
					<a href="#"><i class="fab fa-facebook"></i></a>
					<a href="#"><i class="fab fa-instagram"></i></a>
				</p>
			</div>
			<div class="livraison">
				<img src="images/velo1.jpg" alt="velo">
				<h1>livraison gratuite</h1>
				<p>description</p>
			</div>
			<div class="paiement">
				<img src="images/liv3.jpg" alt="carte">
				<h1>Paiement en ligne</h1>
				<p>description</p>
			</div>
		</div>
	</section>

	<!-- Ma partie contacts -->
	<section class="contact" id="contacts">
		<h1>Contactez Nous</h1>
		<form class="form-contact" action="contact.php" method="post">
			<p>
				<input type="text" name="login" placeholder="Votre nom">
			</p>
			<p>
				<input type="email" name="email" placeholder="Votre email">
			</p>
			<p>
				<input type="text" name="telephone" placeholder="Votre numéro">
			</p>
			<p>
				<textarea name="message" placeholder="Votre message"></textarea>
			</p>
			<span><input type="submit" name="btnSubmit" value="Envoyer"></span>
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
	<!-- Mon footer -->
	<footer>
		<p class="email">Email: fayem7409@gmail.com &copy; 2021 uvs</p>
		<p class="icon-social">
			<a href="#"><i class="fab fa-twitter"></i></a>
			<a href="#"><i class="fab fa-facebook"></i></a>
			<a href="#"><i class="fab fa-instagram"></i></a>
		</p>
		<span class="number">Condition d'utilisation du site</span>
	</footer>
	<script src="jquery/jquery-3.3.1.min.js"></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->
	<script type="text/javascript" src="jquery/app.js"></script>
</body>
</html>