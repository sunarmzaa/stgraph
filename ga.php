<?php include "db.php"; ?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <title>100 Percent Stacked Area Chart</title>
  <link href="https://playground.anychart.com/NXLgiQ7p/iframe" rel="canonical">
  <meta content="Animation,Area Chart,Multi-Series Chart,Percent Stacked Chart,Stacked Chart,Tooltip,Column Chart,Vertical Chart,Bar Chart,Bar Graph" name="keywords">
  <meta content="AnyChart - JavaScript Charts designed to be embedded and integrated" name="description">
  <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
  <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css?hcode=be5162d915534272a57d0bb781d27f2b" rel="stylesheet" type="text/css">
  <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css?hcode=be5162d915534272a57d0bb781d27f2b" rel="stylesheet" type="text/css">
  <style>html, body, #container {
    width: 90%;
    height: 93%;
    margin: 40px;
    padding: 0;
}</style>
 </head>
 <body>
  <div id="container"></div>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js?hcode=be5162d915534272a57d0bb781d27f2b"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js?hcode=be5162d915534272a57d0bb781d27f2b"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js?hcode=be5162d915534272a57d0bb781d27f2b"></script>
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

    // map data for the first series, take x from the zero area and value from the first area of data set
    var seriesData_1 = dataSet.mapAs({'x': 0, 'value': 1});

    // map data for the second series, take x from the zero area and value from the second area of data set
    var seriesData_2 = dataSet.mapAs({'x': 0, 'value': 2});

    // map data for the second series, take x from the zero area and value from the third area of data set
    var seriesData_3 = dataSet.mapAs({'x': 0, 'value': 3});

    // map data for the fourth series, take x from the zero area and value from the fourth area of data set
    // var seriesData_4 = dataSet.mapAs({'x': 0, 'value': 4});
  
    // var seriesData_5 = dataSet.mapAs({'x': 0, 'value': 5});

    // create bar chart
    var chart = anychart.bar();

    // turn on chart animation
    chart.animation(true).barGroupsPadding(0.5);

    // force chart to stack values by Y scale.
    chart.yScale().stackMode('percent');
chart.labels().enabled(true).position("center-center").offsetX(30).offsetY(-15);
  // chart.labels().format('{%value}{decimalsCount:0}%').fontColor('white')
  chart.labels().format('{%value}{decimalsCount:0} คน').fontColor('black')

    var crosshair = chart.crosshair();
    // turn on the crosshair
    crosshair.enabled(true)
            .yStroke(null)
            .xStroke('#fff')
            .zIndex(99);
    crosshair.yLabel().enabled(false);
    crosshair.xLabel().enabled(false);

    // set chart title text settings
    chart.title('การลงทะเบียนของประชาการจังหวัดภูเก็ตแยกตามตำบล');
    chart.title().padding([0, 0, 10, 0]);

    // set yAxis labels formatting, force it to add % to values
    chart.yAxis(0).labels().format("{%Value}%");

    // helper function to setup label settings for all series
    var setupSeries = function (series, name, color) {
        series.name(name)
                 .stroke('1 #fff 1')
                .fill(color);
    };

    // temp variable to store series instance
    var series;

    // create first series with mapped data
    // series = chart.bar(seriesData_5);
    // setupSeries(series, 'จำนวนประชากรทั้งหมด', '#083D77 0.8');
	
    // create second series with mapped data
    // series = chart.bar(seriesData_4);
    // setupSeries(series, 'Agree', '#59A9FF  0.8');

    // create third series with mapped data
    series = chart.bar(seriesData_3);
    setupSeries(series, 'คงเหลือ', '#33CCFF 0.5');

    // create fourth series with mapped data
    series = chart.bar(seriesData_2);
    setupSeries(series, 'จำนวนคนที่ลงทะเบียนแล้ว', '#EE964B 0.8');

        // create fourth series with mapped data
    series = chart.bar(seriesData_1);
    setupSeries(series, 'จำนวนประชากรทั้งหมด' , '#98FB98 0.8');
    // set interactivity and toolitp settings
    // chart.interactivity().hoverMode('by-x');
    // chart.tooltip().displayMode('union');

    // turn on legend
    chart.legend()
            .enabled(true)
            .fontSize(22)
            .padding([0, 0, 20, 0]);

    // set container id for the chart
    chart.container('container');
	 var axisLabels = chart.xAxis().labels();
  axisLabels.useHtml(true);
  axisLabels.format("<span style='color:black;'>{%value}</span>");
    // initiate chart drawing
    chart.draw();
});</script>
 </body>
</html>