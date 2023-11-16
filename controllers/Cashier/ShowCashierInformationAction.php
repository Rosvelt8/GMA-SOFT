<?php
require('../../models/database_connexion.php');
require('../../models/Cashier/cashier.class.php');
    session_start();
    $userInformation= new Cashier();
    $getInformation=$userInformation-> ShowAllInformation($_SESSION['id']);

    if(!isset($_SESSION['auth'])){
        header('location: ../../views/customer/login.php');
    }