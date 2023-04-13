<?php
    	include "../../servers/connection.php";

    if(!empty($_POST['datasend']))
    { 
        $datasend1=$_POST['datasend'];
	    $value_mahoa=explode(";",$datasend1);

        $x1=$value_mahoa[0];
        $x2=$value_mahoa[1];
        $x3=$value_mahoa[2];
        $x4=$value_mahoa[3];
        $x5=$value_mahoa[4];
        $x6=$value_mahoa[5];
        $x7=$value_mahoa[6];
        $x8=$value_mahoa[7];
        $x9=$value_mahoa[8];
        $x10=$value_mahoa[9];

        $sql = "UPDATE status SET Den1 = $x1";
        if ($conn->query($sql) === TRUE) {};
        $sql = "UPDATE status SET Ps1 = $x2";
        if ($conn->query($sql) === TRUE) {};
        $sql = "UPDATE status SET Bom1 = $x3";
        if ($conn->query($sql) === TRUE) {};
        $sql = "UPDATE status SET Rc1 = $x4";
        if ($conn->query($sql) === TRUE) {};

        // $sql = "UPDATE display SET Rain1 = $x5";
        // if ($conn->query($sql) === TRUE) {};
        $sql = "UPDATE display SET Temperature1 = $x6";
        if ($conn->query($sql) === TRUE) {};
        $sql = "UPDATE display SET Humidity1 = $x7";
        if ($conn->query($sql) === TRUE) {};
        $sql = "UPDATE display SET Light1 = $x8";
        if ($conn->query($sql) === TRUE) {};
        $sql = "UPDATE display SET Mois1 = $x9";
        if ($conn->query($sql) === TRUE) {};

        date_default_timezone_set('Asia/Jakarta');
        $d = date("Y/m/d-H:i:s");
   
        $sql = "INSERT INTO temperature1 (value,date) VALUES ('".$x6."','".$d."')"; 
        if ($conn->query($sql) === TRUE) {
            echo "OK";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        };

        $sql = "INSERT INTO humidity1 (value,date) VALUES ('".$x7."','".$d."')"; 
        if ($conn->query($sql) === TRUE) {
            echo "OK";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        };

        $sql = "INSERT INTO light1 (value,date) VALUES ('".$x8."','".$d."')"; 
        if ($conn->query($sql) === TRUE) {
            echo "OK";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        };

        $sql = "INSERT INTO mois1 (value,date) VALUES ('".$x9."','".$d."')"; 
        if ($conn->query($sql) === TRUE) {
            echo "OK";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        };
	}
	$conn->close();
