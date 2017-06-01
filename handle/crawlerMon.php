<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 29/05/2017
 * Time: 08:38
 */
include('simple_html_dom.php');

$con = mysqli_connect("localhost", "root", "", "pabulum") or die('connect error!');
mysqli_set_charset($con, 'utf8');
//for ($i = 177; $i <= 177; $i--) {
$Mlink = "http://www.amthuc365.vn/cong-thuc/trang-1.html";
$html = file_get_html($Mlink);
$items = $html->find('ul.recipe_box_list_all li');
$jobs = array();
foreach ($items as $item) {

    $jobs["title"] = $item->find('h3')[0]->plaintext;
    $jobs['view'] = $item->find('.wrap p.fl')[0]->plaintext;
    $jobs['view'] = $item->find('.wrap p.fl')[0]->plaintext;
    $jobs['like'] = $item->find('.wrap p.fr')[0]->plaintext;
    $jobs['img'] = $item->find('img')[0]->src;
    $path = '../images/' . basename($jobs['img']);
    file_put_contents($path, file_get_contents($jobs['img']));
    $link = $item->find('h3 a')[0]->href;
    $html_content = file_get_html('http://www.amthuc365.vn/' . $link);
    $content = $html_content->find('.recipe_detail')[0];
    foreach ($content->find('a') as $value2) {
        $value2->outertext = $value2->plaintext;
    }
    $jobs["content"] = trim($content->innertext);

    $title = addslashes($jobs['title']);
    $img = basename($jobs['img']);
    $noidung = addslashes($jobs["content"]);
    $view = str_replace(' lượt xem', ' ', $jobs['view']);
    $like = str_replace(' lượt thích', ' ', $jobs['like']);
    $view_rep = str_replace(',', '', $view);
    $like_rep = str_replace(',', '', $like);
    $query = "SELECT * FROM pabulum where name='$title' WHERE cate_id=1";
    if ($result_exits = mysqli_query($con, $query)) {
        if (mysqli_num_rows($result_exits) > 0) {
            echo 'Tồn tại tin trong dữ liệu' . "<br>";
        } else {
            $sql = "INSERT INTO pabulum(cate_id,name,img,content,view_number,like_number) VALUES (1,'$title','$img','$noidung',$view_rep,$like_rep)";
            $result = mysqli_query($con, $sql);
            if (!$result) {
                echo 'Lỗi';
            } else {
                echo 'Thêm dữ liệu thành công' . ' </br > ';
            }
        }
    } else {
        echo 'truy vấn lỗi';
    }
}
//}
mysqli_close($con);