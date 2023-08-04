<?php

$conn = mysqli_connect("localhost", "root", "", "testing") or("Connection failed");

if(isset($_POST['date1']) && isset($_POST['date2'])) {
   $min = $_POST['date1'];
   $max = $_POST['date2'];

   $sql = "SELECT * FROM student WHERE dob BETWEEN '{$min}' AND '{$max}'";

}else{
    $sql = "SELECT * FROM student ORDER BY id asc";
}

$result = mysqli_query($conn, $sql) or("Query failed");

$output = "";

if(mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {

    $dob = date('d M, Y', strtotime($row['dob']));
    $output .= "<tr> 
               <td>{$row['id']}</td>
               <td>{$row['stu_name']}</td>
               <td>{$row['last_name']}</td>
               <td>{$row['Age']}</td>
               <td>{$row['City']}</td>
               <td>{$dob}</td>
            </tr>";
  }
  echo $output;
}else {
    echo "No Record Found.";
}









?>