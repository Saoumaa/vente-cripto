<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=promaket;','root','root');
if(isset($_GET['id']) AND !empty($_GET['id']) AND isset($_GET['code']) AND !empty($_GET['code'])){
  
    $getid = $_GET['id'];
    $getcode = $_GET['code'];

    $recupUsser = $bdd->prepare('SELECT * FROM users WHERE  id = ? AND code = ?' );
    $recupUsser->execute(array($getid, $getcode));
    if($recupUsser->rowCount() > 0){
      $userInfo = $recupUsser->fetch();
        if($userInfo['confirme'] != 1){
            $updateconfirme = $bdd->prepare('UPDATE users set confirme = ? where id = ?');
            $updateconfirme->execute(array(1,$getid));
            $_SESSION['code'] = $getcode;
            header('location: formbtob2.html');

        }else{
            $_SESSION['code'] = $getcode;
            header('location: formbtob2.html');
        }
        header('location: formbtob2.html');
    

  }else{
    echo "Votre clé ou identifiant est incorrect";
  }
}else{
    echo" Aucun utilisateur trouvé";
}
  ?>
