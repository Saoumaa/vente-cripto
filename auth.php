<?php
declare(strict_types=1);
	   require('vendor/autoload.php'); // Permets de charger tous les librairies installées par composer
$secret = 'DRE45FGTJT56FGHTYY';
$link = \Sonata\GoogleAuthenticator\GoogleQrUrl::generate('empireoba',
 $secret,'promaket');

    $g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();

    if(isset($_POST['submit'])){
        
        
        
        $code = $_POST['code'];
        if($g->checkCode($secret, $code)){

            header("location:client.html");
            echo "yes \n";
        }else{
            echo "no \n";
        }

    }


       ?>





<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Title Page</title>

        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <h1 class="text-center">Hello World</h1>
        <center> <img src="<?=$link?>" >  </center>

        
        <form action="" method="POST" role="form">
            <legend>Form title</legend>
        
            <div class="form-group">
                <label for="">code</label>
                <input type="text" class="form-control" id="" name="code" placeholder="Input field">
               
            </div>
        
            
        
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
