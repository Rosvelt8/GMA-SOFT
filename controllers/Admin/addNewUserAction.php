<?php
if(isset($_POST['validate'])){
    if(!empty($_POST['usercniCode']) AND !empty($_POST['userName']) AND !empty($_POST['userPassword']) AND !empty($_POST['userPhoneNumber']) AND !empty($_POST['userProfession']) AND !empty($_POST['userPlaceActivity'])){
        $name=$_POST['userName'];
        $password=$_POST['userPassword'];
        $cniCode=$_POST['usercniCode'];
        $profession=$_POST['userProfession'];
        $placeActivity=$_POST['userPlaceActivity'];
        $phoneNumber=$_POST['userPhoneNumber'];
        $startDate= date('Y/m/d');
        $target= '../assets/img/customer/'. basename($_FILES['userProfilePhoto']['name']);
        $profilePicture= $_FILES['userProfilePhoto']['name'];
        if (move_uploaded_file($_FILES['userProfilePhoto']['tmp_name'], $target)){
            $user= $userInformation;
            $user->insertNewCustomer($profilePicture,$name, $cniCode, $profession,$placeActivity,$phoneNumber,$startDate, $password);
        }
    }
}