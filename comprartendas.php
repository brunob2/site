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
$IdTendas = $_POST['Combobox1'];

//--------
$dados_tendas = mysql_query("SELECT * FROM tenda_venda WHERE tent_id = '$IdTendas'");
$dados_resultado_tendas = mysql_fetch_array($dados_tendas);

$ValorTenda = $dados_resultado_tendas['valor'];
$IdTenda = $dados_resultado_tendas['tent_id'];
//--------

$dados_user = mysql_query("SELECT * FROM usuarios WHERE login = '$user'");
$dados_resultado_user = mysql_fetch_array($dados_user);

$CreditosPlayer = $dados_resultado_user['credits'];
$id = $dados_resultado_user['id'];
$login = $dados_resultado_user['login'];

if($CreditosPlayer >= $ValorTenda)
 {
  $msg = "Comprar feita com sucesso";
  $valorfinal = $CreditosPlayer-$ValorTenda;
  $_SESSION['CREDITS'] = $valorfinal;
  mysql_query("UPDATE usuarios SET credits = $valorfinal WHERE id = $id");
  $returns[] = $resource->call ( "Buy_Tendas",$IdTenda,$login);
 }
}





?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Page</title>
<meta name="generator" content="WYSIWYG Web Builder 11 - http://www.wysiwygwebbuilder.com">
<link href="b2.css" rel="stylesheet">
<link href="comprartendas.css" rel="stylesheet">
</head>
<body>
<div id="space"><br></div>
<div id="container">
<div id="wb_Form1" style="position:absolute;left:15px;top:23px;width:444px;height:230px;z-index:3;">
<form name="Form1" method="post" action="comprartendas.php">
<select name="Combobox1" size="1" id="Combobox1" style="position:absolute;left:34px;top:28px;width:355px;height:28px;z-index:0;">

<?php 
$Consulta = mysql_query('SELECT * FROM tenda_venda');
while($row = mysql_fetch_array($Consulta))
{



?>

<option value='<?php echo $row['tent_id']; ?>'><?php echo $row['tent_name'] . " | VALOR: " . $row['valor']?></option>
<?php 
}

?>
</select>
<input type="submit" id="Button1" name="" value="COMPRAR" style="position:absolute;left:34px;top:85px;width:355px;height:25px;z-index:1;">
<div id="wb_Text1" style="position:absolute;left:35px;top:126px;width:354px;height:16px;z-index:2;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong><?php echo $msg ?></strong></span></div>
</form>
</div>
</div>
</body>
</html>