<?php include "db.php"; ?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <title>100 Percent Stacked Bar Chart</title>
  <link href="https://playground.anychart.com/gallery/src/Bar_Charts/100_Percent_Stacked_Bar_Chart/iframe" rel="canonical">
  <meta content="Animation,Bar Chart,Bar Graph,Column Chart,Multi-Series Chart,Percent Stacked Chart,Stacked Chart,Tooltip,Vertical Chart" name="keywords">
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
  margin: 40px;
  padding: 0;
  margin-top: 20px;
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
//   var fourthSeriesData = dataSet.mapAs({ x: 0, value: 4 });

  // create bar chart
  var chart = anychart.bar();

  // turn on chart animation
  chart.animation(true);

  // force chart to stack values by Y scale.
  chart.yScale().stackMode('percent');

  // set chart title text settings
  chart.title('การลงทะเบียนของประชาการจังหวัดภูเก็ตแยกตามตำบล');

  // set yAxis labels formatting, force it to add % to values
  chart.yAxis(0).labels().format('{%Value}%');

  // helper function to setup label settings for all series
  var setupSeriesLabels = function (series, name) {
    series.name(name).stroke('3 #fff 1');
    series.hovered().stroke('3 #fff 1');
  };

  // temp variable to store series instance
  var series;

  // create first series with mapped data
  series = chart.bar(firstSeriesData);
  setupSeriesLabels(series, 'จำนวนประชากรทั้งหมด');

  // create second series with mapped data
  series = chart.bar(secondSeriesData);
  setupSeriesLabels(series, 'จำนวนคนที่ลงทะเบียนแล้ว');

  // create third series with mapped data
  series = chart.bar(thirdSeriesData);
  setupSeriesLabels(series, 'คงเหลือ');

  // create fourth series with mapped data
//   series = chart.bar(fourthSeriesData);
//   setupSeriesLabels(series, 'Nevada');

  // turn on legend
  chart.legend().enabled(true).fontSize(24).padding([0, 0, 15, 0]);

  chart.interactivity().hoverMode('by-x');

  chart.tooltip().displayMode('union').valuePrefix('$');

  // set container id for the chart
  chart.container('container');
  // initiate chart drawing
  chart.draw();
});</script>
 </body>
</html>