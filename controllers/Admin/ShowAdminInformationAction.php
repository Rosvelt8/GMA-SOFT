<?php
require('../../models/database_connexion.php');
require('../../models/Admin/admin.class.php');
session_start();
$userInformation= new Admin();
$id= 1;
$getInformation=$userInformation-> ShowAllInformation($_SESSION['id']);
if(!isset($_SESSION['auth'])){
    header('location: ../../views/customer/login.php');
}
