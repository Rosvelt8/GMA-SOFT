<?php
require('../../models/database_connexion.php');
require('../../models/customer/customer.class.php');
if(isset($_POST['validate'])){
    if(!empty($_POST['userCniCode']) AND !empty($_POST['userName']) AND !empty($_POST['userPassword']) AND !empty($_POST['userPhoneNumber']) AND !empty($_POST['userPasswordReset']) AND !empty($_POST['userProfession']) AND !empty($_POST['userPlaceActivity'])){
            $userCniCode=htmlspecialchars($_POST['userCniCode']);
            $userName=htmlspecialchars($_POST['userName']);
            $userPassword=password_hash(htmlspecialchars($_POST['userPassword']), PASSWORD_DEFAULT);
            $resetPassword=password_hash(htmlspecialchars($_POST['userPasswordReset']), PASSWORD_DEFAULT);
            $userPhoneNumber= htmlspecialchars($_POST['userPhoneNumber']);
            $userProfession= htmlspecialchars($_POST['userProfession']);
            $userPlaceActivity= htmlspecialchars($_POST['userPlaceActivity']);
            $userStartDate= date('Y/m/d');
            $target= '../assets/img/customer/'. basename($_FILES['userProfile']['name']);
        $profilePicture= $_FILES['userProfile']['name'];

            if($_POST['userPassword']==$_POST['userPasswordReset']) {
                $user= new Customer();
                $verifyCni=$user->verifyIfUserCniCodeExist($userCniCode);
                if (!$verifyCni) {
                    $verifyPassword= $user->verifyIfPasswordAlreadyExist($userPassword);
                    if (!$verifyPassword) {
                        if (move_uploaded_file($_FILES['userProfile']['tmp_name'], $target)) {
                            $user->insertNewCustomer(  $profilePicture, $userName, $userCniCode, $userProfession,
                                $userPlaceActivity, $userPhoneNumber, $userStartDate, $userPassword);
                            header('location: login.php');
                        } else {
                            $errorMessage = "impossible de charger l'image veuillez en choisir une autre";
                        }
                    } else {
                        $errorMessage = "le mot de passe existe déja";
                    }
                } else {
                    $errorMessage = "le code cni que vous avez inscrit est déja registré";
                }
            }
            else{
                $errorMessage="veuillez saisir des mot de passe correctes";
            }
    }
    else{
        $errorMessage="Veuillez remplir tous les champs du formulaire";
    }
}