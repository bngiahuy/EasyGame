<?php
set_include_path($_SERVER['DOCUMENT_ROOT'] . "/EasyGame");
include("servers/language/config.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $lang['title'] ?></title>
    <link rel="icon" href="image/main.jpg" type="image/x-icon" />
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-image: url(image/homepage.jpg);
            height: 100vh;
            background-size: cover;
            background-position: center;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light text-dark mb-4" style="background-color: #b3ff99">
        <div class="container my-2 px-4 px-lg-5" text-center>
            <a class="navbar-brand fs-3 fw-bold" href="index.php">VƯỜN RAU TỰ ĐỘNG ỨNG DỤNG IOT</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-lg-0 mx-auto">
                    <li class="nav-item"><a class="nav-link mx-3" href="#">Easy Game</a></li>
                    <li class="nav-item"><a class="nav-link active fw-semibold mx-3" aria-current="page" href="index.php"><?php echo $lang['home'] ?></a> </li>
                    <li class="nav-item"><a class="nav-link mx-3" href="https://cse.hcmut.edu.vn/">Khoa KH&KT Máy Tính</a></li>
                    <li class="nav-item"><a class="nav-link mx-3" href="pages/login/"><?php echo $lang['login'] ?></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>