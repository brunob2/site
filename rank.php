<?php 
include 'connect.php';

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>RANK GLOBAL B2 MTA DAYZ</title>
<meta name="generator" content="WYSIWYG Web Builder 11 - http://www.wysiwygwebbuilder.com">
<link href="Untitled1.css" rel="stylesheet">
<link href="rank.css" rel="stylesheet">
</head>
<body>
<div id="container">
</div>
<div id="Layer3" style="position:absolute;text-align:center;left:0px;top:0px;width:99.7938%;height:98px;z-index:6;">
<div id="Layer3_Container" style="width:968px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_TextArt1" style="position:absolute;left:56px;top:11px;width:892px;height:56px;z-index:0;">
<img src="images/img000331.png" id="TextArt1" alt="RANK " title="RANK " style="width:892px;height:56px;"></div>
<div id="wb_Text5" style="position:absolute;left:329px;top:75px;width:194px;height:16px;z-index:1;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>RANK GLOBAL B2 MTA DAYZ</strong></span></div>
</div>
</div>
<div id="Layer1" style="position:absolute;text-align:center;left:0px;top:117px;width:99.7938%;height:37px;z-index:7;">
<div id="Layer1_Container" style="width:968px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Text1" style="position:absolute;left:21px;top:10px;width:250px;height:16px;z-index:2;text-align:left;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><strong>NICK DO JOGADOR</strong></span></div>
<div id="wb_Text2" style="position:absolute;left:798px;top:10px;width:129px;height:16px;z-index:3;text-align:left;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><strong>EXP</strong></span></div>
</div>
</div>
<?php 
$NumeroInicial = 130;
$Consulta = mysql_query('SELECT * FROM ranktop10');
while ($row = mysql_fetch_array($Consulta)){ 
$NumeroInicial = $NumeroInicial+50

	?>

<div id="rank" style="position:absolute;text-align:center;left:0px;top:<?php echo $NumeroInicial?>px;width:99.7938%;height:37px;z-index:8;">
<div id="rank_Container" style="width:968px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Text3" style="position:absolute;left:21px;top:10px;width:250px;height:16px;z-index:4;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong><?php echo $row['Nick'];?></strong></span></div>
<div id="wb_Text4" style="position:absolute;left:798px;top:10px;width:129px;height:16px;z-index:5;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong><?php echo $row['Exp'];?></strong></span></div>
</div>
</div>
<?php 
}
?>
</body>
</html>