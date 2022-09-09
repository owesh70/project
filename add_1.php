<?php
$servername = "localhost";
$username = "diituser";
$password = "%TGBbgt5";
$dbname = "alpha";

 $name = $_REQUEST['name'];
 $contact = $_REQUEST['contact_number'];
 $address = $_REQUEST['addres'];
 $salary = $_REQUEST['salary'];
 $emp_id = $_REQUEST['employees_id'];
 $role = $_REQUEST['role'];

 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //$sql = " INSERT INTO employees (id, name, contact_number, address, salary, employee_id, role, created_at, updated_at) VALUES (null, '$name',$contact, '$address', $salary, '$emp_id', '$role', NOW(), NOW())";
 $sql = "INSERT INTO employees(id,name,contact_number,address,salary,employee_id,role,created_at,updated_at) VALUES (NULL,'$name',$contact,'$address',$salary,$emp_id,'$role',NOW(),NOW())";

 $stmt = $conn->prepare($sql);
 $stmt->execute();





 $conn = null;
 header("location: index.php");
