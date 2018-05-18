<?php
$Host = "localhost";
$User = "b2roxhos_usersb2";
$Pass = "2031b22";


$link = mysql_connect($Host,$User,$Pass);
mysql_select_db("b2roxhos_usersb23");
if (!$link) {
	die('Não foi possivel connectar ' . mysql_error());
}
?>