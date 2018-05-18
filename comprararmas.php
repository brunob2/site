<?php 
$msg = "";
session_start();
if(empty($_SESSION['LOGIN'])){
   header('Location:index.php');
}
include 'connect.php';
include 'sdk_mta/mta_sdk.php';
include 'sdk_mta/connect_mta.php';
$user = $_SESSION['LOGIN'];
if(isset($_POST['Combobox1']))
{ 
	$ArmaName = $_POST['Combobox1'];
	$dados_armas = mysql_query("SELECT * FROM armas_venda WHERE arma = '$ArmaName'");
	$dados_resultado_arma = mysql_fetch_array($dados_armas);
	// -----
	$PentName = $dados_resultado_arma['pente_name'];
	$ArmaName = $dados_resultado_arma['arma'];
	$QuantidadePente = $dados_resultado_arma['quantidade_pente'];
	$Valor = $dados_resultado_arma['valor'];
	// -----
	$dados_user = mysql_query("SELECT * FROM usuarios WHERE login = '$user'");
	$dados_resultado_user = mysql_fetch_array($dados_user);
	$Credits = $dados_resultado_user['credits'];
	$LoginUser = $dados_resultado_user['login'];
	$iduser = $dados_resultado_user['id'];
	// -----
	if($Credits >= $Valor)
	{
		$msg = "Comprar feita com sucesso";
		$valorfinal = $Credits-$Valor;
		mysql_query("UPDATE usuarios SET credits = $valorfinal WHERE id = $iduser");
		$_SESSION['CREDITS'] = $valorfinal;
	    $returns[] = $resource->call ( "BuyWeapons",$user,$PentName,$ArmaName,$QuantidadePente);
	}
	else { $msg = "CREDITOS INSUFICIENTES PARA COMPRAR " . $ArmaName; }

}







?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Page</title>
<meta name="generator" content="WYSIWYG Web Builder 11 - http://www.wysiwygwebbuilder.com">
<link href="b2.css" rel="stylesheet">
<link href="comprararmas.css" rel="stylesheet">
</head>
<body>
<div id="space"><br></div>
<div id="container">
<div id="wb_Form1" style="position:absolute;left:15px;top:23px;width:444px;height:230px;z-index:3;">
<form name="Form1" method="post" action="comprararmas.php">
<select name="Combobox1" size="1" id="Combobox1" style="position:absolute;left:34px;top:28px;width:355px;height:28px;z-index:0;">
<?php 
$Consulta = mysql_query('SELECT * FROM armas_venda');
while($row = mysql_fetch_array($Consulta)){
$value = $row['arma'];
?>

<option value='<?php echo $value;?>'><?php  echo $row['arma'] . " |&nbspPENTES[" .$row['quantidade_pente'] . "] VALOR = " .$row['valor'] ?></option>
<?php


}
?>
</select>
<input type="submit" id="Button1" name="" value="COMPRAR" style="position:absolute;left:34px;top:85px;width:355px;height:25px;z-index:1;">
<div id="wb_Text1" style="position:absolute;left:35px;top:126px;width:354px;height:16px;z-index:2;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong><?php  echo $msg; ?></strong></span></div>
</form>
</div>
</div>
</body>
</html>