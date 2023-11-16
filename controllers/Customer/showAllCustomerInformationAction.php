<?php
session_start();
$userInformation= new user();
$id= 1;
$getInformation=$userInformation-> ShowAllInformation($_SESSION['id']);
if(!isset($_SESSION['auth'])){
    header('location: ../../views/customer/login.php');
}