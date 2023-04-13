<?php
if(!isset($_SESSION["username"]))
 {
	header("Location: ../dashboard/index.php");
 }
