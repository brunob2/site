<?php 
session_start();
if(empty($_SESSION['LOGIN'])){
   header('Location:index.php');

}
include 'connect.php';
$LoginPlayer = $_SESSION['LOGIN'];
$dados_user = mysql_query("SELECT * FROM usuarios WHERE login = '$LoginPlayer'");
$dado_user_resultado = mysql_fetch_array($dados_user);

 $LoginPlayer = $dado_user_resultado['login'];
 $PassP = $dado_user_resultado['senha'];
 $id = $dado_user_resultado['id'];

if(isset($_POST['LoginServer2'])){
	$Old_Pass = $_POST['OldPass'];
	$New_Pass = $_POST['NewPass'];
	$New_Pass2 = $_POST['NewPass2'];
	if($Old_Pass == $PassP){
		if($New_Pass == $New_Pass2)
		{

			mysql_query("UPDATE usuarios SET senha = '$New_Pass' WHERE id = $id");
		}
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
<link href="editperfil.css" rel="stylesheet">
</head>
<body>
<div id="space"><br></div>
<div id="container">
<div id="wb_Form1" style="position:absolute;left:0px;top:0px;width:371px;height:266px;z-index:9;">
<form name="Form1" method="post" action="editperfil.php">
<input type="text" id="Editbox1" style="position:absolute;left:88px;top:28px;width:185px;height:18px;line-height:18px;z-index:0;" name="LoginServer2"  value='<?php echo $LoginPlayer; ?>' readonly placeholder="Login Servidor">
<input type="text" id="Editbox2" style="position:absolute;left:88px;top:72px;width:185px;height:18px;line-height:18px;z-index:1;" name="OldPass" value="" placeholder="Senha antiga">
<input type="text" id="Editbox3" style="position:absolute;left:88px;top:117px;width:185px;height:18px;line-height:18px;z-index:2;" name="NewPass" value="" placeholder="Nova Senha">
<input type="text" id="Editbox4" style="position:absolute;left:88px;top:163px;width:185px;height:18px;line-height:18px;z-index:3;" name="NewPass2" value="" placeholder="Nova Senha">
<div id="wb_Text1" style="position:absolute;left:88px;top:12px;width:195px;height:16px;text-align:center;z-index:4;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>LOGIN USADO NO SERVIDOR</strong></span></div>
<div id="wb_Text2" style="position:absolute;left:88px;top:56px;width:195px;height:16px;text-align:center;z-index:5;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>SENHA ANTIGA</strong></span></div>
<div id="wb_Text3" style="position:absolute;left:88px;top:100px;width:195px;height:16px;text-align:center;z-index:6;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>SENHA NOVA</strong></span></div>
<div id="wb_Text4" style="position:absolute;left:88px;top:147px;width:195px;height:16px;text-align:center;z-index:7;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>REPETIR NOVA SENHA</strong></span></div>
<input type="submit" id="Button1" name="" value="Salvar Alteraçoes" style="position:absolute;left:91px;top:208px;width:192px;height:25px;z-index:8;">
</form>
</div>
</div>
</body>
</html>