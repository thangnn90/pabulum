<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 01/06/2017
 * Time: 02:31
 */

$conn = mysqli_connect("localhost", "root", "", "pabulum");
if (!$conn) {
    echo "connect fail" . mysqli_connect_error();
}
mysqli_set_charset($conn, 'utf8');
$result = mysqli_query($conn, "SELECT * FROM users");
mysqli_close($conn);
?>