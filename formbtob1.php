<?php
require "bat/phpmailer/PHPMailerAutoload.php";
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=promaket;','root','root');
if(isset($_POST['valider'])){
    if(!empty($_POST['email'])){
        $cle = rand(100000, 9000000);
        $email = $_POST['email'];
       
        $nam = $_POST['soci'];
        $surface = $_POST['surface'];
        $ceo = $_POST['ceo'];
        $numero =  $_POST['numero'];

       

        


        $insereUser = $bdd->prepare('INSERT INTO users(email, code ,confirme,pass)values(? , ? ,?,?)');
        $insereUser->execute(array($email, $cle , 0,NULL));
       
        $recupUser = $bdd->prepare('SELECT  * FROM users where email = ?');
        $recupUser->execute(array($email));
        if($recupUser->rowCount() > 0){
            $userInfos = $recupUser->fetch();
            $_SESSION['id'] = $userInfos['id'];

            $btobInser = $bdd->prepare('INSERT INTO btob( society_name, society_size, ceo, email, mobile_phone, shop_quantity, zip_adress, city, office_phone, society_card, society_bill, society_bill_amount, users_id )values(? , ? ,?, ? ,? ,? ,? ,? ,? ,? ,? ,? ,?)'); 
        
            $btobInser ->execute(array($nam,$surface,$ceo,$email,$numero, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $_SESSION['id']));


            

            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'taom360@gmail.com';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->Password = 'momodecypherde67471182';

            $mail->setFrom('taom360@gmail.com');
            $mail->addAddress($email);
            $mail->addReplyTo('infoto');
            $mail->isHTML(true);


            $mail->Subject = 'Email de confirmation  ';

            $mail->Body = 'http://localhost:80/promarket/verif.php?id='.$_SESSION['id'].'&code='.$cle;

        if(!$mail->send()){
            echo 'message not send ';
            echo 'mailer error' . $mail->ErrorInfo;
            } else {
                echo 'message sent';
            }

        }


        


    }else{
        echo "veuillez entre votre mail svp ";
    }
}




?>




<!DOCTYPE html>
<html class="wide wow-animation" lang="fr">
  <head>
    <!-- Site Title-->
    <title>Pr??inscription-Promarket.management</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/promarket.ico" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:400,700%7CExo+2:100,300,500,700,100italic,300italic%7CMontserrat:400,700">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="preloader">
      <div class="preloader-body">
        <div class="preloader-item">
          <div class="diamond"></div>
          <div class="diamond"></div>
          <div class="diamond"></div>
        </div>
      </div>
    </div>
    <div class="page">
      <!-- Page Header-->
      <header class="section page-header" id="home">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="40px" data-xl-stick-up-offset="40px" data-xxl-stick-up-offset="40px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-main">
              <!-- RD Navbar Panel-->
              <div class="rd-navbar-panel">
                <!-- RD Navbar Toggle-->
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-outer"><span></span></button>
                <!-- RD Navbar Brand-->
                <div class="rd-navbar-brand">
                    <img src="images/logopromarket.png" alt="">
                </div>
              </div>
              <div class="rd-navbar-nav-outer">
                <!-- RD Navbar Nav-->
                <ul class="rd-navbar-nav">
                  <li class="rd-nav-item"><a class="rd-nav-link" href="index.html">Accueil</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="garantie.html">Garantie intres??que</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="#secteurs.html">Secteurs d???activit??s autofinanc??s</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="#team">Partenaires</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="login.html">Connexion</a>
                  </li>
                </ul>
              </div>

             
              <div class="btc-to-usd">
                <p class="btc-to-usd__title">PKT</p>
                <div class="btc-price">
                  <!--<div class="btcwdgt-price" data-bw-theme="light"></div>-->
                  <span style="font-weight: bold; font-size: 1em;">
                    4480 ???
                  </span>
                </div>
              </div>
            
            </div>
            
          </nav>
        </div>
      </header>
        <!--form-->
        <form class="form-simple" id="form" method="POST" action="">
            <h2 class="form-title">
                Formulaire de pr??-inscription Btob
              </h2>
                <label for="society-name"  class="society-name"> Enseigne:
                    <input type="text" name="soci">
                </label> <br>
            
                <label  class="number"> Surface: 
                    <input type="number" name="surface" class="society-size" >
                    <span>m2</span>
                </label> <br>
            
                <label for="" class="ceo"> Dirigeant:
                    <input type="text" name="ceo">
                </label>  <br>
            
                <label for="email" class="email"> Email:
                    <input type="email" name="email">
                </label> <br>
            
                <label for="numero" class="numero"> Num??ro:
                    <input type="number" name="numero">
                </label> <br>
            
                <input type="submit" name="valider">
        </form>

      <!-- Page Footer-->
      <footer class="section footer-classic context-dark">
        <div class="container">
          <div class="footer-classic__main">
            <div class="row row-50">
              <div class="col-lg-6">
                <div class="unit unit-spacing-sm flex-column flex-sm-row align-items-sm-center">
                  <div class="unit-left">
                    <a class="brand" href="index.html">
                      <img class="brand-logo-light" src="images/logo-inverse-105x38.png" alt="" 
                      width="105" height="38" srcset="images/logopromarket-removedbg.png"/></a>
                  </div>
                  <div class="unit-body">
                    <p><span style="max-width: 380px;">Promarket SAS, l'??conomie vue par les consommateurs</span></p>
                  </div>
                </div>
                <div class="group group-lg group-middle">
                  <p class="large">Notre communaut??</p>
                  <div class="group-item">
                    <ul class="list-inline list-inline-sm">
                      <li><a class="icon icon-lg link-default mdi mdi-facebook" href="#"></a></li>
                      <li><a class="icon icon-lg link-default mdi mdi-twitter" href="#"></a></li>
                      <li><a class="icon icon-lg link-default mdi mdi-youtube-play" href="#"></a></li>
                      <li><a class="icon icon-lg link-default mdi mdi-instagram" href="#"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="box-inset-3">
                  <h4>Inscrivez vous ?? a newsletter</h4>
                  <!-- RD Mailform-->
                  <form class="form form-lg form_light rd-mailform form-inline" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="bat/rd-mailform.php">
                    <div class="form-wrap">
                      <input class="form-input" id="footer-subscribe-form-email" type="email" name="email" data-constraints="@Email @Required">
                      <label class="form-label" for="footer-subscribe-form-email">Entrez votre email</label>
                    </div>
                    <div class="form-button">
                      <button class="button button-color-2" type="submit">Envoyer</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="footer-classic__aside">
            <div class="list-wrap">
              <ul class="list-nav">
                <li><a href="cgv.html">CGV</a></li>
                <li><a href="rgpd.html">RGPD</a></li>
                <li><a href="livreblanc.html">Livre Blanc</a></li>
                <li><a href="faq.html">FAQ</a></li>
              </ul>
            </div>
            <div class="list-wrap">
              <ul class="list-bordered">
                <li>
                  <!-- Rights-->
                  <p class="rights"><span>&copy;&nbsp;</span><span 
                    class="copyright-year"></span><span>&nbsp;</span>
                    <span>Promarket</span><span>.&nbsp;</span><a href="#"></a></p>
                </li>
                <li><a href="mailto:#">contact@promarket.management</a></li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
    
    <script src="js/core.min.js"> </script>
    <script src="js/script.js"></script>
    <script src="https://widgets.bitcoin.com/widget.js"></script>
    <!-- coded by Himic-->
  </body>
</html>