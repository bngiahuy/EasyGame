<?php
// require_once("../connection.php");
require_once("../Database.php");
if (!empty($_POST['datasend'])) {
    $db = Database::getInstance();
    // $conn = $db->getConnection();
    // datasend=1;1;1;0;0;0;0;4;34
    // den1_offps1_offbom1_offrc1_offauto1?25;95;200;80;auto1
    // String data = status_10 + ";" + status_9 + ";" + status_8 + ";" + status_7 + ";" + rain + ";" + String(t) + ";" + String(h) + ";" + String(lux) + ";" + String(mois);

    $datasend = $_POST['datasend'];
    $value_mahoa = explode(";", $datasend);

    $x1 = $value_mahoa[0]; // status_10
    $x2 = $value_mahoa[1]; // status_9
    $x3 = $value_mahoa[2]; // status_8
    $x4 = $value_mahoa[3]; // status_7
    $x5 = $value_mahoa[4]; // rain (not used/ignore)
    $x6 = $value_mahoa[5]; // String(t)
    $x7 = $value_mahoa[6]; // String(h)
    $x8 = $value_mahoa[7]; // String(lux)
    $x9 = $value_mahoa[8]; // String(mois)

    $sql = "UPDATE STATUS SET Trang_thai_den = $x1";
    if ($result = $db->query($sql)) {
        // $result->free_result();
    }

    $sql = "UPDATE STATUS SET Trang_thai_phunsuong = $x2";
    if ($result = $db->query($sql)) {
        // $result->free_result();
    }

    $sql = "UPDATE STATUS SET Trang_thai_maybom = $x3";
    if ($result = $db->query($sql)) {
        // $result->free_result();
    }

    $sql = "UPDATE STATUS SET Trang_thai_RC = $x4";
    if ($result = $db->query($sql)) {
        // $result->free_result();
    }


    $sql = "UPDATE DISPLAY SET Temperature = $x6";
    if ($result = $db->query($sql)) {
        // // $result->free_result();
    }

    $sql = "UPDATE DISPLAY SET Humidity = $x7";
    if ($result = $db->query($sql)) {
        // $result->free_result();
    }

    $sql = "UPDATE DISPLAY SET Light = $x8";
    if ($result = $db->query($sql)) {
        // $result->free_result();
    }

    $sql = "UPDATE DISPLAY SET Mois = $x9";
    if ($result = $db->query($sql)) {
        // $result->free_result();
    }

    date_default_timezone_set('Asia/Jakarta');
    $d = date("Y/m/d-H:i:s");



    // $sql = "INSERT INTO DEVICE_DATA VALUES ()";

    $sql = "INSERT INTO T_TEMPERATURE (value,date) VALUES ('" . $x6 . "','" . $d . "')";
    if ($result = $db->query($sql)) {
        echo "OK";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    };

    $sql = "INSERT INTO T_HUMID (value,date) VALUES ('" . $x7 . "','" . $d . "')";
    if ($result = $db->query($sql)) {
        echo "OK";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    };

    $sql = "INSERT INTO T_LIGHT (value,date) VALUES ('" . $x8 . "','" . $d . "')";
    if ($result = $db->query($sql)) {
        echo "OK";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    };

    $sql = "INSERT INTO T_MOISTURE (value,date) VALUES ('" . $x9 . "','" . $d . "')";
    if ($result = $db->query($sql)) {
        echo "OK";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    };
}
// $conn->close();
