<?php

$userInfos = $userInformation;
$idCustomer= $_GET['id'];
$user = $userInformation->showAllUserInformation($idCustomer);
