<?php
session_start();
$_SESSION['lang'] = "listname";
require_once $_SESSION['lang'] . ".php";
