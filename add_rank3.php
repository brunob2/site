<?php 
include 'sdk_mta/mta_sdk.php';
include 'connect.php';
$input = mta::getInput();
$Nick = $input[0];
$Exp = $input[1];
$Kill = $input[2];
//mysql_query("DELETE FROM ranktop10 ");
$mysql_insert = mysql_query("INSERT INTO ranktop10 (Nick,Exp,Kill_player) VALUES ('$Nick','$Exp','$Kill')");


?>