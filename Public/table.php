<?php
//set the db connection file
require_once 'dbconf.php';

try{
	//Query
	$sql = "SELECT * FROM student";

	//execute the query
	$result = mysqli_query($connect,$sql);

	//check if data exists in the table
	if(mysqli_num_rows($result)>0){
		//fetch the data from rows
		echo "<table border=1>";
		$col = mysqli_fetch_fields($result);
		//print the columns
		echo "<tr>";
		foreach($col as $value){
			//return object
			//print_r($value)
			echo "<td>$value->name</td>";
		}
		echo "</td>";

		while($row = mysqli_fetch_assoc($result)){
			//print the data in a table form
			echo "<tr>";
			foreach($row as $key => $value){
				echo "<td>$value</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}
	else{
		echo "No result";
	}
}
catch(Exception $e){
	die($e->getMessage());
}
?>