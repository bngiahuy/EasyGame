<?php
include "../connection.php";

$query = "SELECT * from CONTROL";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
	if ($row["Den1"] == "1") $den1 = "den1_on";
	if ($row["Den1"] == "0") $den1 = "den1_off";
	if ($row["Ps1"] == "0")   $ps1 = "ps1_off";
	if ($row["Ps1"] == "1")   $ps1 = "ps1_on";
	if ($row["Bom1"] == "1") $bom1 = "bom1_on";
	if ($row["Bom1"] == "0") $bom1 = "bom1_off";
	if ($row["Rc1"] == "0")   $rc1 = "rc1_off";
	if ($row["Rc1"] == "1")   $rc1 = "rc1_on";
};


$query = "SELECT * from AUTO";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
	$t1 = $row["Temperature"];

	$h1 = $row["Humidity"];

	$l1 = $row["Light"];

	$m1 = $row["Mois"];
};

// $query = "SELECT * from mode";
// $result = $conn->query($query);

// while ($row = $result->fetch_assoc()) {
// 	$mode1 = $row["Mode1"];
// 	if ($mode1 == 1) {
// 		$mode1 = "auto1";
// 	} elseif ($mode1 == 0) {
// 		$mode1 = "manual1";
// 	};

// 	$mode2 = $row["Mode2"];
// 	if ($mode2 == 1) {
// 		$mode2 = "auto2";
// 	} elseif ($mode2 == 0) {
// 		$mode2 = "manual2";
// 	}
// };



// echo $den1 . $ps1 . $bom1 . $rc1 . $den2 . $ps2 . $bom2 . $rc2 . $mode1 . $mode2 . '?' . $t1 . ';' . $h1 . ';' . $l1 . ';' . $m1 . ',' . $t2 . ';' . $h2 . ';' . $l2 . ';' . $m2 . ';' . $mode1 . ';' . $mode2;

echo $den1 . $ps1 . $bom1 . $rc1 . '?' . $t1 . ';' . $h1 . ';' . $l1 . ';' . $m1;
