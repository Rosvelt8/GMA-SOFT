<?php
if (isset($_POST['modify'])){
    if(!empty($_POST['usercniCode']) AND !empty($_POST['userName']) AND !empty($_POST['userPassword']) AND !empty($_POST['userPhoneNumber']) AND !empty($_POST['userProfession']) AND !empty($_POST['userPlaceActivity'])){
        $name=$_POST['userName'];
        $password=$_POST['userPassword'];
        $cniCode=$_POST['usercniCode'];
        $profession=$_POST['userProfession'];
        $placeActivity=$_POST['userPlaceActivity'];
        $phoneNumber=$_POST['userPhoneNumber'];
        $target= '../assets/img/customer/'. basename($_FILES['userProfilePhoto']['name']);
        $profilePicture= $_FILES['userProfilePhoto']['name'];
        if (move_uploaded_file($_FILES['userProfilePhoto']['tmp_name'], $target)){
            if (isset($_GET['id'])){
                $editCustomer = $userInformation;
                $idCustomer= $_GET['id'];
                $editCustomer->editCustomer($profilePicture,$name, $cniCode, $profession,$placeActivity,$phoneNumber, $password, $idCustomer);
            }
        }
    }
}