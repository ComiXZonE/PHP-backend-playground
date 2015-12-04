<!DOCTYPE html>
<meta charset="utf-8">
<style>
body {
  font: 10px sans-serif;
}
.axis path,
.axis line {
  fill: none;
  stroke: #000;
  shape-rendering: crispEdges;
}
.x.axis path {
  display: yes;
}
.line {
  fill: none;
  stroke: darkblue;
  stroke-width: 1.5px;
}

/*properties of filling below the line*/
.area {
  fill: lightsteelblue;
  stroke-width: 0;
}

/*properties of grid*/
.grid .tick {
    stroke: lightgrey;
    stroke-opacity: 0.7;
    shape-rendering: crispEdges;
}
.grid path {
          stroke-width: 0;
}
</style>
<body>
<script src="//d3js.org/d3.v3.min.js"></script>
<script>
setTimeout(function(){ window.location.reload(); }, 3000);
var margin = {top: 20, right: 20, bottom: 30, left: 50},
    width = 960 - margin.left - margin.right,
    height = 500 - margin.top - margin.bottom;

var parseDate = d3.time.format("%H:%M:%S").parse;

var x = d3.time.scale()
    .range([0, width]);

var y = d3.scale.linear()
    .range([height, 0]);

var xAxis = d3.svg.axis()
    .scale(x)
    .orient("bottom").
    ticks(30);

var yAxis = d3.svg.axis()
    .scale(y)
    .orient("left");

var area = d3.svg.area()
    .x(function(d) { return x(d.date); })
    .y0(height)
    .y1(function(d) { return y(d.close); });

var line = d3.svg.line()
    .x(function(d) { return x(d.date); })
    .y(function(d) { return y(d.close); });

var svg = d3.select("body").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
  .append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

function make_x_axis() {    
    return d3.svg.axis()
        .scale(x)
        .orient("bottom")
        .ticks(20)
}

function make_y_axis() {    
    return d3.svg.axis()
        .scale(y)
        .orient("left")
        .ticks(10)
}

var d = {
  <?php

     $con=mysqli_connect("localhost","root","","db");
      // Check connection
     if (mysqli_connect_errno())
      {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

     $result = mysqli_query($con,"SELECT date, close FROM graph");

     while($row = mysqli_fetch_array($result)) {
       // $array_push($array,$row['date'], $row['close']);
      echo json_encode($row['date']);
      echo json_encode($row['close']);
      }

     mysqli_close($con); 
   ?>
}



d3.csv("brojevi1.csv", function(error, data) {
  if (error) throw error;
  data.forEach(function(d) {
    d.date = parseDate(d.date);
    d.close = +d.close;
  });

  x.domain(d3.extent(data, function(d) { return d.date; }));
  y.domain(d3.extent(data, function(d) { return d.close; }));

  svg.append("path")
        .datum(data)
        .attr("class", "area")
        .attr("d", area);

  svg.append("g")
      .attr("class", "x axis")
      .attr("transform", "translate(0," + height + ")")
      .call(xAxis);

  svg.append("g")
      .attr("class", "y axis")
      .call(yAxis)
    .append("text")
      .attr("transform", "rotate(-90)")
      .attr("y", 6)
      .attr("dy", ".71em")
      .style("text-anchor", "end")
      .text("value");
  svg.append("path")
      .datum(data)
      .attr("class", "line")
      .attr("d", line);

/*drawing grid*/
  svg.append("g")     
      .attr("class", "grid")
      .attr("transform", "translate(0," + height + ")")
      .call(make_x_axis()
          .tickSize(-height, 0, 0)
          .tickFormat("")
        )
    svg.append("g")     
        .attr("class", "grid")
        .call(make_y_axis()
          .tickSize(-width, 0, 0)
          .tickFormat("")
        )
});
</script>