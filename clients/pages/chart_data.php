<?php
set_include_path($_SERVER['DOCUMENT_ROOT'] . "/EasyGame");

// include_once("servers/connection.php");
require_once("servers/Database.php");
$db = Database::getInstance();

$start = date("Y-m-d 00:00:00");
$end = date("Y-m-d 23:59:59");

if (isset($_GET['table'])) {
    $table = $_GET['table'];
    $start = date("Y-m-d 00:00:00");
    $end = date("Y-m-d 23:59:59");
    if ($_GET['re'] == 1) {
        $query = " SELECT (UNIX_TIMESTAMP(date)*1000) AS time, IFNULL(value,'null') AS temp FROM T_LIGHT WHERE date BETWEEN '{$start}' AND '{$end}' ORDER BY time";
        // $result = mysqli_query($conn, $query);
        $result = $db->query($query);
        $total = $result->num_rows;
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
    } else {
        $query = " SELECT (UNIX_TIMESTAMP(date)*1000) AS time, IFNULL(value,'null') AS temp FROM T_LIGHT WHERE date BETWEEN '{$start}' AND '{$end}' ORDER BY time DESC LIMIT 0,1";
        // $result = mysqli_query($conn, $query);
        $result = $db->query($query);

        $row = mysqli_fetch_assoc($result);
        echo $row["time"] . ',' . $row["temp"];
    }
}
