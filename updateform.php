<?php

$servername = "localhost";
$username = "diituser";
$password = "%TGBbgt5";
$dbname = "alpha";
$id = $_REQUEST['id'];

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $id = $_REQUEST['id'];
  $sql = "SELECT * FROM employees WHERE id = $id";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $emps=$stmt->fetch();

   } catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
   }
$conn = null;

?>

<form action="onupdate.php">
<input type="text" placeholder="Id" value="<?php echo $emps['id']; ?>" name="id" readonly> <br>
<input type="text" placeholder="Name" value="<?php echo $emps['name'];?>" name="name"> <br>
<input type="text" placeholder="Contact Number" value="<?php echo $emps['contact_number']; ?>" name="contact_number"> <br>
<input type="text" placeholder="Address" value="<?php echo $emps['address'];?>" name="address"> <br>
<input type="text" placeholder="Salary" value="<?php echo $emps['salary']; ?>" name="salary"> <br>
<input type="text" placeholder="Employee Id" value="<?php echo $emps['employee_id']; ?>" name="employee_id"> <br>
<input type="text" placeholder="Role" value="<?php echo $emps['role']; ?>" name="role"> <br>
<input type="submit" value="Update">
</form>

~                                                     