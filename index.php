<?php include "db.php"; ?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <title>100 Percent Stacked Column Chart</title>
  <link href="https://playground.anychart.com/gallery/src/Column_Charts/100_Percent_Stacked_Column_Chart/iframe" rel="canonical">
  <meta content="Animation,Bar Chart,Column Chart,Multi-Series Chart,Percent Stacked Chart,Stacked Chart,Tooltip" name="keywords">
  <meta content="AnyChart - JavaScript Charts designed to be embedded and integrated" name="description">
  <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
  <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" rel="stylesheet" type="text/css">
  <style>html,
body,
#container {
  width: 95%;
  height: 95%;
  margin: 50px;
  padding: 0;
}</style>
 </head>
 <body>
  <div id="container"></div>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
  <script type="text/javascript">anychart.onDocumentReady(function () {
  // create data set on our data
  
  var dataSet = anychart.data.set([
    ['', 'number1', 'number2', 'number3'],
        <?php
        $query="select * from numpeo";
        $res=mysqli_query($conn,$query);
        while($data=mysqli_fetch_array($res)){
            $sub=$data['sub'];
            $number1=$data['number1'];
            $number2=$data['number2'];
            $number3=$data['number3'];
            ?>
        ['<?php echo $sub;?>','<?php echo $number1;?>','<?php echo $number2;?>','<?php echo $number3;?>'],
        <?php
        }
        ?>
  ]);

  // map data for the first series, take x from the zero column and value from the first column of data set
  var firstSeriesData = dataSet.mapAs({ x: 0, value: 1 });

  // map data for the second series, take x from the zero column and value from the second column of data set
  var secondSeriesData = dataSet.mapAs({ x: 0, value: 2 });

  // map data for the second series, take x from the zero column and value from the third column of data set
  var thirdSeriesData = dataSet.mapAs({ x: 0, value: 3 });

  // map data for the fourth series, take x from the zero column and value from the fourth column of data set
  // var fourthSeriesData = dataSet.mapAs({ x: 0, value: 4 });

  // create bar chart
  var chart = anychart.column();

  // turn on chart animation
  chart.animation(true);

  // force chart to stack values by Y scale.
  chart.yScale().stackMode('percent');

  // set chart title text settings
  chart.title('การลงทะเบียนของประชาการจังหวัดภูเก็ตแยกตามตำบล');

  // set yAxis labels formatting, force it to add % to values
  chart.yAxis(0).labels().format('{%Value}%');

  // helper function to setup label settings for all series
  var setupSeries = function (series, name) {
    series.name(name).stroke('2 #fff 1');
    series.hovered().stroke('2 #fff 1');
  };

  // temp variable to store series instance
  var series;

  // create first series with mapped data
  series = chart.column(firstSeriesData);
  setupSeries(series, 'จำนวนประชากรทั้งหมด');

  // create second series with mapped data
  series = chart.column(secondSeriesData);
  setupSeries(series, 'จำนวนคนที่ลงทะเบียนแล้ว');

  // create third series with mapped data
  series = chart.column(thirdSeriesData);
  setupSeries(series, 'คงเหลือ');

  // create fourth series with mapped data
  // series = chart.column(fourthSeriesData);
  // setupSeries(series, 'Nevada');

  chart.interactivity().hoverMode('by-x');
  chart.tooltip().titleFormat('{%X}').displayMode('union');

  // turn on legend
  chart.legend().enabled(true).fontSize(13);

  // set container id for the chart
  chart.container('container');

  // initiate chart drawing
  chart.draw();
});</script>
 </body>
</html>