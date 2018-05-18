<?php 
include 'sdk_mta/mta_sdk.php';
include 'connect.php';
$input = mta::getInput();
$LoginPlayer = $input[0];
$CreditsAdd = $input[1];
$dados_user = mysql_query("SELECT * FROM usuarios WHERE login = '$LoginPlayer'");
$dado_user_consulta = mysql_fetch_array($dados_user);

if(!empty($dado_user_consulta)){
	$id = $dado_user_consulta['id'];
	$creditsdb = $dado_user_consulta['credits'];
	$CreditsFinal = $creditsdb+$CreditsAdd;
	mysql_query("UPDATE usuarios SET credits = '$CreditsFinal' WHERE id = $id");
    mta::doReturn($LoginPlayer,"Sucesso",$CreditsFinal);
} else
{
	mta::doReturn($LoginPlayer,"Falha");
}





?>