<!DOCTYPE html>
<html>
<body>

date: <input type="text" name="input_date">
close: <input type="text" name="input_close">

<button onclick="myFunction()">Submit</button>

<p id="demo"></p>

<?php
function myFunction() {
    var d = document.getElementById("input_date").value;
    var c = document.getElementById("input_close").value;
    document.getElementById("demo").innerHTML = x;
}
?>

</body>
</html>
