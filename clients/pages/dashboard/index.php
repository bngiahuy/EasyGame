<?php
set_include_path($_SERVER['DOCUMENT_ROOT'] . "/EasyGame");
include("servers/language/config.php");
if (!isset($_SESSION["username"])) {
    header("Location: http://localhost/EasyGame/clients/index.php");
    exit();
}
// include("servers/connection.php");
require_once("servers/Database.php");
$db = Database::getInstance();

$query = "SELECT Den1, Bom1, Ps1, Rc1 from CONTROL";
$result = $db->query($query);
while ($row = $result->fetch_assoc()) {
    $x0 = $row["Den1"];
    $x1 = $row["Bom1"];
    $x2 = $row["Ps1"];
    $x3 = $row["Rc1"];
}

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// }
if (isset($_POST['den'])) {
    if ($x0 == 0) {
        $x0 = 1;
    } else {
        $x0 = 0;
    };
    $result = $db->query("UPDATE CONTROL SET Den1 = $x0");
    // $sql = "UPDATE CONTROL SET Den1 = $x0";
    // if ($result = $db->query($sql)) {
    // }
}

if (isset($_POST['bom'])) {
    if ($x1 == 0) {
        $x1 = 1;
    } else {
        $x1 = 0;
    };
    $result = $db->query("UPDATE CONTROL SET Bom1 = $x1");
    // $sql = "UPDATE CONTROL SET Bom1 = $x1";
    // if ($result = $db->query($sql)) {
    // }
}

if (isset($_POST['ps'])) {
    if ($x2 == 0) {
        $x2 = 1;
    } else {
        $x2 = 0;
    };
    $result = $db->query("UPDATE CONTROL SET Ps1 = $x2");
    // $sql = "UPDATE CONTROL SET Ps1 = $x2";
    // if ($result = $db->query($sql)) {
    // }
}

if (isset($_POST['rc'])) {
    if ($x3 == 0) {
        $x3 = 1;
    } else {
        $x3 = 0;
    };
    $result = $db->query("UPDATE CONTROL SET Rc1 = $x3");
    // $sql = "UPDATE CONTROL SET Rc1 = $x3";
    // if ($result = $db->query($sql)) {
    // }
}


if (isset($_POST['onall'])) {
    $x0 = $x1 = $x2 = $x3 = 1;
    $sql = "UPDATE CONTROL SET Rc1 = 1";
    if ($result = $db->query($sql)) {
    }

    $sql = "UPDATE CONTROL SET Ps1 = 1";
    if ($result = $db->query($sql)) {
    }

    $sql = "UPDATE CONTROL SET Bom1 = 1";
    if ($result = $db->query($sql)) {
    }

    $sql = "UPDATE CONTROL SET Den1 = 1";
    if ($result = $db->query($sql)) {
    }
}

if (isset($_POST['offall'])) {
    $x0 = $x1 = $x2 = $x3 = 0;
    $sql = "UPDATE CONTROL SET Rc1 = 0";
    if ($result = $db->query($sql)) {
    }

    $sql = "UPDATE CONTROL SET Ps1 = 0";
    if ($result = $db->query($sql)) {
    }

    $sql = "UPDATE CONTROL SET Bom1 = 0";
    if ($result = $db->query($sql)) {
    }

    $sql = "UPDATE CONTROL SET Den1 = 0";
    if ($result = $db->query($sql)) {
    }
}

///

