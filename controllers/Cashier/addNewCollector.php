<?php

if(isset($_POST['validate'])){
    if(!empty($_POST['userProfile']) AND !empty($_POST['userCni']) AND !empty($_POST['userPseudo']) AND !empty($_POST['userName']) AND !empty($_POST['userPassword']) AND !empty($_POST['userPhoneNumber'])){
        $profilePicture= $_POST['userProfile'];
        $pseudo=$_POST['userPseudo'];
        $name=$_POST['userName'];
        $office= $_SESSION['bureau'];
        $password=$_POST['userPassword'];
        $cniCode=$_POST['userCni'];
        $phoneNumber=$_POST['userPhoneNumber'];
        $idCashier= $_SESSION['id'];
        $statut="collecteur";
        $deliveryDate= date('Y-m-d');
        $startDate= date('Y-m-d');
        $user= new Cashier();
        $user->insertNewCollector($profilePicture,$pseudo,$office,$name, $password, $cniCode,$deliveryDate,$startDate, $statut, $phoneNumber, $idCashier );

        header('location: login.php');
    }
}



