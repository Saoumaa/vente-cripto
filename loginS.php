 <?php
 session_start();
 
	   require('a2f.php'); // on require le fichier a2f.php
	   $a2f = new a2f(); // on crée une instance de la class a2f
	   // On va regarder si le formulaire a été envoyer et si le code n'est pas vide
	   if(isset($_POST['code']) AND !empty($_POST['code'])){
	      $a2f->checkcode($_POST['code'], function($a2f){
	         $insert = $a2f->db->prepare('UPDATE users SET a2f=:a2f WHERE email=:email');
	         $insert->execute(array('email' => $_SESSION['email'], 'a2f' => $a2f->secret()));
	         echo "Code Valide, l'A2F est activer sur votre compte!";
	      });
	   }
	?>
	<!DOCTYPE html>
	<html>
	<head>
	   <meta charset="utf-8">
	   <title>Activer l'A2F</title>
	</head>
	<body>
	   <form action="" method="POST" style="text-align: center;">
	      <p>Activer l'A2F</p>
	      <!-- On affiche le qrcode -->
	      <img src="<?= $a2f->qrcode(); ?>">
	      <br>
	      <input type="text" name="code" placeholder="Code..." autofocus="">
	      <input type="submit">
	   </form>
	</body>
	</html>