<?php
set_include_path($_SERVER['DOCUMENT_ROOT'] . "/EasyGame");
// include_once("servers/connection.php");
require_once("servers/Database.php");
$db = Database::getInstance();
$start = date("Y-m-d 00:00:00");
$end = date("Y-m-d 23:59:59");
if (isset($_GET['connection'])) {
    $query = "SELECT id FROM T_HUMID ORDER BY ID DESC LIMIT 1";
    $result = $db->query($query);
    $result = mysqli_fetch_assoc($result);
    $result = $result['id'];
    echo $result;
} else if (isset($_GET['last'])) {
    $query = "SELECT value FROM T_HUMID ORDER BY ID DESC LIMIT 1";
    $result = $db->query($query);
    $result = mysqli_fetch_assoc($result);
    $result = $result['value'];
    echo $result;
}
