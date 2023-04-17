<?php
//header ("Content-type: text/json");
set_include_path("/XAMPP/htdocs/EasyGame");
include_once("servers/connection.php");

$start = date("Y-m-d 00:00:00");
$end = date("Y-m-d 23:59:59");
if ($_GET['re'] == 1) {
    $query = " SELECT (UNIX_TIMESTAMP(date)*1000) AS time, IFNULL(value,'null') AS temp FROM T_LIGHT WHERE date BETWEEN '{$start}' AND '{$end}' ORDER BY time";
    $result = mysqli_query($conn, $query);
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
}

if ($_GET['re'] == 2) {
    $query = " SELECT (UNIX_TIMESTAMP(date)*1000) AS time, IFNULL(value,'null') AS temp FROM T_LIGHT WHERE date BETWEEN '{$start}' AND '{$end}' ORDER BY time DESC LIMIT 0,1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    echo $row["time"] . ',' . $row["temp"];
}
