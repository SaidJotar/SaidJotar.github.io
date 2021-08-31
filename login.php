<?php
$db_host="localhost";
$db_user="Prueba";
$db_password="231095Said";
$db_name="miweb";
$db_table_name="usuarios";
   $db_connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);
 
 
if (!$db_connection) {
	die('Unable to connect to the database');
}

$subs_email = utf8_decode($_GET['email']);
$subs_password = utf8_decode($_GET['password']);

if($subs_email == "" || $subs_password == ""){
 echo "<script>
			alert('You have to write yourE-mail and Password');
			window.location= 'login.html'
</script>";
exit;
}

$sql="SELECT * FROM ".$db_table_name." WHERE email = '".$subs_email."' AND password = '".$subs_password."'";

if ($resultado=mysqli_query($db_connection,$sql))
  {
  $rowcount=mysqli_num_rows($resultado);
}  
  
if($rowcount > 0){
echo "<script>
                window.location= 'index.html'
    </script>";
exit; 
} else {

echo "<script>
                alert('Datos incorrectos');
                window.location= 'login.html'
    </script>";
}
 
mysql_close($db_connection);
		
?>