if (isset($_POST['mode_change']) && isset($_POST['ON1'])) {
    $query = "SELECT `Manual_mode` from CONTROL";
    $result = $db->query($query);
    while ($row = $result->fetch_assoc()) {
        $mode = $row["Manual_mode"];
    }

    $sql = "UPDATE CONTROL SET Manual_mode = 1 - $mode";
    if ($result = $db->query($sql)) {
        echo "<script>alert('Update successful. New mode: " . $mode . "');</script>";
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <title><?php echo $lang1['vuon1'] ?></title>
    <!-- Favicon -->
    <link rel="icon" href="../../image/main.jpg" type="image/x-icon" />
    <!-- Bootstrap Core CSS -->
    <link href="../../base/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Custom CSS -->
    <link href="../../base/css/custom.css" rel="stylesheet">
    <link href="../../base/css/guages.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- Slider -->
    <link href="../../base/css/slider/freshslider.min.css" rel="stylesheet">

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
                        <li class="active"><a href="index.php"><?php echo $lang1['vuon1'] ?></a></li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $lang1['admin'] ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="dangxuat.php"><?php echo $lang2['logout'] ?></a></li>

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
                <li id="active">
                    <a href="index.php"><span class="fas fa-sync" style="color: green"></span>&nbsp; <?php echo $lang1['dieukhienthietbi'] ?></a>
                </li>

                <li>
                    <h3><?php echo $lang1['thongsomoitruong'] ?></h3>
                </li>
                <li>
                    <a href="../watch_temp/index.php"><span class="fas fa-temperature-low" style="color: green; font-size:15px;"></span>&nbsp; <?php echo $lang1['nhietdo'] ?></a>
                </li>
                <li>
                    <a href="../watch_humid/index.php"><span class="fas fa-cloud-sun-rain" style="color: green; font-size: 15px;"></span>&nbsp; <?php echo $lang1['doamkhongkhi'] ?></a>
                </li>
                <li>
                    <a href="../watch_mois/index.php"><span class="fas fa-water" style="color: green; font-size: 15px;"></span>&nbsp; <?php echo $lang1['doamdat'] ?></a>
                </li>
                <li>
                    <a href="../watch_light/index.php"><span class="fas fa-sun" style="color: green; font-size: 15px;"></span>&nbsp; <?php echo $lang1['cuongdosang'] ?></a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper" style="background-color: #ecffe6;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <section class="content-header">
                            <h1> <?php echo $lang1['dieukhienthietbi'] ?> </h1>
                        </section>
                    </div>
                </div>
                <hr class="style-four">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-red"><span class="fas fa-temperature-low" aria-hidden="true"></span></span>
                            <div class="info-box-content">
                                <span class="info-box-text text-muted"><?php echo $lang2['nhietdo'] ?></span>
                                <span class="info-box-number" id="nhietdo"><?php echo $lang3['dangbat0'] ?></span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><span class="fas fa-cloud-sun-rain" aria-hidden="true"></span></span>
                            <div class="info-box-content">
                                <span class="info-box-text text-muted"><?php echo $lang2['amkhongkhi'] ?></span>

                                <span class="info-box-number" id="doam"><?php echo $lang3['dangbat0'] ?></span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-orange"><span class="fas fa-water" aria-hidden="true"></span></span>
                            <div class="info-box-content">
                                <span class="info-box-text text-muted"><?php echo $lang2['amdat'] ?></span>
                                <span class="info-box-number" id="amdat"><?php echo $lang3['dangbat0'] ?></span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-purple"><span class="fas fa-sun" aria-hidden="true"></span></span>
                            <div class="info-box-content">
                                <span class="info-box-text text-muted"><?php echo $lang2['anhsang'] ?></span>
                                <span class="info-box-number" id="sang"><?php echo $lang3['dangbat0'] ?></span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->
                </div><!-- /.row -->


                <script src="jquery.min.js"></script>
                <script>
                    $(document).ready(function() {
                        setInterval(function() {
                            get_data()
                        }, 3000);

                        function get_data() {
                            jQuery.ajax({
                                type: "GET",
                                url: "http://localhost/EasyGame/servers/database/nhietdo.php",
                                data: "",
                                beforeSend: function() {},
                                complete: function() {},
                                success: function(data) {
                                    $("#nhietdo").html(data);
                                }
                            });
                        }
                    });
                </script>

                <script>
                    $(document).ready(function() {
                        setInterval(function() {
                            get_data()
                        }, 3000);

                        function get_data() {
                            jQuery.ajax({
                                type: "GET",
                                url: "http://localhost/EasyGame/servers/database/cuongdosang.php",
                                data: "",
                                beforeSend: function() {},
                                complete: function() {},
                                success: function(data) {
                                    $("#sang").html(data);
                                }
                            });
                        }
                    });
                </script>

                <script>
                    $(document).ready(function() {
                        setInterval(function() {
                            get_data()
                        }, 3000);

                        function get_data() {
                            jQuery.ajax({
                                type: "GET",
                                url: "http://localhost/EasyGame/servers/database/doamkk.php",
                                data: "",
                                beforeSend: function() {},
                                complete: function() {},
                                success: function(data) {
                                    $("#doam").html(data);
                                }
                            });
                        }
                    });
                </script>

                <script>
                    $(document).ready(function() {
                        setInterval(function() {
                            get_data()
                        }, 3000);

                        function get_data() {
                            jQuery.ajax({
                                type: "GET",
                                url: "http://localhost/EasyGame/servers/database/doamdat.php",
                                data: "",
                                beforeSend: function() {},
                                complete: function() {},
                                success: function(data) {
                                    $("#amdat").html(data);
                                }
                            });
                        }
                    });
                </script>

                <hr class="style-four">
                <div class="row">

                    <form action="index.php" method="POST">
                        <input type="hidden" name="mode_change" value="1">
                        <button style="width:90px;height:30px;" type="submit" class="btn btn-primary btn-sm" name="ON1" id="chonchedo">Thủ công</button>
                    </form>
                    <br><br><br>
                    <div class="hide" id="auto">

                        <form action="submit1.php" method="POST">
                            <div class="col-lg-3 pull-right">
                                <div class="input-group pull-right">
                                    <span class="input-group-addon"><?php echo $lang2['cuongdosang1'] ?> </span>
                                    <input id="filter" type="text" class="form-control" name="l2">
                                </div>
                            </div>
                            <div class="col-lg-3 pull-right">
                                <div class="input-group pull-right">
                                    <span class="input-group-addon"><?php echo $lang2['doamdat1'] ?> </span>
                                    <input id="filter" type="text" class="form-control" name="m2">

                                </div>
                            </div>
                            <div class="col-lg-3 pull-right">
                                <div class="input-group pull-right">
                                    <span class="input-group-addon"><?php echo $lang2['doamkhongkhi1'] ?> </span>
                                    <input id="filter" type="text" class="form-control" name="h2">

                                </div>
                            </div>

                            <div class="col-lg-3 pull-right">
                                <div class="input-group pull-right ">
                                    <span class="input-group-addon"><?php echo $lang2['nhietdo1'] ?></span>

                                    <input id="filter" type="text" class="form-control" name="t2">

                                </div>
                            </div>
                            <br> <br> <br>
                            <input type="submit" class="btn btn-success btn-sm" name="auto_submit" value="<?php echo $lang3['set'] ?>">
                        </form>
                    </div>
                </div>

                <hr class="style-four">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <!-- Table -->
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th><?php echo $lang3['chucnang'] ?></th>
                                                <th><?php echo $lang3['battat'] ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td class="vert-align">
                                                    <?php echo $lang3['dkrc'] ?>
                                                </td>
                                                <td class="vert-align">
                                                    <form action="index.php" method="POST">
                                                        <button type="submit" class="btn btn-success btn-sm" name="rc" id="rc1"><?php echo $lang4['batthietbi'] ?></button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="vert-align">
                                                    <?php echo $lang3['dkb'] ?>
                                                </td>
                                                <td class="vert-align">
                                                    <button type="submit" class="btn btn-success btn-sm" name="bom" id="bom1"><?php echo $lang4['batthietbi'] ?></button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="vert-align">
                                                    <?php echo $lang3['dkps'] ?>
                                                </td>
                                                <td class="vert-align">
                                                    <button type="submit" class="btn btn-success btn-sm" name="ps" id="ps1"><?php echo $lang4['batthietbi'] ?></button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="vert-align">
                                                    <?php echo $lang3['dkden'] ?>
                                                </td>
                                                <td class="vert-align">
                                                    <button type="submit" class="btn btn-success btn-sm" name="den" id="den1"><?php echo $lang4['batthietbi'] ?></button>

                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="vert-align">
                                                    <?php echo $lang3['onall'] ?>
                                                </td>
                                                <td class="vert-align">
                                                    <button type="submit" class="btn btn-success btn-sm" name="onall" id="onall1"><?php echo $lang4['batthietbi'] ?></button>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td class="vert-align">
                                                    <?php echo $lang3['offall'] ?>
                                                </td>
                                                <td class="vert-align">
                                                    <button type="submit" class="btn btn-danger btn-sm " name="offall" id="offall1"><?php echo $lang4['tatthietbi'] ?></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        setInterval(function() {
                            get_data()
                        }, 3000);

                        function get_data() {
                            jQuery.ajax({
                                type: "GET",
                                url: "http://localhost/EasyGame/clients/device/tb1.php",
                                data: "",
                                beforeSend: function() {},
                                complete: function() {},
                                success: function(data) {
                                    if (data == "Turning On" || data == "Đang Bật") {
                                        $('#den2').removeClass('label-warning');
                                        $('#den2').removeClass('label-danger');
                                        $('#den2').addClass('label-success');
                                        $("#den2").html(data);
                                    };
                                    if (data == "Turning Off" || data == "Đang Tắt") {
                                        $('#den2').removeClass('label-warning');
                                        $('#den2').removeClass('label-success');
                                        $('#den2').addClass('label-danger');
                                        $("#den2").html(data);
                                    };

                                }
                            });
                        }
                    });
                </script>


                <script>
                    $(document).ready(function() {
                        setInterval(function() {
                            get_data()
                        }, 3000);

                        function get_data() {
                            jQuery.ajax({
                                type: "GET",
                                url: "http://localhost/EasyGame/clients/device/tb2.php",
                                data: "",
                                beforeSend: function() {},
                                complete: function() {},
                                success: function(data) {
                                    if (data == "Turning On" || data == "Đang Bật") {
                                        $('#bom2').removeClass('la bel-warning');
                                        $('#bom2').removeClass('label-danger');
                                        $('#bom2').addClass('label-success');
                                        $("#bom2").html(data);
                                    };
                                    if (data == "Turning Off" || data == "Đang Tắt") {
                                        $('#bom2').removeClass('label-warning');
                                        $('#bom2').removeClass('label-success');
                                        $('#bom2').addClass('label-danger');
                                        $("#bom2").html(data);
                                    };

                                }
                            });
                        }
                    });
                </script>

                <script>
                    $(document).ready(function() {
                        setInterval(function() {
                            get_data()
                        }, 3000);

                        function get_data() {
                            jQuery.ajax({
                                type: "GET",
                                url: "http://localhost/EasyGame/clients/device/tb3.php",
                                data: "",
                                beforeSend: function() {},
                                complete: function() {},
                                success: function(data) {
                                    if (data == "Turning On" || data == "Đang Bật") {
                                        $('#ps2').removeClass('label-warning');
                                        $('#ps2').removeClass('label-danger');
                                        $('#ps2').addClass('label-success');
                                        $("#ps2").html(data);
                                    };
                                    if (data == "Turning Off" || data == "Đang Tắt") {
                                        $('#ps2').removeClass('label-warning');
                                        $('#ps2').removeClass('label-success');
                                        $('#ps2').addClass('label-danger');
                                        $("#ps2").html(data);
                                    };
                                }
                            });
                        }
                    });
                </script>

                <script>
                    $(document).ready(function() {
                        setInterval(function() {
                            get_data()
                        }, 3000);

                        function get_data() {
                            jQuery.ajax({
                                type: "GET",
                                url: "http://localhost/EasyGame/clients/device/tb4.php",
                                data: "",
                                beforeSend: function() {},
                                complete: function() {},
                                success: function(data) {
                                    if (data == "Turning On" || data == "Đang Bật") {
                                        $('#rc2').removeClass('label-warning');
                                        $('#rc2').removeClass('label-danger');
                                        $('#rc2').addClass('label-success');
                                        $("#rc2").html(data);
                                    };
                                    if (data == "Turning Off" || data == "Đang Tắt") {
                                        $('#rc2').removeClass('label-warning');
                                        $('#rc2').removeClass('label-success');
                                        $('#rc2').addClass('label-danger');
                                        $("#rc2").html(data);
                                    };


                                }
                            });
                        }

                    });
                </script>

                <script>
                    var y1 = <?php echo json_encode($x0); ?>;
                    if (y1 == 0) {
                        y1 = "<?php echo $lang4['batthietbi'] ?>";
                        $('#den1').removeClass('btn btn-danger btn-sm');
                        $('#den1').removeClass('btn btn-primary btn-sm');
                        $('#den1').addClass('btn btn-success btn-sm');
                    };;
                    if (y1 == 1) {
                        y1 = "<?php echo $lang4['tatthietbi'] ?>";
                        $('#den1').removeClass('btn btn-primary btn-sm');
                        $('#den1').removeClass('btn btn-success btn-sm');
                        $('#den1').addClass('btn btn-danger btn-sm');
                    };
                    document.getElementById('den1').innerHTML = y1;

                    var y1 = <?php echo json_encode($x1); ?>;
                    if (y1 == 0) {
                        y1 = "<?php echo $lang4['batthietbi'] ?>";
                        $('#bom1').removeClass('btn btn-danger btn-sm');
                        $('#bom1').removeClass('btn btn-primary btn-sm');
                        $('#bom1').addClass('btn btn-success btn-sm');
                    };;
                    if (y1 == 1) {
                        y1 = "<?php echo $lang4['tatthietbi'] ?>";
                        $('#bom1').removeClass('btn btn-primary btn-sm');
                        $('#bom1').removeClass('btn btn-success btn-sm');
                        $('#bom1').addClass('btn btn-danger btn-sm');
                    };
                    document.getElementById('bom1').innerHTML = y1;

                    var y1 = <?php echo json_encode($x2); ?>;
                    if (y1 == 0) {
                        y1 = "<?php echo $lang4['batthietbi'] ?>";
                        $('#ps1').removeClass('btn btn-danger btn-sm');
                        $('#ps1').removeClass('btn btn-primary btn-sm');
                        $('#ps1').addClass('btn btn-success btn-sm');
                    };
                    if (y1 == 1) {
                        y1 = "<?php echo $lang4['tatthietbi'] ?>";
                        $('#ps1').removeClass('btn btn-primary btn-sm');
                        $('#ps1').removeClass('btn btn-success btn-sm');
                        $('#ps1').addClass('btn btn-danger btn-sm');
                    };
                    document.getElementById('ps1').innerHTML = y1;

                    var y1 = <?php echo json_encode($x3); ?>;
                    if (y1 == 0) {
                        y1 = "<?php echo $lang4['batthietbi'] ?>";
                        $('#rc1').removeClass('btn btn-danger btn-sm');
                        $('#rc1').removeClass('btn btn-primary btn-sm');
                        $('#rc1').addClass('btn btn-success btn-sm');
                    };;
                    if (y1 == 1) {
                        y1 = "<?php echo $lang4['tatthietbi'] ?>";
                        $('#rc1').removeClass('btn btn-primary btn-sm');
                        $('#rc1').removeClass('btn btn-success btn-sm');
                        $('#rc1').addClass('btn btn-danger btn-sm');
                    };
                    document.getElementById('rc1').innerHTML = y1;
                </script>

                <script>
                    var mode = <?php echo json_encode($mode); ?>;
                    var mode1;
                    if (mode == 0) {
                        mode = "<?php echo $lang2['manual'] ?>";
                        mode1 = 'green';
                    };
                    if (mode == 1) {
                        mode = "<?php echo $lang2['auto'] ?>";
                        mode1 = 'blue';

                        document.getElementById('den1').innerHTML = "<?php echo $lang2['auto'] ?>";
                        document.getElementById('ps1').innerHTML = "<?php echo $lang2['auto'] ?>";
                        document.getElementById('rc1').innerHTML = "<?php echo $lang2['auto'] ?>";
                        document.getElementById('bom1').innerHTML = "<?php echo $lang2['auto'] ?>";
                        document.getElementById('onall1').innerHTML = "<?php echo $lang2['auto'] ?>";
                        document.getElementById('offall1').innerHTML = "<?php echo $lang2['auto'] ?>";

                        $('#ps1').removeClass('btn btn-danger btn-sm');
                        $('#ps1').removeClass('btn btn-success btn-sm');
                        $('#ps1').addClass('btn btn-primary btn-sm');
                        $('#den1').removeClass('btn btn-danger btn-sm');
                        $('#den1').removeClass('btn btn-success btn-sm');
                        $('#den1').addClass('btn btn-primary btn-sm');
                        $('#rc1').removeClass('btn btn-danger btn-sm');
                        $('#rc1').removeClass('btn btn-success btn-sm');
                        $('#rc1').addClass('btn btn-primary btn-sm');
                        $('#bom1').removeClass('btn btn-danger btn-sm');
                        $('#bom1').removeClass('btn btn-success btn-sm');
                        $('#bom1').addClass('btn btn-primary btn-sm');
                        $('#onall1').removeClass('btn btn-success btn-sm');
                        $('#onall1').addClass('btn btn-primary btn-sm');
                        $('#offall1').removeClass('btn btn-danger btn-sm');
                        $('#offall1').addClass('btn btn-primary btn-sm');

                        $('#auto').removeClass('hide');
                        $('#auto').addClass('show');
                    };
                    document.getElementById('chonchedo').innerHTML = mode;
                    document.getElementById('chonchedo').style.backgroundColor = mode1;
                </script>

                <!-- <script src="../jquery.min.js"></script> -->

            </div>
        </div>
    </div>
    <script src="../../base/js/jquery.js"></script>
    <script src="jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- SWITCH SECTION -->
    <link href="../../base/css/switch/bootstrap-switch.css" rel="stylesheet">
    <script src="../../base/js/switch/highlight.js"></script>
    <script src="../../base/js/switch/bootstrap-switch.js"></script>
    <script src="../../base/js/switch/main.js"></script>

    <!-- GUAGE SECTION -->
    <script src="../../base/js/guage/raphael-2.1.4.min.js"></script>
    <script src="../../base/js/guage/justgage-1.1.0.min.js"></script>
    <!-- Menu Toggle Script -->
    <script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
    <!-- Chart js library -->
    <script src="../../base/js/chart/Chart.js"></script>
    <!-- Slider -->
    <script src="../../base/js/slider/freshslider.min.js"></script>

    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>

</html>