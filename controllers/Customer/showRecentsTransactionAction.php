<?php
$id= $_SESSION['id'];
$getDepositTransactions=$userInformation->showUserDepositInformation($id);
$getWithdrawalTransactions=$userInformation->showUserWithdrawInformation($id);
