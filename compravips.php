<?php 
$msg = "";
session_start();
if(empty($_SESSION['LOGIN'])){
   header('Location:index.php');
}
include 'connect.php';
include 'sdk_mta/mta_sdk.php';
include 'sdk_mta/connect_mta2.php';
$LoginPlayer = $_SESSION['LOGIN'];
if(isset($_POST['Combobox1']))
{
	$Vip = $_POST['Combobox1'];
	 if($Vip == "VIP1")
	 {
	 	$Vip_Valor = 15000;
	 	$Vip_Name = "vip1";
	 }
	 elseif($Vip == "VIP2")
	 {
        $Vip_Valor = 20000;
        $Vip_Name = "vip2";
	 }
	 elseif($Vip == "VIP3")
	 {
	 	$Vip_Valor = 30000;
	 	$Vip_Name = "vip3";
	 }

	if(!empty($_POST['Editbox1']))
	{
		$LoginAccount = $_POST['Editbox1'];
		$dados_user = mysql_query("SELECT * FROM usuarios WHERE login = '$LoginPlayer'");
        $dado_user_consulta = mysql_fetch_array($dados_user);
        if($dado_user_consulta['credits'] >= $Vip_Valor){
            $msg = "COMPRA DO " .$Vip_Name . " FEITA COM SUCESSO";
            $valorfinal = $dado_user_consulta['credits']-$Vip_Valor;
            $iduser = $dado_user_consulta['id'];
            mysql_query("UPDATE usuarios SET credits = $valorfinal WHERE id = $iduser");
            $returns[] = $resource->call ( "Server_ADDVIP",$Vip_Name,$LoginAccount);
            $date_dai = date("d");
            $date_mes = date("m");
            $date_ano = date("Y");
            $resultado = $date_mes+1;
            $Test = strlen($resultado);
            if($Test < 2){
	        $date_mes = "0" . $resultado;
	        $formatdata = $date_dai."/".$date_mes."/".$date_ano;
            }
            else
            {
            $formatdata = $date_dai."/".$resultado."/".$date_ano;
            }
            $mysql_insert = mysql_query("INSERT INTO vip_user (loginVip,Vencimento,id_user) VALUES ('$LoginAccount','$formatdata','$iduser')");
        }
        else { $msg = "Creditos Insuficientes"; }


	}
	else {$msg = "Login Invalido";}
}









?>






<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Page</title>
<meta name="generator" content="WYSIWYG Web Builder 11 - http://www.wysiwygwebbuilder.com">
<link href="b2.css" rel="stylesheet">
<link href="compravips.css" rel="stylesheet">
</head>
<body>
<div id="space"><br></div>
<div id="container">
<div id="wb_Form1" style="position:absolute;left:15px;top:23px;width:444px;height:230px;z-index:5;">
<form name="Form1" method="post" action="compravips.php">
<select name="Combobox1" size="1" id="Combobox1" style="position:absolute;left:34px;top:28px;width:355px;height:28px;z-index:0;">
<option value="VIP1">VIP 1 [15,000]</option>
<option value="VIP2">VIP 2 [20,000]</option>
</select>
<input type="submit" id="Button1" name="" value="COMPRAR" style="position:absolute;left:34px;top:117px;width:355px;height:25px;z-index:1;">
<div id="wb_Text1" style="position:absolute;left:34px;top:153px;width:354px;height:16px;z-index:2;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong><?php echo $msg; ?></strong></span></div>
<div id="wb_Text2" style="position:absolute;left:42px;top:185px;width:250px;height:16px;z-index:3;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong><a href="./vipinfos.php">INFORMAÇOES DOS VIPS</a></strong></span></div>
<input type="text" id="Editbox1" style="position:absolute;left:34px;top:71px;width:345px;height:18px;line-height:18px;z-index:4;" name="Editbox1" value="" placeholder="LOGIN CONTA VIP">
</form>
</div>
</div>
</body>
</html>