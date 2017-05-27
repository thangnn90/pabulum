<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 26/05/2017
 * Time: 11:11
 */
$conn = mysqli_connect("localhost", "root", "", "test");
if (!$conn) {
    echo "connect fail" . mysqli_connect_error();
}
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Sai tên đăng nhập hoặc mật khẩu";
    } else {
        $user = $_POST['username'];
        $pass = md5($_POST['password']);
        $sql = "SELECT * FROM users WHERE users_name='$user' AND password='$pass'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['login_user'] = $user;
            header("location:../index.php");
        } else {
            $error = "Sai tên đăng nhập hoặc mật khẩu";
            header("location:../login.php");
        }
        mysqli_close($conn);
    }
}
