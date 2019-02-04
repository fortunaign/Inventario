<?php
$server = "127.0.0.1";$user = "root";$pass = "";$database = "farmacia";
$mysqli = new mysqli($server, $user, $pass, $database);
if($mysqli->connect_error){
    exit('sin conexion!');
}
?>