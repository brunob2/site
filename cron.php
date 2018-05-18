<?php 
include 'connect.php';
include 'sdk_mta/mta_sdk.php';
include 'sdk_mta/connect_mta.php';
$date = date("d/m/Y");
$dados_data = mysql_query("SELECT * FROM vip_user");

while($row = mysql_fetch_array($dados_data))
{
	$data_vencida = $row['Vencimento'];
	echo $data_vencida . "<br>";
	echo $date;

	if($date > $data_vencida ){
		echo "venceu";
	}
}












?>