    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="bootstrap-table/assets/bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="bootstrap-table/assets/bootstrap/js/jquery.js"></script>
	<script src="bootstrap-table/assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap-table/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-table/assets/bootstrap-table/bootstrap-table.css">
    <link rel="stylesheet" href="bootstrap-table/assets/bootstrap-table/bootstrap-editable.css">
    <link rel="stylesheet" href="bootstrap-table/assets/examples.css">
    <script src="bootstrap-table/assets/jquery.min.js"></script>
    <script src="bootstrap-table/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap-table/assets/bootstrap-table/bootstrap-table.js"></script>
    <script src="bootstrap-table/extensions/bootstrap-table-export.js"></script>
    <script src="bootstrap-table/assets/bootstrap-table/tableExport.js"></script>
    <script src="bootstrap-table/extensions/bootstrap-table-editable.js"></script>
    <script src="bootstrap-table/assets/bootstrap-table/bootstrap-editable.js"></script>
    <script src="bootstrap-table/extensions/toolbar/bootstrap-table-toolbar.js"></script>
    <script src="bootstrap-table/extensions/filter-control/bootstrap-table-filter-control.js"></script>
	<? date_default_timezone_set("America/Tijuana"); //header('Refresh: 200; index.php');
    if(isset($_GET['mailit'])){   
include("phpmailer-gmail/class.phpmailer.php");
include("phpmailer-gmail/class.smtp.php");
$mail = new PHPMailer();
$mail->Mailer = "smtp";
$mail->IsSMTP();
$mail->SMTPAuth = false;
$mail->Host = "172.16.0.32";
$mail->Port = 25;
$mail->Username = "asteelflash\juan.tellez";
$mail->Password = "Flash123";
$mail->From = "juan.tellez@asteelflash.com";
$mail->FromName = "Alertas TME ";
$mail->Subject = "sistema de alertas TME";

date_default_timezone_set("America/Tijuana"); 
    $bd_host = "localhost"; $bd_usuario = "asteelflash"; $bd_password = "Flash123"; $bd_base = "asteel";
	$con = mysql_connect($bd_host, $bd_usuario, $bd_password) or die("Error en la conexión a MsSql");
	mysql_select_db($bd_base, $con);
	echo $input_time_plus = date('Y-m-d', strtotime(date('Y-m-d')." + 36 hours"));
  $sql = "SELECT * FROM washer WHERE input_time <= $input_time_plus ORDER by id DESC";  $current=strtotime(date('Y-m-d H:i:s'));
 
//$mail->MsgHTML("Esta es una alerta generada automaticamente por el sistema tiempo Maximo de exposicion para lavado (TME) @ </font><hr>");
$res = mysql_query($sql) or die(mysql_error());
echo $número_filas = mysql_num_rows($res);
	while($tme = mysql_fetch_assoc($res)) {
echo $exp_on= date('Y-m-d H:i:s', strtotime(date($tme["input_time"])." + 68 hours"));
echo $mail->MsgHTML("id=>" .$tme["id"]."<br>codigo de Barras=>" .$tme["Bar_Code"]."<br>Fecha de ingreso=>" .$tme["input_time"]."<br>Fech de experiacion=>" .$exp_on."<br>
 <br>
 <hr>
This e-mail and any attachments are confidential. It is intended for the recipient only. If you have received this e-mail in error, please immediately notify the sender by replying to this e-mail and delete the e-mail and all copies from your computer. Although the sender and AsteelFlash have taken every reasonable precaution, the e-mail and attachments may have some errors or omissions and may contain viruses. We cannot accept liability for any damage that you sustain as a result of that.

ITAR Statement:
The information provided to you herewith is subject to the United States International Traffic in Arms Regulations.  This information may not be disclosed to a Foreign Person or exported from the United States without a license or written authorization from the Directorate of Defense Trade Controls of the U.S. Department of State.

EAR Statement:
The information provided to you herewith is subject to the United States Export Administration Regulations.  This information may not be disclosed to a Foreign Person or exported from the United States without a license or authorization from the Bureau of Industry and Security of the U.S. Department of Commerce
");
}
$file = date('d_m_Y').'.pdf';
$mail->AddAttachment($file);
/*$mail->AddAddress("Carlos.Olivas@asteelflash.com");
$mail->AddAddress("Lider.almacen@asteelflash.com");
$mail->AddAddress("Lider.produccion@asteelflash.com");
$mail->AddAddress("VRaul.Villarreal@asteelflash.com");
$mail->AddAddress("Benoit.LeTalour@asteelflash.com");
$mail->AddAddress("Alonso.Meza@asteelflash.com");
$mail->AddAddress("Ernesto.Ceron@asteelflash.com");
$mail->AddAddress("rodrigo.gutierrez@asteelflash.com");*/
$mail->AddAddress("juan.tellez@asteelflash.com");
//$mail->AddCC("");
$mail->IsHTML(true);
	}
//if($mail->Send()) 
?>
