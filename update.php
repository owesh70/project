<?php
$servername = "localhost";
$username = "diituser";
$password = "%TGBbgt5";
$dbname = "alpha";
$id = $_REQUEST['id'];
$name = $_REQUEST['name'];
$cnum = $_REQUEST['contact_number'];
$address = $_REQUEST['address'];
$sal = $_REQUEST['salary'];
$empid = $_REQUEST['employee_id'];
$role = $_REQUEST['role'];

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql =  "UPDATE employees SET name='$name',contact_number=$cnum,address='$address',salary=$sal,employee_id=$empid,role='$role',updated_at=NOW() WHERE id = $id";
  $stmt = $conn->prepare("$sql");
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $emps=$stmt->fetch();
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
header("Location:http://ciacloud.in/owesh/nikhil/phpcrudapp/listing.php");
?>