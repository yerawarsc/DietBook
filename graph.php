<!-- Styles -->
<style>
#chartdiv {
    width   : 100%;
    height  : 500px;
}                                   
</style>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/none.js"></script>

<!-- Chart code -->

<?php require 'demo.php';
            require 'fnneed.php';


            //echo $_SESSION['email'];
            $var=$col->find(array("email" => $_SESSION['email']),array('_id'=> 0,'date'=> 1,'mistake' => 1));
            $demo=json_encode(iterator_to_array($var));



        ?>



<script>
var chart = AmCharts.makeChart("chartdiv", {
    "type": "serial",
    "theme": "none",
    "marginRight": 80,
    "marginTop": 17,
    "autoMarginOffset": 20,
    "dataProvider": 
        
         
            <?php echo $demo;?>,
            








    
    "valueAxes": [{
        "logarithmic": true,
        "dashLength": 1,
        "guides": [{
            "dashLength": 6,
            "inside": true,
            "label": "average",
            "lineAlpha": 1,
            "value": 90.4
        }],
        "position": "left"
    }],
    "graphs": [{
        "bullet": "round",
        "id": "g1",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "bulletSize": 7,
        "lineThickness": 2,
        "title": "mistake",
        "type": "smoothedLine",
        "useLineColorForBulletBorder": true,
        "valueField": "mistake"
    }],
    "chartScrollbar": {},
    "chartCursor": {
        "valueLineEnabled": true,
        "valueLineBalloonEnabled": true,
        "valueLineAlpha": 0.5,
        "fullWidth": true,
        "cursorAlpha": 0.05
    },
    "dataDateFormat": "DD-MM-YYYY",
    "categoryField": "date",
    "categoryAxis": {
        "parseDates": true
    },
    "export": {
        "enabled": true
    }
});

//chart.addListener("dataUpdated", zoomChart);

/*function zoomChart() {
    chart.zoomToDates(new Date(2012, 2, 2), new Date(2012, 2, 10));
}*/
</script>

<!-- HTML -->
<div id="chartdiv"></div>