<?php

require('../../models/database_connexion.php');
require('../../models/Customer/customer.class.php');
require('../../models/Admin/admin.class.php');
if(isset($_POST['validate'])){
    if(!empty($_POST['userName']) AND !empty($_POST['userPassword'])) {
            $user = new Admin();
            $name = htmlspecialchars($_POST['userName']);
            $password = htmlspecialchars($_POST['userPassword']);
            if($user->Connection($name, $password)){
                header('location: ../../views/Admin/index.php');
            } else {
                $user = new Customer();
                if($user->Connection($name, $password)){
                    header('location: ../../views/Customer/index.php');
                    $error = $user->getErrorMessage();
                }
            }
    }
}


