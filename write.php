<!DOCTYPE html>
<html>
<body>

date: <input type="text" id="input_date">
close: <input type="text" id="input_close">

<button onclick="myFunction()">Submit</button>

<p id="demo"></p>

<script>
function myFunction() {
    var d = document.getElementById("input_date").value;
    var c = document.getElementById("input_close").value;
    <?php
      $f = fopen("brojevi1.csv", "w");
      $s = $d + "," + $c;
      echo $s;
      fwrite($f, $s); 
      fclose($f);
    ?>
}

</script>
</body>
</html>
