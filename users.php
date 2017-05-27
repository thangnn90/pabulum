<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 26/05/2017
 * Time: 13:53
 */
?>
<?php include('template/header.php') ?>

<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location:login.php");
}
?>
<div class="wrapper">
    <?php include('template/slidebar.php'); ?>
    <div class="main-panel">
        <?php include('template/nav.php'); ?>
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <!-- Data table-->
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Striped Table</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Salary</th>
                                    <th>Country</th>
                                    <th>City</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>$36,738</td>
                                        <td>Trang web của Samsung Đài Loan vô tình làm lộ 3 màu mới của bộ đôi
                                            Galaxy S8
                                            và S8+, đó là Ice Lake Blue, Smoked Purple Grey và Quicksand Gold. Hiện
                                            tại
                                            các thông tin này đã được gỡ bỏ nhưng ít nhất nó cũng cho chúng ta biết
                                            Samsung sẽ đưa ra các phiên bản màu mới nhằm tăng độ hấp dẫn cho sản
                                            phẩm
                                            của họ. Chưa rõ là các bản này sẽ độc quyền cho…
                                        </td>
                                        <td>Oud-Turnhout</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Minerva Hooper</td>
                                        <td>$23,789</td>
                                        <td>Curaçao</td>
                                        <td>Sinaai-Waas</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Sage Rodriguez</td>
                                        <td>$56,142</td>
                                        <td>Netherlands</td>
                                        <td>Baileux</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Philip Chaney</td>
                                        <td>$38,735</td>
                                        <td>Korea, South</td>
                                        <td>Overland Park</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Doris Greene</td>
                                        <td>$63,542</td>
                                        <td>Malawi</td>
                                        <td>Feldkirchen in Kärnten</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Mason Porter</td>
                                        <td>$78,615</td>
                                        <td>Chile</td>
                                        <td>Gloucester</td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                </div>
            </div>
        </div>

        <?php include('template/footer.php') ?>
