<?php 
include 'sdk_mta/mta_sdk.php';
include 'connect.php';
$input = mta::getInput();
$Nick = $input[0];
mysql_query("DELETE FROM ranktop10 ");


?>