<?php
session_start();
include 'connect.php';
if(isset($_POST['login']))
{
$login = $_POST['login'];
$senha = $_POST['senha'];
$dados = mysql_query('SELECT * FROM usuarios');
while($row = mysql_fetch_array($dados))
 {
  if($row['login'] == $login and $row['senha'] == $senha){
  	$_SESSION['LOGIN'] = $login;
    $_SESSION['SENHA'] = $senha;
    $_SESSION['CREDITS'] = $row['credits'];
    $_SESSION['admin'] = $row['isadmin'];
   header('Location:user_page.php');
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
<link href="index.css" rel="stylesheet">
</head>
<body>
<div id="space"><br></div>
<div id="container">
<div id="wb_Shape1" style="position:absolute;left:0px;top:0px;width:601px;height:328px;z-index:7;">
<img src="images/img0001.png" id="Shape1" alt="" style="width:601px;height:328px;"></div>
<div id="wb_Form1" style="position:absolute;left:37px;top:22px;width:524px;height:264px;z-index:8;">
<form name="Form1" method="post" action="index.php">
<input type="text" id="Editbox1" style="position:absolute;left:145px;top:62px;width:223px;height:18px;line-height:18px;z-index:1;" name="login" value='<?php
if(isset($_SESSION['LOGIN'])){
	echo $_SESSION['LOGIN'];
}


 ?>' placeholder="Login">
<input type="password" id="Editbox2" style="position:absolute;left:145px;top:118px;width:223px;height:18px;line-height:18px;z-index:2;" name="senha" value='<?php
if(isset($_SESSION['SENHA'])){
	echo $_SESSION['SENHA'];
}


 ?>' placeholder="Senha">
<input type="submit" id="Button1" name="" value="Fazer Login" style="position:absolute;left:172px;top:167px;width:179px;height:25px;z-index:3;">
<div id="wb_Text1" style="position:absolute;left:29px;top:12px;width:479px;height:16px;text-align:center;z-index:4;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>SISTEMA DE LOGIN B2 MTA DAYZ</strong></span></div>
<div id="wb_Form2" style="position:absolute;left:133px;top:202px;width:257px;height:40px;z-index:5;">
</form>
<form name="formcadastro" method="post" action="cadastro.php">
<input type="submit" id="Button3" name="" value="Fazer Cadastro" style="position:absolute;left:38px;top:8px;width:179px;height:25px;z-index:0;">
</form>
</div>
</div>
<div id="wb_Text2" style="position:absolute;left:3px;top:330px;width:598px;height:16px;z-index:12;text-align:left;">
&nbsp;</div>
<div id="wb_daquiparabaixo" style="position:absolute;left:0px;top:328px;width:601px;height:62px;z-index:13;">
<img src="images/img0008.png" id="daquiparabaixo" alt="" style="width:601px;height:62px;"></div>
<div id="wb_Text6" style="position:absolute;left:6px;top:333px;width:584px;height:16px;text-align:center;z-index:14;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><strong>B2 MTA DAYZ WEB RANK | TOP 3</strong></span></div>
<div id="wb_Text7" style="position:absolute;left:11px;top:368px;width:100px;height:16px;z-index:15;text-align:left;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><strong>Nick do player</strong></span></div>
<div id="wb_Text8" style="position:absolute;left:227px;top:368px;width:152px;height:16px;z-index:16;text-align:left;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><strong>Experiencia do player</strong></span></div>
<div id="wb_Text9" style="position:absolute;left:429px;top:368px;width:152px;height:16px;z-index:17;text-align:left;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><strong>Jogadores mortos</strong></span></div>
<?php 
include 'connect.php';
$valorInicial = 350;
$Consulta = mysql_query('SELECT * FROM ranktop10 ORDER BY Exp DESC');
while($row = mysql_fetch_array($Consulta)){

$valorInicial = $valorInicial+50;
echo $valorInicial;
  $Nick = $row['Nick'];
  $Exp = $row['Exp'];
  $Kill = $row['Kill_player'];
  if($valorInicial <= 500){
?>
<div id="Layer2" style="position:absolute;text-align:center;left:0px;top:<?php echo $valorInicial; ?>px;width:601px;height:38px;z-index:18;">
<div id="Layer2_Container" style="width:601px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Text3" style="position:absolute;left:12px;top:8px;width:100px;height:16px;z-index:7;text-align:left;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><strong><?php echo $Nick; ?></strong></span></div>
<div id="wb_Text4" style="position:absolute;left:228px;top:8px;width:152px;height:16px;z-index:8;text-align:left;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><strong><?php echo $Exp; ?></strong></span></div>
<div id="wb_Text5" style="position:absolute;left:430px;top:8px;width:152px;height:16px;z-index:9;text-align:left;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><strong><?php echo $Kill; ?></strong></span></div>
</div>
</div>
<?php 
}
}?>
</div>
</body>
</html>