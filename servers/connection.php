<?php
$u_password = "";
$u_username = "root";
$host_name = "localhost";
$server_name = "EASYGAME_SMARTFARM";
$conn = new mysqli($host_name, $u_username, $u_password, $server_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>