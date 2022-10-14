<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=promaket;','root','root');
if(isset($_POST['valider'])){
   
       
        $shop = $_POST['shopqty'];
        $adre = $_POST['adres'];
        $city = $_POST['cit'];
        $codepost =  $_POST['post'];
        $tel = $_POST['tel'];
        $fil = $_POST['fil'];
        $sofil = $_POST['sofil'];
        $sofim = $_POST['filmount'];
        $mpd = $_POST['mdp'] ;
        $mpd1 = $_POST['pwd2']; 

        if($mpd == $mpd1){
          $pwd = password_hash($mpd , PASSWORD_DEFAULT); // hashage du mots de passe recuperé avec la methode hash de php 

          $updateusers =  $bdd->prepare('UPDATE users set pass = ? where id = ?');
          $updateusers->execute(array($pwd,$_SESSION['id']));

          $updatebtob = $bdd->prepare('UPDATE btob set shop_quantity = ? , zip_adress = ? ,  city = ? , office_phone = ? , society_card = ? , society_bill = ? , society_bill_amount = ? where users_id =  ?');
        $updatebtob->execute(array($shop,$adre,$city,$codepost,$tel,$fil,$sofim,$_SESSION['id']));

        }else{


            echo "les mots de passe ne sont pas identique ";
        }






        



}
        
        
        ?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="fr">
  <head>
    <!-- Site Title-->
    <title>Préinscription-Promarket.management</title>
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
                  <li class="rd-nav-item"><a class="rd-nav-link" href="garantie.html">Garantie intresèque</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="secteurs.html">Secteurs d’activités autofinancés</a>
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
                    4480 €
                  </span>
                </div>
              </div>
            
            </div>
            
          </nav>
        </div>
      </header>
        <!--form-->
        <form class="form-simple btoc-form" id="form" method="POST" action="" >
            <h2 class="form-title">
                Formulaire d'inscription Btob
              </h2> <br>
            
                <label for="shop-qty" class="shop-quantity"></label> Nombre de magasins:
                    <input type="number" name="shopqty">
                </label> <br>
            
                <label  class="zip-adress"> Adresse postale principale:
                    <input type="text" name="adres">
                </label> <br>
            
                <label for="city" class="city"> Ville:
                    <input type="text" name="cit">
                </label> <br>
            
                <label for="numero" class="numero"> Code postal:
                    <input type="number" name="post">
                </label> <br>

                <label for="office_phone" class="numero"> Téléphone fixe:
                  <input type="number" name="tel">
              </label> <br>

              <label for="society-card"> Justificatif d'identité: (Kbis/Photo façade de )
                <input type="file" name="fil">
              </label> <br>

              <label for="society-bill"> Copie de la facture:
                <input type="file" name="sofil">
              </label> <br>

              <label for="society_bill-amount"> Montant de la facture:
                <input type="number" name="filmount">
              </label> <br>


              <label for="society-bill"> MOTS DE PASSE:
                <input type="password" name="mdp">
              </label> <br>

              <label for="society_bill-amount"> CONFRIMATION:
                <input type="password" name="pwd2">
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
                    <p><span style="max-width: 380px;">Promarket SAS, l'économie vue par les consommateurs</span></p>
                  </div>
                </div>
                <div class="group group-lg group-middle">
                  <p class="large">Notre communauté</p>
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
                  <h4>Inscrivez vous à a newsletter</h4>
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