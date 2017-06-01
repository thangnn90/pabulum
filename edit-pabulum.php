<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 30/05/2017
 * Time: 09:06
 */

?>
<?php include('template/header.php');
?>

<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location:login.php");
}
$page_name = "Cập nhật món ăn";
$conn = mysqli_connect("localhost", "root", "", "pabulum");
if (!$conn) {
    echo "connect fail" . mysqli_connect_error();
}
mysqli_set_charset($conn, 'utf8');
if (isset($_GET['id'])) {
    $sql = "SELECT * FROM pabulum WHERE id=" . $_GET['id'];
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    //GET COMMENT
    $resultComment = mysqli_query($conn, "SELECT * FROM comment WHERE item_id=" . $_GET['id']);
    $comment = mysqli_fetch_assoc($resultComment);

}
?>

<div class="wrapper">
    <?php include('template/slidebar.php'); ?>
    <div class="main-panel">
        <?php include('template/nav.php'); ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">
                            <div class="image" style="height: auto">
                                <img src="images/<?php echo $data['img'] ?>" alt="..."/>
                            </div>
                            <hr>
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-1">
                                        <h5><?php echo $data['view_number'] ?><br/>
                                            <small>Lượt xem</small>
                                        </h5>
                                    </div>
                                    <div class="col-md-4">
                                        <h5><?php echo $data['like_number'] ?><br/>
                                            <small>lượt thích</small>
                                        </h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>24,6k<br/>
                                            <small>Chia sẻ</small>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if ($comment != null): ?>
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Bình luận gần đây</h4>
                                </div>
                                <div class="content">
                                    <ul class="list-unstyled team-members">
                                        <li>
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <div class="avatar">
                                                        <img src="assets/img/faces/face-0.jpg" alt="Circle Image"
                                                             class="img-circle img-no-padding img-responsive">
                                                    </div>
                                                </div>
                                                <div class="col-xs-7">
                                                    <?php echo $comment['comment'] ?>
                                                    <br/>
                                                    <span class="text-muted"><i
                                                                class=""></i><?php echo date("d-m-Y", strtotime($comment['create_date'])) ?></i></span>
                                                    <span class="text-muted"><i
                                                                class=""></i><?php echo 'Pending' ?></i></span>


                                                </div>

                                                <div class="col-xs-2 text-right">
                                                    <i class="fa fa-commenting"></i>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Bình luận gần đây</h4>
                                </div>
                                <div class="content text-muted" style="text-align: center">
                                    <p>Hiện không có bình luận nào</p>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thông tin món: <?php echo $data['name'] ?></h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Tên món</label>
                                                <input type="text" name="name" class="form-control border-input"
                                                       placeholder="Tên món" value="<?php echo $data['name'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($data['cate_id'] != 1): ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Mô tả</label>
                                                    <textarea name="mota" rows="10"
                                                              class="ckeditor form-control border-input">
                                                    <?php echo $data['mota'] ?>
                                                </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nội dung</label>
                                                <textarea name="content" rows="10"
                                                          class="ckeditor form-control border-input">
                                                    <?php echo $data['content'] ?>
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Cập nhật
                                        </button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <?php include('template/footer.php') ?>

