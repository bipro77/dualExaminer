<?php
session_start();

		$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "test";
	$tbl_name="user"; // Table name 

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
		$sql = "SELECT * FROM students WHERE student_id = ".$_GET['id'];
		// echo $sql;
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  	 echo "<table width='20%'>
  	 <tr><th>ID</th><th>Name</th><th>Course1</th><th>Course2</th><th>Course3</th></tr>";

  	$c1_result = ($row["t1_c1_ct"]+$row["t1_c1_final"]+$row["t2_c1_ct"]+$row["t2_c1_final"])/2;
  	$c2_result = ($row["t1_c2_ct"]+$row["t1_c2_final"]+$row["t2_c2_ct"]+$row["t2_c2_final"])/2;
  	$c3_result = ($row["t1_c3_ct"]+$row["t1_c3_final"]+$row["t2_c3_ct"]+$row["t2_c3_final"])/2;


    // echo "id: " . $row["student_id"]. " - Name: " . $row["name"]. 
    // " Course 1: " . $c1_result. "<br>";
    echo "<tr>
    <td>".$row["student_id"]."</td> &nbsp;
    <td>".$row["name"]."</td> &nbsp;
    <td>".$c1_result."</td> &nbsp;
    <td>".$c2_result."</td> &nbsp;
    <td>".$c3_result."</td>

    </tr>";

     echo "</table>";
  }
} else {
  echo "0 results";
}



	
 ?>