<?php
set_include_path($_SERVER['DOCUMENT_ROOT'] . "/EasyGame");

// include_once 'servers/connection.php';
require_once("servers/Database.php");
$db = Database::getInstance();

// if (isset($_GET('table'))) {
$table = $_GET['table'];

$start = date("Y-m-d 00:00:00");
$end = date("Y-m-d 23:59:59");
$query = "SELECT * FROM {$table} WHERE date BETWEEN '{$start}' AND '{$end}' ORDER BY id DESC LIMIT 10";
$result = $db->query($query);
// $result = mysqli_query($conn, $query);

$number = 1;
while ($row = mysqli_fetch_assoc($result)) :

    echo "<tr>";
    echo "<td>{$number}</td>";
    //echo "<td>{$row['name']}</td>";
    echo "<td>{$row['value']}lux</td>";
    echo "<td>{$row['date']}</td>";
    echo "</tr>";
    $number += 1;
endwhile;
// }
