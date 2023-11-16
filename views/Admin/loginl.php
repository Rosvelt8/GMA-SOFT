<?php require('../controllers/userConnected.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300&family=Lobster&family=Pacifico&family=Poppins:wght@100&family=Roboto:wght@100&family=Supermercado+One&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<style>
    body{margin: 0;padding: 0;}
    .backdrop{width: 100%;height: 100vh;padding-top: 50px;background-color: rgba(22, 22, 22, 0.867);}
    .login-box{width: 70%;height: 500px;padding: 0;margin: 0 auto;}
    .left{width: 60%;height: 500px;background: url('assets/img/landing2.jpg');background-size: cover; float: left;}
    .right{width: 40%;height: 500px;float: left;background: rgba(26, 63, 4, 0.801);padding: 20px; padding-top: 50px;color: white;}
    .right h6{font-size: 15px;}

    .right input[type="text"],input[type="password"]{
        background: none;
        border: none;
        border-radius: 0;
        border-bottom: 1px solid white;
        margin-bottom: 30px;
        color: white;
        padding-left: 0;
    }
    .right input[type="submit"]{
        padding: 10px 10px;
        font-size: 22px;
        font-family: "Roboto";
        margin-left: 25%;
    }
    .right input[type="submit"]:hover{
        background-color: #fff;
        color: rgba(26, 63, 4, 0.801);
    }
    .right input::placeholder{font-size: 11px;color: white;}
    .right a{font-size: 11px;}
</style>
<body>
<div class="backdrop">
    <div class="login-box">
        <div class="left">

        </div>
        <div class="right">
            <h4 class="text-center">GMA</h4>
            <h6 class="text-center">Bienvenue s'il vous plait entrez vos identifiants</h6>
            <br>
            <p class="errors"></p>
            <br>
            <form method="post">
                <div class="form-group col-md-12">
                    <input type="text" class="form-control" name="userName" placeholder="Votre nom">
                </div>
                <div class="form-group col-md-12">
                    <input type="password" class="form-control" name="userPassword" placeholder="Mot de passe">
                </div>
                <div class="form-group col-md-12">
                    <p class="check"><input type="checkbox"> Se rappeler de moi</p>
                </div>
                <div class="form-group col-md-12">
                    <input type="submit" class="btn btn-success"  name="validate" value="Se connecter">
                </div>
                <div class="form-group col-md-12 text-center">
                    <a>Mot de passe oublié?</a>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="assets/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
