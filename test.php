<?php 
include "sdk_mta/mta_sdk.php";
include 'sdk_mta/connect_mta.php';
include 'connect.php';
session_start();
$input = mta::getInput();
$_SESSION['DADOS'] = $input[0]
?>