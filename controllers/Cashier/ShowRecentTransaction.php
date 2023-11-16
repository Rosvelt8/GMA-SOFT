<?php
$collectorInformation= new Cashier();
$collectorTransaction=$collectorInformation->ShowRecentsTransaction($_SESSION['id']);
