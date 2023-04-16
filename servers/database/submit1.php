<?php
if (isset($_POST["submit"])) {
  $t2 = $_POST["t2"];
  $l2 = $_POST["l2"];
  $h2 = $_POST["h2"];
  $m2 = $_POST["m2"];

  include "../connection.php";

  $sql = "UPDATE auto SET Temperature1 = $t2";
  if ($conn->query($sql) === TRUE) {
  }

  $sql = "UPDATE auto SET Light1 = $l2";
  if ($conn->query($sql) === TRUE) {
  }

  $sql = "UPDATE auto SET Humidity1 = $h2";
  if ($conn->query($sql) === TRUE) {
  }

  $sql = "UPDATE auto SET Mois1 = $m2";
  if ($conn->query($sql) === TRUE) {
  }

  header('Location: ../index.php');
}
