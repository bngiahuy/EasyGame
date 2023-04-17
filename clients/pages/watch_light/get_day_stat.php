<?php
set_include_path("/XAMPP/htdocs/EasyGame");
include_once 'servers/connection.php';
$start = date("Y-m-d 00:00:00");
$end = date("Y-m-d 23:59:59");

// GET MIN VALUE, DATE
$query = "SELECT value, date FROM T_LIGHT WHERE date BETWEEN '{$start}' AND '{$end}'";
$result = mysqli_query($conn, $query);

$min = 100;
$min_date = '';

while ($get = mysqli_fetch_assoc($result)) :
    if ($get['value'] < $min) {
        $min = $get['value'];
        $min_date = $get['date'];
    }
endwhile;

$min_date = date("H:i:s", strtotime($min_date));

// GET MAX VALUE, DATE
$query = "SELECT value, date FROM T_LIGHT WHERE date BETWEEN '{$start}' AND '{$end}'";
//echo $query;
$result = mysqli_query($conn, $query);
$max = -100;
$max_date = '';

while ($get = mysqli_fetch_assoc($result)) :
    if ($get['value'] > $max) {
        $max = $get['value'];
        $max_date = $get['date'];
    }
endwhile;

$max_date = date("H:i:s", strtotime($max_date));

// GET AVERAGE
$query = "SELECT AVG(value) AS ave FROM T_LIGHT WHERE date BETWEEN '{$start}' AND '{$end}'";
$result = mysqli_query($conn, $query);
$get = mysqli_fetch_assoc($result);
$ave = $get['ave'];
$ave = number_format($ave, 2);

if ($min == 100) {
    $min = '';
}
if ($max == -100) {
    $max = '';
}

echo $min . ',' . $min_date . ',' . $max . ',' . $max_date . ',' . $ave;
