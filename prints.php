<html>
 <head>
  <title>Test Print without prompt</title>
  <style>body {font-family:verdana,arial;font-size:10pt;background:white;} div {width:600px;border:3px solid #ccc;padding:3px;}</style>
  <script type="text/javascript">
  function print_doc()
  {         
        // alert(jsPrintSetup.getPaperSizeDataByID(3))
        // jsPrintSetup.setPaperSizeData(3);
        // set portrait orientation
        //jsPrintSetup.setPrinter('POS-76');
       // jsPrintSetup.printWindow(window);
	
		jsPrintSetup.setOption('orientation', jsPrintSetup.kPortraitOrientation);
		
		   jsPrintSetup.setOption('printBGColors',1);
         jsPrintSetup.setOption('printBGImages',1);
		// set top margins in millimeters
		jsPrintSetup.setOption('marginTop', 15);
		jsPrintSetup.setOption('marginBottom', 15);
		jsPrintSetup.setOption('marginLeft', 20);
		jsPrintSetup.setOption('marginRight', 10);
		// set page header
		jsPrintSetup.setOption('headerStrLeft', 'My custom header');
		jsPrintSetup.setOption('headerStrCenter', '');
		jsPrintSetup.setOption('headerStrRight', '&PT');
		// set empty page footer
		jsPrintSetup.setOption('footerStrLeft', '');
		jsPrintSetup.setOption('footerStrCenter', '');
		jsPrintSetup.setOption('footerStrRight', '');
		// Suppress print dialog
		jsPrintSetup.setSilentPrint(true);/* Set silent printing */
        // Do Print 
        // When print is submitted it is executed asynchronous and
        // script flow continues after print independently of completetion of print process! 
        jsPrintSetup. setShowPrintProgress(true);		
		jsPrintSetup.print();
		// Restore print dialog
		//jsPrintSetup.setSilentPrint(false); /** Set silent printing back to false */
   }
 </script>	 
 </head>
 <body onLoad="document.getElementsByName('print_doc')[0].focus();">
 <center>
 <div>
 The
 <input type="text" value="Print Now" name="print_doc" id="print_doc" onChange="print_doc();"/>
 </div>
 </center>

 </body>
 </html>
 
 <?
 
 foreach($PrintTag as $Print)  $ID_netbox = $Print->ID_netbox;  $Mac_Adresse = $Print->Mac_Adresse;
 $PNN = "PPN27001J067-01";
 $ID_netboxImg = array( 'src' => 'barcode.php?text='.$ID_netbox,'width' => '150px','height' => '40px','display'=>'block');
 $PNNImg = array( 'src' => 'barcode.php?text='.$PNN,'width' => '150px','height' => '25px','display'=>'block');
 $nyceImg = array( 'src' => 'images/nom-nyce.png','width' => '70%','height' => '40px','display'=>'block');
 $Mac_AdresseImg = array( 'src' => 'barcode.php?text='.$Mac_Adresse,'width' => '150px','height' => '25px','display'=>'block');
 $total_play_logo = array( 'src' => 'images/total_play_logo.png', 'width' => '45px','height' => '15px','display'=>'block');
 $Linelinepng = array( 'src' => 'images/Lineline.png', 'width' => '100%','height' => '2px','margin' => '-10px');
 date_default_timezone_set("America/Tijuana");$PNN = "PPN27001J067-01"; 
$html ="
<table width='100px' border='0' cellspacing='0' style='margin-left:15px; margin-top:5px;  border-spacing:0;' >
 
    <tr>
      <td align='center' style='padding:0px;'><font size='-1'><b>N7800-4<br></font></b>
      <?= img($total_play_logo); ?>
      <?  img($Linelinepng);?></td>
 <td colspan='8' rowspan='1' valign='top' style='padding:0px;' >
 <?= img($ID_netboxImg); ?>
 <font size='-3' >ID: <?=$ID_netbox?></font>
	 <?  img($Linelinepng);?>
    </td>
    <tr>
      <td colspan='8' align='left' style='padding:0px;'>
   
<?=img($PNNImg); ?>
<font size='-3' >P/N: *PPN27001J067-01*</font>
</td>

<td colspan='1' align='right' style='padding:0px;'><?=img($nyceImg); ?>
</td>
    </tr>
    <tr>

      <td colspan='8' align='left' valign='top' style='padding:0px;'><?=img($Mac_AdresseImg); ?>
      <font size='-3' >MAC (S/N): <?=$Mac_Adresse?></font></td>
<td align='right' valign='bottom'><font size='1'>Date <?=$this->input->post('week')?>/<?=date('y')?></font></td>
    </tr>
 
</table>";

(empty($this->input->post('week'))) ? date('W') : $this->input->post('week');