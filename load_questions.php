<?php
include 'config.php';

$year = $_GET['year'];
$category = $_GET['category'];

$sqlget = "SELECT * FROM addque WHERE year = '$year' AND category = '$category' ORDER BY id";
$sqldata = mysqli_query($conn, $sqlget) or die("error");

echo "<table>";
echo "<tr><th>No</th>
<th>Questions</th>
<th>Action</th></tr>";

$curricularCounter = 1;

while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
  $id= $row['id'];
  $category = $row['category'];
  if ($category === 'carricular') {
 echo "<tr>";
 echo "<td>" . $curricularCounter . "</td>";
 echo "<td>"  .$row['question']."</td>";

 echo '<td> <button class="btn btn-primary"> <a href="edit.php?editid='.$id.'"  class="text-light">' .'Edit</a></button> 
 <button class="btn btn-danger"> <a href="delete.php?deleteid='.$id.'"  class="text-light">' .'Delete</a></button></td>';
 
 echo "</tr>";
 $curricularCounter++; 
}
}
echo "</table>";

mysqli_close($conn);
?>
