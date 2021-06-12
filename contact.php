<?php 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=monpoisson;charset=utf8', 'root', '');

if (isset($_POST['btnSubmit'])) {
	$login = htmlspecialchars($_POST['login']);
	$email = htmlspecialchars($_POST['email']);
	$telephone = htmlspecialchars($_POST['telephone']);
	$message = htmlspecialchars($_POST['message']);
	if (!empty($login) AND !empty($email) AND !empty($telephone) AND !empty($message)) {
		$loginlength = strlen($login);
		if ($loginlength < 20) {
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$insertContact = $bdd->prepare('INSERT INTO contact (nameC, emailC, numC, message) VALUES (?,?,?,?)');
				$insertContact->execute(array($login, $email, $telephone, $message));
				header('location:index.php?msg=Votre message a été envoyé avec succès !');
			}else{
				header('location:index.php?erreur=Votre email n\'est pas valide');
			}
		}else{
			header('location:index.php?erreur=Votre nom d\'utilisateur ne doit pas dépasser 20 caractères');
		}
	}else{
		header('location:index.php?erreur=Tous les champs doivent être remplis !');
	}
}

?>