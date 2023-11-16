<?php
session_start();
$_SESSION = [];
session_destroy();
header('location: ../../views/Customer/login.php');