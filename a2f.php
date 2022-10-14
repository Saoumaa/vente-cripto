<?php

	   require('vendor/autoload.php'); // Permets de charger tous les librairies installées par composer
	   class a2f{
	      public $db; //Variable pour la base de données (en public car sinon on peut pas l'utiliser dans l'activation apres a vous de faire votre système!)
	      public function __construct(){
	         if(session_status() == PHP_SESSION_NONE){ // Si la session est pas allumé
	            session_start(); // Alors on va allumé
				

	         }
	         //Il va nous falloir une connexion a la base de données donc on va la crée
	         try {
	            // On va faire une variable pour configurer les informations de la base de données
	            $dbinfo = array('host' => 'localhost', 'dbname' => 'promaket', 'username' => 'root', 'password' => 'root');
	            // on set la variable $db et on créer la connexion a la base de données
	            $this->db = new PDO('mysql:host='.$dbinfo['host'].';dbname='.$dbinfo['dbname'].'', $dbinfo['username'], $dbinfo['password']);
	         } catch(PDOException $e) {
	            die('<h1>Impossible de se connecter à la Base de donnée</h1>');
	         }
	      }
	      // Voila maintenant on va créer les fonctions pour l'utiliser la librairies
		 
	      public function secret(){ // cette function va nous permettre de créer ou récupérer une clé secret
	         if(!isset($_SESSION['a2f'])){ // On vérifier si la personne n'a pas déjà une clé secret
	            $g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator(); // on créer une instance de la librairie
	            $_SESSION['a2f'] = $g->generateSecret(); // on set la variable de session et généré une clé secret
				
	         }
	         return $_SESSION['a2f']; // on retourne la variable de session pour pouvoir récupérer la clé
	      }
	      public function qrcode(){
			
	         $secret = $this->secret(); // On appelle la function secret pour récupérer une clé secret
	         //Username = pseudo/email de l'utilisateur, Secret = la clé secret, Site = Le nom de votre site/application(Pas d'espaces!)
	         $qrcodeinfo = array('username' => 'taom@gmail.com', 'secret' => $secret, 'site' => 'Promaket');
	         // On retourne et on créé le lien du qrcode
	         return \Sonata\GoogleAuthenticator\GoogleQrUrl::generate($qrcodeinfo['username'], $qrcodeinfo['secret'], $qrcodeinfo['site']);
	      }
	      //On va créer une function pour vérifier un code qui est taper par l'utilisateur
	      //Code = Le code tapé par l'utilisateur, Callback = la function qu'on veut quand le code est valide(Permets d'utiliser la même fonction pour Activer/désactiver ou pour la connexion d'un utilisateur)
	      public function checkcode($code, $callback){
	         if(!empty($code)){
	            $secret = $this->secret(); // On appelle la function secret pour récupérer une clé secret
	            $g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator(); // on créer une instance de la librairie
	            // On vérifier si le code est valide
	            if($g->checkCode($secret, $code)){
	               call_user_func($callback, $this);
	               return true;
	            } else {
	               return false; // Quand le code est invalide
	            }
	         } else {
	            die('code vide'); // Quand le code est vide
	         }
	      }
	   }
	?>