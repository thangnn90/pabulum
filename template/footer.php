<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 26/05/2017
 * Time: 13:56
 */
?>
<footer class="footer">
    <div class="container-fluid">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="http://www.creative-tim.com">
                        Creative Tim
                    </a>
                </li>
                <li>
                    <a href="http://blog.creative-tim.com">
                        Blog
                    </a>
                </li>
                <li>
                    <a href="http://www.creative-tim.com/license">
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
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="assets/js/paper-dashboard.js"></script>
<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
<script src="//cdn.ckeditor.com/4.7.0/basic/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        demo.initChartist();
        $.notify({
            icon: 'ti-gift',
            message: "Welcome to <b>Dashboard Cooking Manage</b>."
        }, {
            type: 'success',
            timer: 4000
        });
        $("#search-box").keyup(function () {
            $.ajax({
                type: "POST",
                url: "handle/suggesstion_mon.php",
                data: 'keyword=' + $(this).val(),
                beforeSend: function () {
                    $("#search-box").css("background", "#FFF url(assets/img/background/LoaderIcon.gif) no-repeat 165px");
                },
                success: function (data) {
                    $("#suggesstion-box").show();
                    $("#suggesstion-box").html(data);
                    $("#search-box").css("background", "#FFF");
                }
            });
        });

    });
</script>

</html>

