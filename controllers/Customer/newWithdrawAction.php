<?php
if(isset($_POST['validator'])){
    if(!empty($_POST['operationCategorie']) AND !empty($_POST['amountOperation']) AND !empty($_POST['paymentMode'])
        AND !empty($_POST['phoneNumber']) AND !empty($_POST['userPassword'])){
        $OperationCategorie=htmlspecialchars($_POST['operationCategorie']);
        $amountOperation=htmlspecialchars($_POST['amountOperation']);
        $withdrawalMode=htmlspecialchars($_POST['paymentMode']);
        $phoneNumber=htmlspecialchars($_POST['phoneNumber']);
        $password=htmlspecialchars($_POST['userPassword']);
        $passwordAccount=$_SESSION["motdepasse"];
        $idCustomer=$_SESSION['id'];
        $date= date('Y/m/d');
        if(password_verify($password, $passwordAccount)) {
            if ($amountOperation < $userInformation->getSoldecategorie($idCustomer, $OperationCategorie)) {
                if ($amountOperation < 16000) {
                    $wins = 500;
                } else {
                    $wins = ($amountOperation * 3) / 100;
                }
                $totalAmount = $wins + $amountOperation;
                if ($totalAmount <= $userInformation->getSoldecategorie($idCustomer, $OperationCategorie)) {
                    if ($userInformation->makeNewWithdrawal($idCustomer, $OperationCategorie, $amountOperation, $date, $withdrawalMode, $wins)) {
                        $errorMessage = "depot effectué avec succès veuillez confirmez en entrant votre code sur votre téléphone";
                        header('location: categoriePage.php');
                    } else {
                        $errorMessage = "une erreure est survenu lors de l'execution de votre retrait, veuillez ressayer oucontacter le service client";
                    }
                } else {
                    $errorMessage = "les frais de retrait n'ont pas pu etre deduit, veuillez entrer un montant inférieur" . $totalAmount;
                }
            } else {
                $errorMessage = "votre solde est insuffisant veuillez entrer un montant inférieur";
            }
        }else{
            $errorMessage="entrez un mot de passe correcte";
        }
    }else{
        $errorMessage= "veuillez remplir tous les champs";
    }
}