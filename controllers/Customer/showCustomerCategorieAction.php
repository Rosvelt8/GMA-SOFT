<?php
$categorieNameAlimentaire= "alimentaire";
$idCustomer= $_SESSION['id'];
$categorieNameAssurance= "assurance";
$categorieNameEpargne= "epargne";
//---------------information compte alimentaire---------------------------------------


        $categorieAlimentaireInformation= $userInformation->showCustomerCategorie($categorieNameAlimentaire, $idCustomer);
        $categorieAlimentaireSumWithdrawalInformation= $userInformation->showCustomerWithdrawalByCategorie($categorieNameAlimentaire, $idCustomer);
        $categorieAlimentaireSumDepositInformation= $userInformation->showCustomerPAymentByCategorie($categorieNameAlimentaire, $idCustomer);
//---------------information compte assurance--------------------------------------------


        $categorieAssuranceInformation= $userInformation->showCustomerCategorie($categorieNameAssurance, $idCustomer);
        $categorieAssuranceSumWithdrawalInformation= $userInformation->showCustomerWithdrawalByCategorie($categorieNameAssurance, $idCustomer);
        $categorieAssuranceSumDepositInformation= $userInformation->showCustomerPAymentByCategorie($categorieNameAssurance, $idCustomer);
//------------------information compte epargne---------------------------------------------


        $categorieEpargneInformation= $userInformation->showCustomerCategorie($categorieNameEpargne, $idCustomer);
        $categorieEpargneSumWithdrawalInformation= $userInformation->showCustomerWithdrawalByCategorie($categorieNameEpargne, $idCustomer);
        $categorieEpargneSumDepositInformation= $userInformation->showCustomerPAymentByCategorie($categorieNameEpargne, $idCustomer);
