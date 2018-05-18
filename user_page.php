<?php
include 'connect.php';
include 'sdk_mta/mta_sdk.php';
include 'sdk_mta/connect_mta.php';
session_start();
if(empty($_SESSION['LOGIN'])){
   header('Location:index.php');
}
if(isset($_POST['buttonsair'])){
   header('Location:index.php');
   session_destroy();
}
?>








<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>B2 MTA DAYZ</title>
<meta name="generator" content="WYSIWYG Web Builder 11 - http://www.wysiwygwebbuilder.com">
<link href="b2.css" rel="stylesheet">
<link href="user_page.css" rel="stylesheet">
<script src="jquery-1.11.3.min.js"></script>
<script src="jquery.ui.effect.min.js"></script>
<script src="wb.panel.min.js"></script>
<script>
$(document).ready(function()
{
   $("#PanelMenu1").panel({animate: true, animationDuration: 200, animationEasing: 'easeInExpo', dismissible: true, display: 'push', position: 'left', overlay: true});
});
</script>
</head>
<body>
<div id="space"><br></div>
<div id="container">
<div id="wb_Shape1" style="position:absolute;left:1px;top:0px;width:968px;height:968px;z-index:1;">
<img src="images/img0002.png" id="Shape1" alt="" style="width:968px;height:968px;"></div>
<div id="wb_PanelMenu1" style="position:absolute;left:1px;top:0px;width:964px;height:45px;text-align:center;z-index:2;">
<a href="#PanelMenu1_markup" id="PanelMenu1">MENU</a>
<div id="PanelMenu1_markup">
<ul>
   <li><a href="./compracarros.php" target="b2frame">COMPRAR VEICULO</a></li>
   <li><a href="./compravips.php" target="b2frame">COMPRAR VIP</a></li>
   <li><a href="./comprararmas.php" target="b2frame">COMPRAR ARMAS</a></li>
   <li><a href="./comprartendas.php" target="b2frame">COMPRAR TENDAS</a></li>
   <li><a href="./comprar_creditos.php" target="b2frame">COMPRAR CASH</a></li>
   <li><a href="">&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</a></li>
   <li><a href="./meucarros.php" target="b2frame">VER MEUS CARROS</a></li>
   <li><a href="./vipsstatus.php" target="b2frame">STATUS MEU VIP</a></li>
   <li><a href="./editperfil.php" target="b2frame">EDITAR PERFIL</a></li>
   <li><a href="./supp.php" target="b2frame">SUPPORT</a></li>
</ul>
</div>
</div>
<div id="wb_Shape2" style="position:absolute;left:17px;top:60px;width:938px;height:44px;filter:alpha(opacity=50);opacity:0.50;z-index:3;">
<img src="images/img0003.png" id="Shape2" alt="" style="width:938px;height:44px;"></div>
<div id="wb_Text1" style="position:absolute;left:33px;top:74px;width:179px;height:16px;z-index:4;text-align:left;">
<?php 
$user = $_SESSION['LOGIN'];
$dados_user = mysql_query("SELECT * FROM usuarios WHERE login = '$user'");
$dado_user_consulta = mysql_fetch_array($dados_user);
$creditos = $dado_user_consulta['credits'];
?>
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>USUÁRIO: <?php echo $_SESSION['LOGIN']; ?></strong></span></div>
<div id="wb_Text2" style="position:absolute;left:776px;top:74px;width:179px;height:16px;z-index:5;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>MEUS CREDITOS: <?php echo $creditos; ?></strong></span></div>
<iframe name="b2frame" id="InlineFrame1" style="position:absolute;left:17px;top:116px;width:936px;height:839px;z-index:6;" src=""></iframe>
<div id="wb_Form1" style="position:absolute;left:270px;top:59px;width:354px;height:42px;z-index:7;">
<form name="formsair" method="post" action="user_page.php">
<input type="submit" id="Button1" name="buttonsair" value="Sair" style="position:absolute;left:87px;top:10px;width:229px;height:25px;z-index:0;">
</form>
</div>
</div>
</body>
</html>