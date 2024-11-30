
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form action="addData.php" method="POST">
		<table>
			<tr>
				<td align="right">Registration Number:</td>
				<td><input type="text" name="id" /></td>
			</tr>
			<tr>
				<td align="right">Name:</td>
				<td><input type="text" name="name" /></td>
			</tr>
			<tr>
				<td align="right">Age:</td>
				<td><input type="number" name="age" /></td>
			</tr>
            <tr>
                <td align="right">Gender:</td>
                <td><input type="text" name="gender"/></td>
            </tr>
			<tr>
				<td align="right">Course:</td>
				<td><input type="text" name="course"/>
				</td>
			</tr>
            <tr>
                <td align="right">ENrollment_Date :</td>
                <td><input type="Date"/></td>
            </tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Add a new student" /></td>
			</tr>
		</table>
	</form>
	<?php
	require_once 'dbconf.php';
	function AddData($connect,$reg,$name,$age,$course){
		try {
		//Query
			$sql = "INSERT INTO STUDENTS VALUES('$reg','$name',$age,'$course')";
			//echo "$sql";
		//excute the quey
			$result = mysqli_query($connect,$sql);
			if ($result) {
				echo "New student record created sucessfully";
			} else {
				die("Error ".mysqli_error($connect));
			}

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		//echo "Got the POST request from client";
		$reg = $_POST['regno'];
		$name = $_POST['name'];
		$age = $_POST['age'];
		$course = $_POST['course'];
		AddData($connect,$reg,$name,$age,$course);
	}
	//display the table
	//echo "Hello";
	//insert data into student table

	?>

</body>
</html>
