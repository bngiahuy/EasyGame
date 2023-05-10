<?php
set_include_path($_SERVER['DOCUMENT_ROOT'] . "/EasyGame");
include("servers/language/config.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $lang['title'] ?></title>
    <!-- <link rel="icon" href="image/main.jpg" type="image/x-icon" /> -->
    <link rel="stylesheet" href="less/master.css?v=1.1" />
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />

    <!-- <link rel="stylesheet/less" type="text/css" href="styles.less" /> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
</head>

<body>
    <!-- Header -->
    <header id="main-header">
        <div class="container">
            <h1>ĐỒ ÁN</h1>
            <p>From EasyGame with love</p>
        </div>
    </header>

    <!-- LogIn 1 -->
    <section class="call-to-action">
        <div class="cta-container cf">
            <p>Hãy đăng nhập để điều khiển các thiết bị IoT</p>
            <!-- ông nhập cái đường link đăng nhập ở đây nha!!! nhớ còn 1 link đăng nhập ở dưới nữa -->
            <a class="btn" href="pages/login/"><?php echo $lang['login'] ?></a>
        </div>
    </section>

    <!-- Easy to connect Section -->
    <section id="macbook">
        <div class="container">
            <h2>Điều khiển các thiết bị dễ dàng thông qua trang web.</h2>
            <p>Nhờ điều khiển thiệt bị qua trang web nên chúng ta có thể điều khiển và theo dõi thiết bị mọi lúc, mọi nơi.</p>
            <img src="image/macbookpro.png" />
        </div>
    </section>

    <!-- Slider Section -->
    <!-- <section class="slider-main">
        <div id="left-arrow">
            <a href="#" class="unslider-arrow prev">
                <i class="fa fa-chevron-left fa-2x"></i>
            </a>
        </div>
        <div id="right-arrow">
            <a href="#" class="unslider-arrow next">
                <i class="fa fa-chevron-right fa-2x"></i>
            </a>
        </div>
        <div class="slider">
            <ul>
                <li class="slide" id="slide1">
                    <h2>Chúng tôi là EasyGame Company</h2>
                </li>
                <li class="slide" id="slide2">
                    <h2>Hãy trồng cây vì một môi trường xanh và đẹp</h2>
                </li>
                <li class="slide" id="slide3">
                    <h2>Hệ thống Smart Garden</h2>
                </li>
            </ul>
        </div>
    </section> -->
    <section id="summary">
        <div class="container">
            <h2>Giao diện khác biệt</h2>
            <p>Bạn có muốn trải nghiệm một trang web điều khiển thông minh và hoàn toàn mới!</p>
        </div>
    </section>

    <!-- 3 image about fruit Section -->
    <section id="three-images">
        <div class="container">
            <header class="body-header">
                <h2>Chọn nhiều loại cây trồng</h2>
                <p>Bạn có thể chọn nhiều loại cây và có thể thêm các cây trồng bạn muốn vào bảng điều khiển.</p>
            </header>
            <article class="cf">
                <div class="img-circle-div">
                    <img src="image/caixanh.jpeg" />
                    <h3>Cải xanh</h3>
                    <p>Theo Đông Y, cải xanh là loại rau được ví như cây thuốc vì chứa nhiều dinh dưỡng. Sau khi gieo hạt từ 30 - 40 ngày có thể thu hoạch.</p>
                </div>
                <div class="img-circle-div">
                    <img src="image/cachua.jpg" />
                    <h3>Cà chua bi</h3>
                    <p>Cà chua chín đỏ mọng chứa nhiều vitamin A, vitamin C và vitamin K tự nhiên. Sau khi gieo hạt từ 45 - 90 ngày có thể thu hoạch.</p>
                </div>
                <div class="img-circle-div">
                    <img src="image/carot.jpeg" />
                    <h3>Cà rốt</h3>
                    <p>Cà rốt là cây trồng có giá trị dinh dưỡng cao tốt cho sức khỏe và làm đẹp. Sau khi gieo hạt từ 100 - 130 ngày có thể thu hoạch.</p>
                </div>
            </article>
        </div>
    </section>

    <!-- LogIn 2 -->
    <section class="call-to-action cta-2">
        <div class="cta-container cf">
            <p>Bạn muốn điều khiển thiết bị? Đăng nhập nào!</p>
            <!-- ông nhập cái đường link đăng nhập ở đây nha!!! nhớ còn 1 link đăng nhập ở dưới nữa -->
            <a class="btn" href="pages/login/"><?php echo $lang['login'] ?></a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="social-boat">
                <div class="gplus">
                    <!-- Place this tag where you want the +1 button to render. -->
                    <div class="g-plusone"></div>

                    <!-- Place this tag after the last +1 button tag. -->
                    <script type="text/javascript">
                        (function() {
                            var po = document.createElement('script');
                            po.type = 'text/javascript';
                            po.async = true;
                            po.src = 'https://apis.google.com/js/plusone.js';
                            var s = document.getElementsByTagName('script')[0];
                            s.parentNode.insertBefore(po, s);
                        })();
                    </script>
                </div>
                <div class="facebook">
                    <div id="fb-root"></div>
                    <script>
                        (function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s);
                            js.id = id;
                            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));
                    </script>
                    <div class="fb-like" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
                </div>
            </div>
            <div id="footer-text" class="small">
                <p>Design by <a href="https://www.facebook.com/minhnghiasd" target="_blank">Minh Nghĩa</a></p>
            </div>
        </div>
    </footer>
    <!-- Reference jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')
    </script>
    <!-- Reference Javascript, minify for production -->
    <script type="text/javascript" src="js/jquery.event.move.js"></script>
    <script type="text/javascript" src="js/jquery.event.swipe.js"></script>
    <script type="text/javascript" src="js/unslider.js"></script>
    <!-- Unslider script -->
    <script>
        $(document).ready(function() {
            var unslider = $('.slider').unslider();
            $('.unslider-arrow').click(function(event) {
                event.preventDefault();
                if ($(this).hasClass('next')) {
                    unslider.data('unslider')['next']();
                } else {
                    unslider.data('unslider')['prev']();
                };
            });
            var unslider = $('.slider').unslider();

            unslider.on('movestart', function(e) {
                if ((e.distX > e.distY && e.distX < -e.distY) || (e.distX < e.distY && e.distX > -e.distY)) {
                    e.preventDefault();
                }
            });
        });
    </script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/less"></script> -->
</body>

</html>