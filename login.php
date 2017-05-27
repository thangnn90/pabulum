<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 26/05/2017
 * Time: 10:16
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Login Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet"/>
    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/themify-icons.css" rel="stylesheet">
    <style>
        body {
            margin-top: 120px;
        }

        .col-centered {
            float: none;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<?php
session_start();
session_destroy();
?>
<div class="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-3 col-centered">
                <div class="card card-user">
                    <div class="image">
                        <img src="assets/img/background.jpg" alt="...">
                    </div>
                    <div class="content">
                        <div class="author">
                            <img class="avatar border-white" src="assets/img/faces/face-2.jpg" alt="...">
                            <form action="handle/login.php" method="post" id="frmlogin">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tên đăng nhập</label>
                                        <input type="text" required class="form-control border-input"
                                               placeholder="Tên đăng nhập" name="username"
                                               value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mật khẩu</label>
                                        <input type="password" required class="form-control border-input"
                                               placeholder="mật khẩu" name="password">
                                    </div>
                                </div>
                                <div class="text-center" style="border-radius: 5px !important;">
                                    <button type="button" class="btn btn-info btn-fill btn-wd" id="btnlogin">Đăng nhập
                                    </button>
                                    <span><?php
                                        if (isset($error)) {
                                            echo $error;
                                        }
                                        ?></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-1">
                                <h5 class="ti-facebook"><br>
                                    <small>Facebook</small>
                                </h5>
                            </div>
                            <div class="col-md-4">
                                <h5 class="ti-youtube"><br>
                                    <small>Youtube</small>
                                </h5>
                            </div>
                            <div class="col-md-3">
                                <h5 class="ti-skype"><br>
                                    <small>Skype</small>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container-fluid">
        <nav class="pull-left">
            <ul>

                <li>
                    <a href="#">
                        Creative Tim
                    </a>
                </li>
                <li>
                    <a href="#">
                        Blog
                    </a>
                </li>
                <li>
                    <a href="#">
                        Licenses
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright pull-right">
            &copy;
            <script>document.write(new Date().getFullYear())</script>
            , made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative
                Tim</a>
        </div>
    </div>
</footer>

</div>
</div>


</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="assets/js/bootstrap-checkbox-radio.js"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
<script src="assets/js/jquery.validate.js"></script>
<script>
    $(document).ready(function () {
        $('#frmlogin').validate({
            debug: false,
            errorElement: "span",
            errorClass: "help-block",
            highlight: function (element, errorClass, validClass) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorPlacement: function (error, element) {
                if (element.parent('.input-group').length || element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
                    error.insertBefore(element.parent());
                } else {
                    error.insertAfter(element);
                }
            },
            rules: {
                username: {
                    required: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                username: {
                    required: "Tên đăng nhập không để trống !"
                },
                password: {
                    required: "Mật khẩu không để trống !"
                }
            }
        });
        $('#btnlogin').click(function (e) {
            e.preventDefault();
            $('#frmlogin').submit();
        });
    });
</script>
</html>

