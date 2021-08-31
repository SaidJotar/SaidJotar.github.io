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

$subs_name = utf8_decode($_POST['name']);
$subs_lastname = utf8_decode($_POST['lastname']);
$subs_email = utf8_decode($_POST['email']);
$subs_password = utf8_decode($_POST['password']);

if($subs_name == "" || $subs_lastname == "" || $subs_email == "" || $subs_password == ""){
 echo "<script>
			alert('You have to write your Name, LastName, E-mail and Password');
			window.location= 'registro.html'
</script>";
exit;
}

$sql="SELECT * FROM ".$db_table_name." WHERE email = '".$subs_email."'";
 

if ($resultado=mysqli_query($db_connection,$sql))
  {
  $rowcount=mysqli_num_rows($resultado);
}  
  
if($rowcount > 0){
echo "<script>
                alert('Eroor: Correo electrónico ya en uso');
                window.location= 'index.html'
    </script>";
exit; 
} else {
	
	$insert_value = 'INSERT INTO ' . $db_name . '.'.$db_table_name.' (lastname, password , name, email) VALUES ("' . $subs_lastname . '", "' . $subs_password . '", "' . $subs_name . '", "' . $subs_email . '")';
 
mysqli_select_db($db_connection, $db_name);
$retry_value = mysqli_query($db_connection, $insert_value);
 
if (!$retry_value) {
   die('Error: ' . mysqli_error($db_connection));
}
	
echo "<script>
                alert('En breves nos pondremos en contacto con usted');
                window.location= 'index.html'
    </script>";
}
 
mysql_close($db_connection);
		
?>
