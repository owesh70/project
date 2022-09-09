<?php

$servername = "localhost";
$username = "diituser";
$password = "%TGBbgt5";
$dbname = "alpha";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
<a class="btn btn-dark" href="addform.php">add record</a>
<?php

  $sql ="select * from employees order by id desc"; 
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $records =$stmt->fetchAll();
    
   } catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
   }
$conn = null;
//echo "<pre>";
  //print_r($records);
//echo "</pre>";
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<table  class="table table-success table-striped">

	<thead>
	<th>id</th>
	<th>name</th>
	<th>contact_number</th>
	<th>addres</th>
	<th>salary</th>
	<th>emplloyees_id</th>
	<th>role</th>
	<th>update</th>
	<th>delete</th>
	</thead>
	<tbody>
<?php
foreach($records as $employees) {
	?>	
		<tr>
		<td><?php echo $employees['id']?></td>
		<td><?php echo $employees['name']?></td>
		<td><?php echo $employees['contact_number']?></td>
		<td><?php echo $employees['address']?></td>
		<td><?php echo $employees['salary']?></td>
		<td><?php echo $employees['employee_id']?></td>
		<td><?php echo $employees['role']?></td>
                <td><a class="btn btn-info" href="update.php?id=<?php echo $employees['id']?>">Update user</a></td>
		<td><a class="btn btn-danger" onclick="return confirm('are you sure want to delete this');" href="delete.php?id=<?php echo $employees['id']?>">delete </a></td>

		
		</tr>
<?php } ?>

	</tbody>





</table>
