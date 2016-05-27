<?php
/**
 * Created by Joe of ExchangeCore.com
 */
if(isset($_POST['username']) && isset($_POST['password'])){

    $adServer = "ldap://fremont.flashelec.com";
	
    $ldap = ldap_connect($adServer);
    $username = $_POST['username'];
    $password = $_POST['password'];

    $ldaprdn = 'fremont.flashelec' . "\\" . $username;

    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

    $bind = @ldap_bind($ldap, $ldaprdn, $password);


    if ($bind) {
        $filter="(sAMAccountName=$username)";
        $result = ldap_search($ldap,"dc=fremont,dc=flashelec,dc=COM",$filter);
        ldap_sort($ldap,$result,"sn");
        $info = ldap_get_entries($ldap, $result);
        for ($i=0; $i<$info["count"]; $i++)
        {
            if($info['count'] > 1)
                break;
            echo "<p>You are accessing <strong> ". $info[$i]["sn"][0] .", " . $info[$i]["givenname"][0] ."</strong><br /> (" . $info[$i]["samaccountname"][0] .")</p>\n";
            echo '<pre>';
            var_dump($info);
            echo '</pre>';
            $userDn = $info[$i]["distinguishedname"][0]; 
        }
        @ldap_close($ldap);
    } else {
        $msg = "Invalid email address / password";
        echo $msg;
    }

}else{
?>
    <form action="#" method="POST">
        <label for="username">Username: </label><input id="username" type="text" name="username" /> 
        <label for="password">Password: </label><input id="password" type="password" name="password" />        <input type="submit" name="submit" value="Submit" />
    </form>
<?php } ?> 



<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Validación en servidor LDAP con PHP</title>
</head>
<body>

<?php
  //desactivamos los erroes por seguridad
  error_reporting(0);
  error_reporting(E_ALL); //activar los errores (en modo depuración)

  $servidor_LDAP = "10.74.80.4";
  $servidor_dominio = "fremon.flashelec.com";
  $ldap_dn = "dc=fremont,dc=flashelec,dc=com";
  $usuario_LDAP = "administrator";
  $contrasena_LDAP = "cab$afg*91";

  echo "<h3>Validar en servidor LDAP desde PHP</h3>";
  echo "Conectando con servidor LDAP desde PHP...";

  $conectado_LDAP = ldap_connect($servidor_LDAP);
  ldap_set_option($conectado_LDAP, LDAP_OPT_PROTOCOL_VERSION, 3);
  ldap_set_option($conectado_LDAP, LDAP_OPT_REFERRALS, 0);

  if ($conectado_LDAP) 
  {
    echo "<br>Conectado correctamente al servidor LDAP " . $servidor_LDAP;

	   echo "<br><br>Comprobando usuario y contraseña en Servidor LDAP";
    $autenticado_LDAP = ldap_bind($conectado_LDAP, 
	       $usuario_LDAP . "@" . $servidor_dominio, $contrasena_LDAP);
    if ($autenticado_LDAP)
    {
	     echo "<br>Autenticación en servidor LDAP desde Apache y PHP correcta.";
	   }
    else
    {
      echo "<br><br>No se ha podido autenticar con el servidor LDAP: " . 
	      $servidor_LDAP .
	      ", verifique el usuario y la contraseña introducidos";
    }
  }
  else 
  {
    echo "<br><br>No se ha podido realizar la conexión con el servidor LDAP: " .
        $servidor_LDAP;
  }
?>

</body>
</html>