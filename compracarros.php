<?php 
$msg = "";
session_start();
if(empty($_SESSION['LOGIN'])){
   header('Location:index.php');
}
include 'connect.php';
include 'sdk_mta/mta_sdk.php';
include 'sdk_mta/connect_mta.php';
if(isset($_POST['Combobox1'])){
$dinheiro_user = $_SESSION['LOGIN'];
$dados = mysql_query('SELECT * FROM carro_venda');
while($coluna = mysql_fetch_array($dados)){

$dados_user = mysql_query("SELECT * FROM usuarios WHERE login = '$dinheiro_user'");
$dado_user_consulta = mysql_fetch_array($dados_user);

	if($_POST['Combobox1'] == $coluna['id_carro']){
		if($dado_user_consulta['credits'] >= $coluna['valor'])
		{      $idcarro_indentificador = rand(1,9999);
			   $valorfinal = $dado_user_consulta['credits']-$coluna['valor'];
			   $iduser = $dado_user_consulta['id'];
               $msg = "COMPRA REALIZADA COM SUCESSO";
               $returns[] = $resource->call ( "CreateVehicle",$coluna['id_carro'],$dinheiro_user,$coluna['motor'],$coluna['rodoa'],$coluna['parts'],$coluna['gasolina'],$coluna['slots'],$coluna['rotor'],$idcarro_indentificador);
               mysql_query("UPDATE usuarios SET credits = $valorfinal WHERE id = $iduser");
               $_SESSION['CREDITS'] = $valorfinal;
               // -------------------
               $NameCarro = $coluna['name_carro'];
               $Id_carro1 = $coluna['id_carro'];
               $Motor = $coluna['motor'];
               $Roda = $coluna['rodoa'];
               $Parts = $coluna['parts'];
               $Gasolina = $coluna['gasolina'];
               $Slots_max = $coluna['slots'];
               $Rotor = $coluna['rotor'];

               $mysql_insert = mysql_query("INSERT INTO carros_player (id,loginplayer,nomecarro,id_carros,motor,roda,parts,gasolina,slots,rotor) VALUES ('$idcarro_indentificador','$dinheiro_user','$NameCarro','$Id_carro1','$Motor','$Roda','$Parts','$Gasolina','$Slots_max','$Rotor')");
		}
		else {
			$msg = "CREDITOS INSUFICIENTES PARA COMPRAR " . $coluna['name_carro'];
		}
	}
  }
}
?>











<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>B2 MTA DAYZ</title>
<meta name="generator" content="WYSIWYG Web Builder 11 - http://www.wysiwygwebbuilder.com">
<link href="b2.css" rel="stylesheet">
<link href="compracarros.css" rel="stylesheet">
</head>
<body>
<div id="space"><br></div>
<div id="container">
<div id="wb_Form1" style="position:absolute;left:15px;top:23px;width:444px;height:230px;z-index:3;">
<form name="Form1" method="post" action="compracarros.php">
<select name="Combobox1" size="1" id="Combobox1" style="position:absolute;left:34px;top:28px;width:355px;height:28px;z-index:0;">
<?php 
$Consulta = mysql_query('SELECT * FROM carro_venda');
while ($row = mysql_fetch_array($Consulta)){
 $Carros = $row['name_carro'];
 $idcarro = $row['id_carro'];
 $Valor = $row['valor'];
 $id = $row['id'];
?>


<option value='<?php echo $idcarro; ?>'><?php echo $Carros . "&nbsp [VALOR]: " . $Valor?></option>
<?php 





}?>
</select>
<input type="submit" id="Button1" name="" value="COMPRAR" style="position:absolute;left:34px;top:85px;width:355px;height:25px;z-index:1;">
<div id="wb_Text1" style="position:absolute;left:35px;top:126px;width:354px;height:16px;z-index:2;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong><?php echo $msg; ?></strong></span></div>
</div>
</div>
</body>
</html>
