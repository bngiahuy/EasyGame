<?php
include "../connection.php";

$query = "SELECT * from mode";
$result = $conn->query($query);
while ($row = $result->fetch_assoc()) {
	$x = $row["Mode1"];
}
///

if (isset($_POST['ON1']))		// If press OFF
{
	echo $x;
	if ($x == 0) {
		$x = 1;
	} else {
		$x = 0;
	};
	echo $x;
	$sql = "UPDATE mode SET Mode1 = $x";
	if ($conn->query($sql) === TRUE) {
	}
}
header('Location: ../template1.php');
