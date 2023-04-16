<?php
set_include_path("/XAMPP/htdocs/EasyGame");
include_once("servers/connection.php");

$start = date("Y-m-d 00:00:00");
$end = date("Y-m-d 23:59:59");
if (isset($_GET['connection'])) {
    $query = "SELECT id FROM T_LIGHT WHERE date BETWEEN '{$start}' AND '{$end}' ORDER BY ID DESC LIMIT 1";
    $result = mysqli_query($con, $query);
    $result = mysqli_fetch_assoc($result);
    $result = $result['id'];
    echo $result;
} else if (isset($_GET['last'])) {
    $query = "SELECT value FROM T_LIGHT WHERE date BETWEEN '{$start}' AND '{$end}' ORDER BY ID DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($result);
    $result = $result['value'];
    echo $result;
} else if (isset($_GET['re1'])) {
    $query = " SELECT (UNIX_TIMESTAMP(date)*1000) AS time, IFNULL(value,'null') AS temp FROM T_LIGHT WHERE date BETWEEN '{$start}' AND '{$end}' ORDER BY time";
    $result = mysqli_query($con, $query);
    $total = mysqli_num_rows($result);
    if ($total > 0) {
        $count = 0;
        echo '[';
        while ($row = mysqli_fetch_assoc($result)) {
            echo  '[' . $row["time"] . ',' . $row["temp"] . ']';
            $count++;
            if ($count < $total) {
                echo ',';
            }
        }
        echo ']';
    } else {
        echo "[[],[]]";
    }
} else if (isset($_GET['re2'])) {
    $query = " SELECT (UNIX_TIMESTAMP(date)*1000) AS time, IFNULL(value,'null') AS temp FROM T_LIGHT WHERE date BETWEEN '{$start}' AND '{$end}' ORDER BY time DESC LIMIT 0,1";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    echo $row["time"] . ',' . $row["temp"];
}
