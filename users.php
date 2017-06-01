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
include('handle/users.php');
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
                                <h4 class="title">Quản trị người dùng</h4>
                                <p class="category">Auth</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    <th>ID</th>
                                    <th>Tên đăng nhập</th>
                                    <th>Email</th>
                                    </thead>
                                    <tbody>
                                    <?php if ($result != null): ?>
                                        <?php foreach ($result as $k): ?>
                                            <tr>
                                                <td><?php echo $k['id'] ?></td>
                                                <td><?php echo $k['users_name'] ?></td>
                                                <td><?php echo $k['email'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="3">Hiện không có dữ liệu</td>
                                        </tr>
                                    <?php endif; ?>
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
