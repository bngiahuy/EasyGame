<?php
set_include_path($_SERVER['DOCUMENT_ROOT'] . "/EasyGame");

include "servers/language/config.php";
if (!isset($_SESSION["username"])) {
    header("Location: ../../index.php");
}
require_once("servers/Database.php");
$db = Database::getInstance();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <title><?php echo $lang1['vuon1'] ?></title>
    <!-- Favicon -->
    <link rel="icon" href="http://icons.iconarchive.com/icons/bokehlicia/captiva/128/rocket-icon.png" type="image/x-icon" />
    <!-- Bootstrap Core CSS -->
    <link href="../../base/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../base/css/custom.css" rel="stylesheet">
    <link href="../../base/css/guages.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- Slider -->
    <link href="../../base/css/slider/freshslider.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="../../base/js/jquery.js"></script>
    <script src="../../base/js/guage/raphael-2.1.4.min.js"></script>
    <script src="../../base/js/guage/justgage-1.1.0.min.js"></script>

    <!-- Menu Toggle Script -->
    <script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>

    <!-- Chart js library -->
    <script src="../../base/js/chart/Chart.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>

    <!-- Slider -->
    <script src="../../base/js/slider/freshslider.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        * {
            font-family: system-ui;
        }
    </style>

</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #208000;" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                    <a class="navbar-brand pull-left " href="#" id="menu-toggle"><span class="glyphicon glyphicon-chevron-left soft-white"></span></a>
                    <a class="navbar-brand pull-left" id='space' href="#"><?php echo $lang1['vuon1'] ?></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="../dashboard/index.php"><?php echo $lang1['vuon1'] ?></a></li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $lang1['admin'] ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="../dashboard/dangxuat.php"><?php echo $lang2['logout'] ?></a></li>

                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <!-- Sidebar -->
        <div id="sidebar-wrapper" style="background-color: #13263a;">
            <div>
                <div class="slogan">
                    <h3 style="color: #d8ffcc"><?php echo $lang1['hethong'] ?> </h3>
                    <br> <br>
                </div>
            </div>

            <ul class="sidebar-nav">
                <li>
                    <h3><?php echo $lang1['thaotac'] ?></h3>
                </li>
                <li>
                    <a href="../dashboard/index.php"><span class="fas fa-sync" style="color: green"></span>&nbsp; <?php echo $lang1['dieukhienthietbi'] ?></a>
                </li>
                <li>
                    <h3><?php echo $lang1['thongsomoitruong'] ?></h3>
                </li>
                <li>
                    <a href="../watch_temp/index.php"><span class="fas fa-temperature-low" style="color: green;font-size:15px;"></span>&nbsp; <?php echo $lang1['nhietdo'] ?></a>
                </li>
                <li>
                    <a href="../watch_humid/index.php"><span class="fas fa-cloud-sun-rain" style="color: green;font-size: 15px;"></span>&nbsp; <?php echo $lang1['doamkhongkhi'] ?></a>
                </li>
                <li>
                    <a href="../watch_mois/index.php"><span class="fas fa-water" style="color: green;font-size: 15px;"></span>&nbsp; <?php echo $lang1['doamdat'] ?></a>
                </li>
                <li id="active">
                    <a href="../watch_light/index.php"><span class="fas fa-sun" style="color: green;font-size: 15px;"></span>&nbsp; <?php echo $lang1['cuongdosang'] ?></a>
                </li>
            </ul>
        </div>

        <div id="page-content-wrapper" style="background-color: #ecffe6;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-md-6 col-sm-6">
                        <div id="g1" class="gauge float-right"></div>
                    </div>
                    <?php
                    // GET LAST TEMP
                    $query = "SELECT * from T_LIGHT";
                    $result = $db->query($query);

                    $row = $result->fetch_assoc();
                    $x = $row["value"];


                    ?>
                    <script>
                        var temp = '<?php echo $x; ?>'; //0
                        function get_element() {
                            $.get("getData.php?last=true", function(data) {
                                temp = data;
                            });
                        }

                        function drow_graph() {
                            var g1 = new JustGage({
                                id: "g1",
                                value: temp,
                                min: 0,
                                max: 500,
                                title: "<?php echo $lang6['doamhientai'] ?>",
                                label: "lux",
                                decimals: 2,
                                pointer: true,
                                pointerOptions: {
                                    toplength: -15,
                                    bottomlength: 10,
                                    bottomwidth: 12,
                                    color: '#8e8e93',
                                    stroke: '#ffffff',
                                    stroke_width: 3,
                                    stroke_linecap: 'round'
                                },
                                gaugeWidthScale: 0.54,
                                counter: true
                            });

                            setInterval(function() {
                                g1.refresh(temp);
                            }, 1000);
                        }
                        setInterval(get_element, 1000);
                    </script>

                    <div class="col-md-6 col-md-6 col-sm-6">
                        <div class="box  box-stat">
                            <div class="box-body">
                                <div style="display: block;">

                                    <h4><small class="pull-right"><b>
                                                <font color="#9900CC"><?php echo $lang6['thongke'] ?></font>
                                            </b></small></h4>
                                    <div class="spacer"></div>
                                    <table class="table table-condensed">
                                        <tbody>
                                            <tr>
                                                <td>&nbsp;<?php echo $lang4['max'] ?></td>
                                                <td id="max_temp"></td>
                                                <td id="max_time"></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;<?php echo $lang4['min'] ?></td>
                                                <td id="min_temp"></td>
                                                <td id="min_time"></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;<?php echo $lang4['tb'] ?></td>
                                                <td id="ave_temp"></td>
                                                <td><?php echo $lang4['today'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <hr class="style-four" style="margin-bottom: 10px;margin-top: 0px">

                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="btn-group pull-right" role="group" aria-label="...">
                            <button type="button" class="btn btn-sm btn-default active" id="charts"><span class="glyphicon glyphicon-stats"></span>&nbsp;<?php echo $lang4['chart'] ?></button>
                            <button type="button" class="btn btn-sm btn-default" id="today"><span class="glyphicon glyphicon-record"></span>&nbsp;<?php echo $lang4['today'] ?></button>
                            <button type="button" class="btn btn-sm btn-default" id="data"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;<?php echo $lang4['data'] ?></button>
                        </div>
                    </div>
                </div>

                <div class="spacer"></div>

                <div id="click_charts" class="row">
                    <div class="col-md-12">
                        <div class="box box-info">
                            <div class="box-body">
                                <div id="container" style="min-width: 250px; height: 310px; margin: 0 auto"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row hide" id="click_today">
                    <div class="col-md-12">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title"><b><?php echo $lang6['oneday'] ?></b></h3>
                            </div>
                            <div class="box-body">
                                <?php
                                $query = "SELECT * FROM T_LIGHT ORDER BY id DESC LIMIT 10";
                                $result = $db->query($query);

                                $number = 1;
                                echo '<table class="table table-hover table-condensed display" id="example2" cellspacing="0" width="100%">';
                                echo '<thead>';
                                echo '<tr>';
                                echo '<th>' . $lang5['tt'] . '</th>';
                                //echo '<th>Vị Trí</th>';
                                echo '<th>' . $lang5['vl'] . '</th>';
                                echo '<th>' . $lang5['time'] . '</th>';
                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody id="attending_tbl">';
                                // DYNAMIC VALUES                        
                                echo '</tbody>';
                                echo '</table>';
                                ?>
                                <!--<div id="attending_tbl">Loading...</div>-->
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row hide" id="click_data">
                    <div class="col-md-12">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title"><b><?php echo $lang5['dlv1'] ?></b></h3>
                            </div>
                            <div class="box-body">
                                <?php
                                $query = "SELECT * FROM T_LIGHT ORDER BY id DESC";
                                $result = $db->query($query);

                                $number = 1;
                                echo '<table class="table table-hover table-condensed display" id="example" cellspacing="0" width="100%">';
                                echo '<thead>';
                                echo '<tr>';
                                echo '<th>' . $lang5['tt'] . '</th>';
                                echo '<th>' . $lang5['vl'] . '</th>';
                                echo '<th>' . $lang5['time'] . '</th>';
                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody class="searchable">';
                                while ($row = mysqli_fetch_assoc($result)) :
                                    echo "<tr>";
                                    echo "<td>{$number}</td>";
                                    // echo "<td>{$row['name']}</td>";
                                    echo "<td>{$row['value']}lux</td>";
                                    echo "<td>{$row['date']}</td>";
                                    echo "</tr>";
                                    $number += 1;
                                endwhile;
                                echo '</tbody>';
                                echo '</table>';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>




                <script>
                    const char_data_path = "/EasyGame/clients/pages/";

                    function refreshData() {
                        $('#attending_tbl').load(char_data_path + 'one_day_temp.php', "T_LIGHT");

                    }

                    function get_day_stat() {
                        $.ajax({
                            url: char_data_path + 'get_day_stat.php',
                            type: 'POST',
                            data: {
                                table: "T_LIGHT"
                            },
                            dataType: 'html',
                            success: function(data) {
                                var vals = data.split(",");
                                // console.log(vals[0]);
                                // console.log(vals[1]);
                                // console.log(vals[2]);
                                // console.log(vals[3]);
                                // console.log(vals[4]);
                                document.getElementById("min_temp").innerHTML = vals[0] + "lux";
                                document.getElementById("min_time").innerHTML = vals[1];
                                document.getElementById("max_temp").innerHTML = vals[2] + "lux";
                                document.getElementById("max_time").innerHTML = vals[3];
                                document.getElementById("ave_temp").innerHTML = vals[4] + "lux";
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                console.log("ERROR:" + xhr.responseText + " - " + thrownError);
                            }
                        });
                    }


                    $(document).ready(function() {
                        $('#example').DataTable({
                            "pagingType": "full_numbers"
                        });

                        $('#example2').DataTable({
                            bFilter: false,
                            bInfo: false,
                            "paging": false,
                            "ordering": false,
                            "info": false
                        });
                    });



                    // Execute every 5 seconds
                    window.setInterval(refreshData, 1000);
                    window.setInterval(get_day_stat, 1000);
                    window.onload = function() {

                        drow_graph();
                        refreshData();
                        get_day_stat();
                    };

                    $('#data').click(function() {
                        $('#click_data').removeClass('hide');
                        $('#click_today').addClass('hide');
                        $('#click_charts').addClass('hide');

                        $('#data').addClass('active');
                        $('#today').removeClass('active');
                        $('#charts').removeClass('active');

                    });

                    $('#today').click(function() {
                        $('#click_data').addClass('hide');
                        $('#click_today').removeClass('hide');
                        $('#click_charts').addClass('hide');

                        $('#data').removeClass('active');
                        $('#today').addClass('active');
                        $('#charts').removeClass('active');
                    });

                    $('#charts').click(function() {
                        $('#click_data').addClass('hide');
                        $('#click_today').addClass('hide');
                        $('#click_charts').removeClass('hide');

                        $('#data').removeClass('active');
                        $('#today').removeClass('active');
                        $('#charts').addClass('active');
                    });




                    $(document).ready(function() {

                        Highcharts.setOptions({
                            time: {
                                useUTC: false
                            }
                        });
                        $.ajax({
                            url: char_data_path + "chart_data.php?table=T_LIGHT&re=1",
                            type: 'get',
                            dataType: 'json',
                            success: function(json) {
                                Highcharts.chart('container', {

                                    chart: {
                                        //renderTo: 'container',
                                        events: {
                                            load: function() {
                                                series = this.series[0];
                                            }
                                        },
                                        height: 320,
                                        type: 'spline',
                                        style: {
                                            fontFamily: 'Arial, sans-serif'
                                        }
                                    },
                                    // time: {useUTC: false},
                                    exporting: {
                                        csv: {
                                            dateFormat: '%H:%M:%S %d/%m/%Y',
                                            decimalPoint: String,
                                        },
                                        filename: 'Cường độ sáng vườn 1',
                                        buttons: {
                                            contextButton: {
                                                menuItems: ['downloadPNG', 'downloadJPEG', 'downloadSVG', 'downloadPDF', 'separator', 'downloadCSV', 'downloadXLS', 'viewData', 'openInCloud']
                                            }
                                        }
                                    },
                                    legend: {
                                        layout: 'vertical',
                                        align: 'center',
                                        verticalAlign: 'bottom'
                                    },
                                    plotOptions: {
                                        spline: {
                                            //lineColor: '#5AE3F8',
                                            lineWidth: 2,
                                        },
                                        series: {
                                            marker: {
                                                enabled: false,
                                                /* enabled/disabled the point */
                                            },

                                        },
                                    },
                                    title: {
                                        text: "<?php echo $lang6['dtdatn'] ?>",
                                        style: {
                                            color: '#2E2E2E',
                                            fontWeight: 'bold',
                                            fontFamily: 'Arial',
                                        }
                                    },
                                    tooltip: {
                                        valueSuffix: 'lux',
                                        backgroundColor: 'rgba(219,219,216,0.8)',
                                        crosshairs: false,
                                        split: false,
                                    },
                                    xAxis: {
                                        type: 'datetime',
                                        dateTimeLabelFormats: {
                                            second: '%H:%M',
                                        },
                                        title: {
                                            text: null,
                                        },
                                        //gridLineWidth: 1,

                                    },
                                    yAxis: {
                                        type: 'linear',
                                        title: {
                                            text: '<?php echo $lang6['doamhientai'] ?> (lux)',
                                            style: {
                                                color: '#2E2E2E',
                                                fontFamily: 'Arial',
                                                fontWeight: 'bold'
                                            }
                                        },
                                    },
                                    series: [{
                                        name: '<?php echo $lang6['doamhientai'] ?>',
                                        data: json
                                    }]
                                })




                            }
                        });

                        var vals;
                        var time_temp;
                        $.get(char_data_path + "chart_data.php?table=T_LIGHT&re=2", function(json) {
                            vals = json.split(",");
                            time_temp = parseInt(vals[0]);
                        });

                        setInterval(function() {
                            $.get(char_data_path + "chart_data.php?table=T_LIGHT&re=2", function(json) {
                                vals = json.split(",");
                                var time = parseInt(vals[0]);
                                var value = parseFloat(vals[1]);
                                if (get_time() != time) {
                                    series.addPoint([time, value], true, false);
                                    set_time(time);
                                    console.log(time);
                                }
                            });
                        }, 2000);

                        function get_time() {
                            return time_temp;
                        };

                        function set_time(x) {
                            time_temp = x;
                        };

                    });
                </script>

                <script>
                    var check = 0;
                    setInterval(function() {
                        $.get("getData.php?connection=true", function(data) {
                            id = data;
                            if (id == check) {
                                $(document).ready(function() {
                                    alert('Mất Kết Nối Với Cảm Biến BH1750!');
                                    console.log('Mất Kết Nối Với Cảm Biến BH1750!');
                                });

                            };
                            check = id;
                            console.log(check);
                        });

                    }, 60000)
                </script>

                <script>
                    $("#menu-toggle").click(function(e) {
                        e.preventDefault();
                        $("#wrapper").toggleClass("toggled");
                    });
                </script>


</body>

</html>