<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<script src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>

<div id="point">
</div>

<script>
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawStacked);

function drawStacked() {
 var data = google.visualization.arrayToDataTable([
  ['City', 'Math', 'Physics', 'Chemistry'],
  ['Adam', 90, 95, 98],
  ['Ben', 85, 82, 90],
  ['charlie', 83, 78, 88],
  ['Doug', 75, 74, 80],
  ['Emley', 73, 64, 78]
 ]);

 var options = {
  title: 'Students Mark List',
  height: 350,
  chartArea: {
   width: '50%'
  },
  isStacked: 'percent',
  hAxis: {
   title: 'Total Marks',
   minValue: 0,
  },
  vAxis: {
   title: 'Students Name' 
  }
 };
 var chart = new google.visualization.BarChart(document.getElementById('point'));
 chart.draw(data, options);
}
</script>
</body>
</html>