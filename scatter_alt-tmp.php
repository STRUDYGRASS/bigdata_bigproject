<!DOCTYPE html>
<html>
    <head>
    <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
<?php
#header("Content-type: text/html; charset=utf-8");
set_time_limit(0);
$output = exec('scatter_alt-tmp.py');
echo "<script>
var data = ".$output.";
</script>";
?>
<script src="script/echarts.js"></script>
    </head>
    <body>
        <div id="test" style="width: 1000px;height:800px;">
        </div>

        <script>
// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('test'));
// var data = [[2,3,1],[3,4,1]];

// 指定图表的配置项和数据
var option = {
    animation: false,
    legend: {
        data: ['scatter']
    },
    tooltip: {
    },
    xAxis: {
        type: 'value',
        min: 'dataMin',
        max: 'dataMax',
        splitLine: {
            show: true
        }
    },
    yAxis: {
        type: 'value',
        min: 'dataMin',
        max: 'dataMax',
        splitLine: {
            show: true
        }
    },
    series: [
        {
            name: 'scatter',
            type: 'scatter',

            symbolSize: function (val) {
                return val[2] * 40;
            },
            data: data
        },
      
    ]
}

// 使用刚指定的配置项和数据显示图表。
myChart.setOption(option);
</script>       
    </body>
</html>