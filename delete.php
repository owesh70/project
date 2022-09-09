<?php

$servername = "sql213.epizy.com";
$username = "epiz_32480368";
$password = "Tw81ugogHKlafko";
$dbname = "epiz_32480368_mdms";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $id = $_REQUEST['id'];
  $sql = "DELETE FROM medicines WHERE id = $id";
  $conn->exec($sql);
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

$conn = null;

header("location:listing.php");
