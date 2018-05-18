<?php
include 'connect.php';
session_start();

if (isset($_POST['login_cadastro'])){
	if(!empty($_POST['login_cadastro']) and !empty($_POST['Senha_cadastro']) and !empty($_POST['Email_cadastro'])){
$LoginRegistro = $_POST['login_cadastro'];
$SenhaRegistro = $_POST['Senha_cadastro'];
$EmailRegistro = $_POST['Email_cadastro'];
$Credits = 2000;
$Admin = 0;
$dados_user = mysql_query("SELECT * FROM usuarios WHERE login = '$LoginRegistro'");
$dados_user2 = mysql_query("SELECT * FROM usuarios WHERE email = '$EmailRegistro'");
$dado_user_consulta = mysql_fetch_array($dados_user);
$dado_user_consulta2 = mysql_fetch_array($dados_user2);
if($dado_user_consulta or $dado_user_consulta2){
	header('Location:cadastro.php');
	
} else
{
	$mysql_insert = mysql_query("INSERT INTO usuarios (login,senha,email,credits,isadmin) VALUES ('$LoginRegistro','$SenhaRegistro','$EmailRegistro','$Credits','$Admin')");
	$_SESSION['LOGIN'] = $LoginRegistro;
	header('Location:index.php');


}



 }
}


//$mysql_insert = mysql_query("INSERT INTO usuarios (login,senha,email,credits,isadmin) VALUES ('$Login','$Senha','$Email','$Credits','$Admin')");



?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>B2 MTA DAYZ</title>
<meta name="generator" content="WYSIWYG Web Builder 11 - http://www.wysiwygwebbuilder.com">
<link href="b2.css" rel="stylesheet">
<link href="cadastro.css" rel="stylesheet">
</head>
<body>
<div id="space"><br></div>
<div id="container">
<div id="wb_Shape1" style="position:absolute;left:0px;top:0px;width:601px;height:260px;z-index:7;">
<img src="images/img0007.png" id="Shape1" alt="" style="width:601px;height:260px;"></div>
<div id="wb_Form1" style="position:absolute;left:37px;top:22px;width:524px;height:200px;z-index:8;">
<form name="Form1" method="post" action="cadastro.php">

<input type="text" id="Editbox1" style="position:absolute;left:145px;top:30px;width:223px;height:18px;line-height:18px;z-index:0;" name="login_cadastro" value="" placeholder="Login">

<input type="password" id="Editbox2" style="position:absolute;left:146px;top:73px;width:223px;height:18px;line-height:18px;z-index:1;" name="Senha_cadastro" value="" placeholder="Senha">

<input type="email" id="Editbox3" style="position:absolute;left:145px;top:117px;width:223px;height:18px;line-height:18px;z-index:5;" name="Email_cadastro" value="" placeholder="Email">

<input type="submit" id="Button3" name="" value="Fazer Cadastro" style="position:absolute;left:173px;top:159px;width:179px;height:25px;z-index:2;">
<div id="wb_Text1" style="position:absolute;left:146px;top:14px;width:233px;height:16px;text-align:center;z-index:3;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>Login ( igual usado no servidor )</strong></span></div>
<div id="wb_Text2" style="position:absolute;left:145px;top:57px;width:233px;height:16px;text-align:center;z-index:4;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>Senha</strong></span></div>

<div id="wb_Text3" style="position:absolute;left:144px;top:101px;width:233px;height:16px;text-align:center;z-index:6;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>E-mail</strong></span></div>
</form>
</div>
</div>
</body>
</html>