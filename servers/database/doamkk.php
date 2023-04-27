<?php
require_once("../Database.php");
$db = Database::getInstance();
$query = "SELECT * from DISPLAY";
$result = $db->query($query);
while ($row = $result->fetch_assoc()) {
	echo $row["Humidity"] . "%";
};
