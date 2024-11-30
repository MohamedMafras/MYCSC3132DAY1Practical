
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
				<td align="right">Course:</td>
				<td align="right">
					<select name="gender">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						
					</select>
				</td>
			</tr>
			<tr>
				<td align="right">Course:</td>
				<td>
					<select name="course">
						<option value="Computer Science">Computer Science</option>
						<option value="Information Technology">Information Technology</option>
						<option value="Cyber Security  ">Cyber Security</option>
                        <option value=" Data Science ">Data Science </option>
                        <option value="Software Engineering">Software Engineering</option>
					</select>
				</td>
			</tr>
            <tr>
                <td align="right">Enrollment_Date :</td>
                <td><input type="Date" name="enrollment_Date"/></td>
            </tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Add a new student" /></td>
			</tr>
		</table>
	</form>
	<?php
	require_once 'dbconf.php';
	function AddData($connect,$id,$name,$age,$gender,$course,$enrollment_Date){
		try {
		//Query
			$sql = "INSERT INTO STUDENTS VALUES('$id','$name','$age','$gender','$course','$enrollment_Date')";
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
		$id = $_POST['idno'];
		$name = $_POST['name'];
		$age = $_POST['age'];
		$course = $_POST['course'];
        $enrollment_Date = $_POST['enrollment_Date'];
		AddData($connect,$id,$name,$age,$course,$enrollment_Date);
	}
	//display the table
	//echo "Hello";
	//insert data into student table

	?>

</body>
</html>
