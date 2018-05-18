<?php 
include 'connect.php';
include 'sdk_mta/mta_sdk.php';
include 'sdk_mta/connect_mta.php';
$dados_data = mysql_query("SELECT * FROM vip_user");
$date_dai = date("d");
$date_mes = date("m");
$date_ano = date("Y");
$date2 = "07/01/2017";
$resultado = $date_mes+7;
$Test = strlen($resultado);
if($Test < 2){
	$date_mes = "0" . $resultado;
	//echo $date_mes;
}
else
{
//echo $resultado;
}













?>