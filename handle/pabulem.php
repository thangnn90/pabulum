<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 29/05/2017
 * Time: 08:28
 */
$conn = mysqli_connect("localhost", "root", "", "pabulum");
if (!$conn) {
    echo "connect fail" . mysqli_connect_error();
}
mysqli_set_charset($conn, 'utf8');
if (isset($_GET['type'])) {
    $result = mysqli_query($conn, "SELECT COUNT(id) as total FROM pabulum WHERE cate_id=" . $_GET['type']);
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];

    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 25;
    $total_page = ceil($total_records / $limit);
    if ($current_page > $total_page) {
        $current_page = $total_page;
    } elseif ($current_page < 1) {
        $current_page = 1;
    }
    $start = ($current_page - 1) * $limit;
    $query = 'SELECT * FROM pabulum WHERE cate_id=' . $_GET['type'] . ' ORDER BY id DESC LIMIT ' . $start . ',' . $limit . '';
    $result = mysqli_query($conn, $query);
}

