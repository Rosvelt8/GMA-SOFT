<?php
if(isset($_POST['validator'])){
    if(!empty($_POST['operationCategorie']) AND !empty($_POST['amountOperation']) AND !empty($_POST['paymentMode'])
    AND !empty($_POST['phoneNumber']) AND !empty($_POST['userPassword'])){
        $OperationCategorie=htmlspecialchars($_POST['operationCategorie']);
        $amountOperation=htmlspecialchars($_POST['amountOperation']);
        $paymentMode=htmlspecialchars($_POST['paymentMode']);
        $phoneNumber=htmlspecialchars($_POST['phoneNumber']);
        $password=htmlspecialchars($_POST['userPassword']);
        $passwordAccount=$_SESSION["motdepasse"];
        $idCustomer=$_SESSION['id'];
        $date= date('Y/m/d');
        if(password_verify($password, $passwordAccount)){
            $insertion=$userInformation->makeNewDeposit($idCustomer, $OperationCategorie, $amountOperation, $date,$paymentMode);
            header('location:index.php');
            if($insertion){
                $errorMessage="dépotb effectué avec succés";
            }else{
                $errorMessage= "désolé une erreur est survenu lors de l'envoie du formualaire";
            }
        }else{
            $errorMessage="entrez un mot de passe correcte";
        }

    }else{
        $errorMessage= "veuillez remplir tous les champs";
    }
}

