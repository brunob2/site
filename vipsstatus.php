<?php 
session_start();
if(empty($_SESSION['LOGIN'])){
   header('Location:index.php');

}
include 'connect.php';
$LoginPlayer = $_SESSION['LOGIN'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Page</title>
<meta name="generator" content="WYSIWYG Web Builder 11 - http://www.wysiwygwebbuilder.com">
<link href="b2.css" rel="stylesheet">
<link href="vipsstatus.css" rel="stylesheet">
</head>
<body>
<div id="space"><br></div>
<div id="container">
<table style="position:absolute;left:0px;top:0px;width:462px;height:32px;z-index:0;" id="Table1">
<?php 

$dados_user = mysql_query("SELECT * FROM usuarios WHERE login = '$LoginPlayer'");
$dado_user_resultado = mysql_fetch_array($dados_user);
$Consulta = mysql_query('SELECT * FROM vip_user');
while ($row = mysql_fetch_array($Consulta)){
if($row['id_user'] == $dado_user_resultado['id'])
{
  $Login = $row['loginVip'];
  $Vencimento = $row['Vencimento'];



?>
<tr>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"><strong><?php echo "LOGIN: ".$Login; ?></strong></span></td>
<td class="cell1"><span style="color:#FF0000;font-family:Arial;font-size:13px;line-height:16px;"><strong><?php echo "VENCIMENTO: ".$Vencimento; ?></strong></span></td>
<?php 

}
}?>
</tr>
</table>
</div>
</body>
</html>