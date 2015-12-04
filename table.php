<?php
$con=mysqli_connect("localhost","root","","db");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT date, close FROM graph");

echo "<table border='1'>
<tr>
<th>Date</th>
<th>Close</th>
</tr>";

 while($row = mysqli_fetch_array($result))
 {
 echo "<tr>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $row['close'] . "</td>";
  echo "</tr>";
 }
echo "</table>";

mysqli_close($con);
?> 