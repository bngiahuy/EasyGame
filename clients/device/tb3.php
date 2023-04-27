<?php
	set_include_path($_SERVER['DOCUMENT_ROOT'] . "/EasyGame");
	include("servers/language/config.php");
	require_once("servers/Database.php");
	$db = Database::getInstance();	
	$query ="SELECT * from status";					
	$result = $db->query($query);	
	while($row = $result->fetch_assoc()) 
	{	
       	$t=$row["Ps1"] ;
	};
	if($t==0){echo $lang3['dangtat'];};
	if($t==1){echo $lang3['dangbat'];};
