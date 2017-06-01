<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 01/06/2017
 * Time: 02:10
 */
include('template/header.php');
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location:login.php");
}
$page_name = "Quản lý món ăn";
include('handle/categories.php');
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
                                <h4 class="title">Danh mục</h4>
                                <p class="category">Danh mục món & công thức chế biến</p>
                            </div>
                            <?php if ($result != null): ?>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-striped">
                                        <thead>
                                        <th>Mã</th>
                                        <th>Tên danh mục</th>
                                        <th>Hình ảnh</th>
                                        <th>Trạng thái</th>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($result as $k): ?>
                                            <tr>
                                                <td><?php echo $k['id'] ?></td>
                                                <td>
                                                    <?php echo $k['name'] ?><br>
                                                    <span class="text-muted"><?php echo $k['mota']?></span>
                                                </td>
                                                <td><img class="img-circle" src="images/<?php echo $k['img'] ?>"
                                                         alt="<?php echo $k['name'] ?>" width="70" height="70"></td>
                                                <td><?php echo ($k['status'] == 1) ? 'khả dụng' : 'không khả dụng' ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php else: ?>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-striped">
                                        <thead>
                                        <th>Mã</th>
                                        <th>Tên danh mục</th>
                                        <th>Hình ảnh</th>
                                        <th>Trạng thái</th>
                                        </thead>
                                        <tbody>
                                        <tr style="text-align: center">
                                            <td colspan="4" class="text-muted">Hiện chưa có dữ liệu</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                </div>
            </div>
            <?php include('template/footer.php') ?>
