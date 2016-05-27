<? //header("Refresh:0; url=http://10.74.80.24/apps/netgem.php/main/netgem700"); exit;?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
        

</head>
<body style="margin:0px; width:300px" onLoad="window.print();" >
<div id="AccessCard"> 
<table width="100px" border="0" style="margin:0px; margin-left:20px; margin-top:10px;">
<? $ID_netbox = "780J67155281FAD701X"; date_default_timezone_set("America/Tijuana");?>
<? $Mac_Adresse = "00043081FAD7";?>
<? $PNN = "PPN27001J067-01"; ?>
  <tbody>
    <tr>
      <td align="center" style="margin:-10px;"><font size="-1"><b>N7800-4<br></font></b>
     
      <img src="images/total_play_logo.png" width="45px" height="20px" style="margin-top:0px;"/></td>
 <td colspan="8" rowspan="1"><img alt="testing" src="barcode.php?text=<?=$ID_netbox?>" width="150px" height="20px" style="margin-top:0px; margin:-5px; " />
      <font size="-6" style="margin:-10px;"><b>ID: <?=$ID_netbox?></b></font></td>
    </tr>
    <tr>
      <td colspan="8" align="right"><img alt="testing" src="barcode.php?text=<?=$PNN?>" width="140px" height="20px" style="margin:-10px; margin-left:0px; margin-top:5px;" /></td>
      <td colspan="1" rowspan="2" align="right"><img alt="testing" src="images/nom-nyce.png" width="70%" height="30px" /></td>
    </tr>
    <tr>
      
      <td colspan="8" align="justify" style="margin-left:30px;">
      <font size="-3"><b>P/N: *PPN27001J067-01*</b></font></td>
     
     
    </tr>
    <tr>
      <td colspan="8" align="right"><img alt="testing" src="barcode.php?text=<?=$Mac_Adresse?>" width="140px" height="20px" style="margin:-10px; margin-top:5px;" /></td>
    </tr>
    <tr>
      <td colspan="8" align="justify" style="margin:-10px;">
      <font size="-3" ><b>MAC (S/N): <?=$Mac_Adresse?></b></font>
     
<font size="-3" style="margin:0px;">Date <?=date('W')?>/<?=date('y')?></font></td>
 
    </tr>
  </tbody>
</table>
</div>
</body>
</html>