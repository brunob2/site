<?php 
$msg = "| CUSTO DE 100 PARA RESPAWN |";
session_start();
if(empty($_SESSION['LOGIN'])){
   header('Location:index.php');
}
include 'connect.php';
include 'sdk_mta/mta_sdk.php';
include 'sdk_mta/connect_mta.php';
$user = $_SESSION['LOGIN'];

if(isset($_POST['idindefi'])){
	$id_selecionado = $_POST['idindefi'];
	$idcarro_selecionado = $_POST['CarroId'];
	$login_selecionado = $_POST['LoginPlayer'];
	// --- VALORES EXTRAS
	$Motor_post = $_POST['Motor'];
	$Rodas_post = $_POST['Rodas'];
	$Parts_post = $_POST['Parts'];
	$Gasolina_post = $_POST['Gasolina'];
	$Slots_post = $_POST['Slots'];
	$Rotor_post = $_POST['Rotor'];

	$Valor_respawn = 50;
	//------------------------------
    $dados_user = mysql_query("SELECT * FROM usuarios WHERE login = '$user'");
    $dado_user_consulta = mysql_fetch_array($dados_user);
    if($dado_user_consulta['credits'] >= $Valor_respawn)
    {
    	$iduser = $dado_user_consulta['id'];
    	$valorfinal = $dado_user_consulta['credits'] - $Valor_respawn;
    	$_SESSION['CREDITS'] = $valorfinal;
        mysql_query("UPDATE usuarios SET credits = $valorfinal WHERE id = $iduser");
    	$returns[] = $resource->call ( "Respawn_Vehicle",$id_selecionado,$idcarro_selecionado,$login_selecionado,$Motor_post,$Rodas_post,$Parts_post,$Gasolina_post,$Slots_post,$Rotor_post);
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
<link href="meucarros.css" rel="stylesheet">
</head>
<body>
<div id="space"><br></div>
<div id="container">
<?php 
$Consulta = mysql_query('SELECT * FROM carros_player');
while ($row = mysql_fetch_array($Consulta)){
if($row['loginplayer'] == $user){
$Idind = $row['id'];
$Carro_id = $row['id_carros'];
$LoginPlay = $row['loginplayer'];
// -- VALORES EXTRAS
$Motor = $row['motor'];
$Rodas = $row['roda'];
$Parts = $row['parts'];
$Gasolina = $row['gasolina'];
$Slots = $row['slots'];
$Rotor = $row['rotor'];


?>
<div id="Layer1" style="position:relative;text-align:left;margin:0px 0px 0px 0px;width:543px;height:50px;float:left;display:block;z-index:5;">
<div id="wb_Text1" style="position:absolute;left:20px;top:17px;width:132px;height:16px;z-index:1;text-align:left;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><strong><?php echo $row['nomecarro'] . " ID:".$row['id_carros'];?></strong></span></div>
<div id="wb_Text2" style="position:absolute;left:150px;top:17px;width:130;height:16px;z-index:2;text-align:left;">
<span style="color:#FFFFFF;font-family:Arial;font-size:12px;"><strong><?php echo $row['id'];?></strong></span></div>
<div id="wb_Form1" style="position:absolute;left:284px;top:6px;width:250px;height:35px;z-index:3;">
<form name="Form1" method="post" action="meucarros.php">
<input type="submit" id="Button1" name="" value="RESPAWN CARRO" style="position:absolute;left:17px;top:5px;width:223px;height:25px;z-index:0;">
<input type="hidden" value='<?php echo $Idind;?>' name="idindefi" />
<input type="hidden" value='<?php echo $Carro_id;?>' name="CarroId" />
<input type="hidden" value='<?php echo $LoginPlay;?>' name="LoginPlayer" />

<input type="hidden" value='<?php echo $Motor;?>' name="Motor" />
<input type="hidden" value='<?php echo $Rodas;?>' name="Rodas" />
<input type="hidden" value='<?php echo $Parts;?>' name="Parts" />
<input type="hidden" value='<?php echo $Gasolina;?>' name="Gasolina" />
<input type="hidden" value='<?php echo $Slots;?>' name="Slots" />
<input type="hidden" value='<?php echo $Rotor;?>' name="Rotor" />

</form>
</div>
</div>
<?php 
 }
}
?>
</div>
</body>
</html>