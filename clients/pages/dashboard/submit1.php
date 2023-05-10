<?php
set_include_path($_SERVER['DOCUMENT_ROOT'] . "/EasyGame");
require_once("servers/Database.php");
$db = Database::getInstance();
if (isset($_POST["auto_submit"])) {
    $t2 = $_POST["t2"];
    $l2 = $_POST["l2"];
    $h2 = $_POST["h2"];
    $m2 = $_POST["m2"];


    $sql = "UPDATE AUTO SET Temperature = $t2";
    if ($db->query($sql) === TRUE) {
    }

    $sql = "UPDATE AUTO SET Light = $l2";
    if ($db->query($sql) === TRUE) {
    }

    $sql = "UPDATE AUTO SET Humidity= $h2";
    if ($db->query($sql) === TRUE) {
    }

    $sql = "UPDATE AUTO SET Mois = $m2";
    if ($db->query($sql) === TRUE) {
    }

    $sql = "UPDATE DISPLAY SET Temperature = $t2";
    if ($db->query($sql) === TRUE) {
    }

    $sql = "UPDATE DISPLAY SET Light = $l2";
    if ($db->query($sql) === TRUE) {
    }

    $sql = "UPDATE DISPLAY SET Humidity= $h2";
    if ($db->query($sql) === TRUE) {
    }

    $sql = "UPDATE DISPLAY SET Mois = $m2";
    if ($db->query($sql) === TRUE) {
    }
    $query = "SELECT `Manual_mode` from CONTROL";
    $result = $db->query($query);
    while ($row = $result->fetch_assoc()) {
        $mode = $row["Manual_mode"];
    }

    $sql = "UPDATE CONTROL SET Manual_mode = 1";
    if ($result = $db->query($sql)) {
        header("Location: index.php");
        exit();
    }
}
