<?php
set_include_path("/XAMPP/htdocs/EasyGame");
include_once 'servers/connection.php';
if (isset($_POST['table'])) {
    $table = $_POST['table'];

    $start = date("Y-m-d 00:00:00");
    $end = date("Y-m-d 23:59:59");
    // GET MIN VALUE, DATE
    // $query = "SELECT value, date FROM {$table} WHERE date BETWEEN '{$start}' AND '{$end}'";
    $query = "SELECT value, date from {$table} where value = (select min(value) from {$table}) and date BETWEEN '{$start}' AND '{$end}'";
    $result = mysqli_query($conn, $query);
    // $get = mysqli_fetch_assoc($result);
    $min = null;
    $min_date = null;
    if ($get = mysqli_fetch_assoc($result)) {
        $min = $get['value'];
        $min_date = $get['date'];
    }
    $min_date = date("H:i:s", strtotime($min_date));

    // $min = 100;
    // $min_date = '';

    // while ($get = mysqli_fetch_assoc($result)) :
    //     if ($get['value'] < $min) {
    //         $min = $get['value'];
    //         $min_date = $get['date'];
    //     }
    // endwhile;


    // GET MAX VALUE, DATE
    $query = "SELECT value, date from {$table} where value = (select max(value) from {$table}) and date BETWEEN '{$start}' AND '{$end}'";

    // $query = "SELECT value, date FROM {$table} WHERE date BETWEEN '{$start}' AND '{$end}'";
    //echo $query;
    $result = mysqli_query($conn, $query);
    $max = null;
    $max_date = null;
    if ($get = mysqli_fetch_assoc($result)) {
        $max = $get['value'];
        $max_date = $get['date'];
    }
    // $max = -100;
    // $max_date = '';

    // while ($get = mysqli_fetch_assoc($result)) :
    //     if ($get['value'] > $max) {
    //         $max = $get['value'];
    //         $max_date = $get['date'];
    //     }
    // endwhile;

    $max_date = date("H:i:s", strtotime($max_date));

    // GET AVERAGE
    $query = "SELECT AVG(value) AS ave FROM {$table} WHERE date BETWEEN '{$start}' AND '{$end}'";
    $result = mysqli_query($conn, $query);
    $get = mysqli_fetch_assoc($result);
    $ave = $get['ave'];
    $ave = number_format($ave, 2);
    echo $min . ',' . $min_date . ',' . $max . ',' . $max_date . ',' . $ave;
}
