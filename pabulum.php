<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 29/05/2017
 * Time: 08:15
 */
?>
<?php include('template/header.php');
?>

<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location:login.php");
}
$page_name = "Quản lý món ăn";
include('handle/pabulem.php');
?>

<div class="wrapper">
    <?php include('template/slidebar.php'); ?>
    <div class="main-panel">
        <?php include('template/nav.php'); ?>
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <form action="" method="post">
                        <div class="col-md-3 pull-right">
                            <div class="form-group">
                                <input type="text" name="keyword" id="search-box" class="form-control border-input"
                                       placeholder="search"
                                       value="">
                            </div>
                            <div id="suggesstion-box"></div>
                        </div>

                    </form>
                    <div class="col-md-12">
                        <!-- Data table-->
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Món ăn</h4>
                                <p class="category">Món ăn và công thức chế biến</p>
                            </div>
                            <?php if ($result != null): ?>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-striped">
                                        <thead>
                                        <th>Mã</th>
                                        <th>Tên món</th>
                                        <th>Hình ảnh</th>
                                        <th>Lượt xem</th>
                                        <th>Lượt thích</th>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($result as $k): ?>
                                            <tr>
                                                <td><?php echo $k['id'] ?></td>
                                                <td>
                                                    <a href="edit-pabulum.php?id=<?php echo $k['id'] ?>"><?php echo $k['name'] ?></a>
                                                </td>
                                                <td><img class="img-rounded" src="images/<?php echo $k['img'] ?>"
                                                         alt="<?php echo $k['name'] ?>" width="70" height="70"></td>
                                                <td><?php echo $k['view_number'] ?></td>
                                                <td><?php echo $k['like_number'] ?></td>
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
                                        <th>Tên món</th>
                                        <th>Hình ảnh</th>
                                        <th>Lượt xem</th>
                                        <th>Lượt thích</th>
                                        </thead>
                                        <tbody>
                                        <tr style="text-align: center">
                                            <td colspan="5" class="text-muted">Hiện chưa có dữ liệu</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pagination">
                            <?php
                            $type = $_GET['type'];
                            $min = max($current_page - 3, 1);
                            $max = min($current_page + 3, $total_page);
                            if ($current_page > 1 && $total_page > 1) {
                                echo '<li><a href="pabulum.php?type=' . $type . '&page=' . ($current_page - 1) . '">Prev</a></li>  ';
                            }
                            for ($i = $min; $i <= $max; ++$i) {
                                if ($i == $current_page) {
                                    echo '<li class="active"><span >' . $i . '</span></li>';
                                } else {
                                    echo '<li><a href="pabulum.php?type=' . $type . '&page=' . $i . '">' . $i . '</a></li>';
                                }
                            }
                            if ($current_page < $total_page && $total_page > 1) {
                                echo '<li><a href="pabulum.php?type=' . $type . '&page=' . ($current_page + 1) . '">Next</a></li>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <script>
                    //To select country name
                    function selectCountry(val) {
                        $("#suggesstion-box").hide();
                        location.href = "http://pabulum.local/edit-pabulum.php?id=" + val;
                    }
                </script>
            </div>
            <?php include('template/footer.php') ?>
