<!DOCTYPE HTML>
<html> 
<body>

<form action="" method="post">
date: <input type="text" name="dateIn"><br>
close: <input type="text" name="closeIn"><br>
<input type="submit">
</form>

<?php 
  $a = $_POST["dateIn"]; 
  $b = $_POST["closeIn"]; 
  $file = 'brojevi1.csv';
  // Open the file to get existing content
  $current = file_get_contents($file);
  // Append a new person to the file
  $current .= "\n";
  $current .= $a;
  $current .= ",";
  $current .= $b;
  // Write the contents back to the file
  file_put_contents($file, $current);
?>

</body>
</html>

