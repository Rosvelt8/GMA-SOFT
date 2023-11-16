<?php
require('../../models/database_connexion.php');
require('../../models/Customer/customer.class.php');
session_start();
$userInformation= new Customer();
$id= 1;
$getInformation=$userInformation-> ShowAllInformation($_SESSION['id']);
if(!isset($_SESSION['auth'])){
    header('location: ../../views/customer/login.php');
}