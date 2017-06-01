<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 01/06/2017
 * Time: 02:43
 */
include('simple_html_dom.php');

$con = mysqli_connect("localhost", "root", "", "pabulum") or die('connect error!');
mysqli_set_charset($con, 'utf8');
//for ($i = 28; $i <= 30; $i++) {
    $Mlink = "http://www.amthuc365.vn/cam-nang-huu-ich.html&page=1";
    $html = file_get_html($Mlink);
    $items = $html->find('ul.lst-show-plug li');
    $jobs = array();
    foreach ($items as $item) {

        $jobs["title"] = $item->find('h3.title')[0]->plaintext;
        $jobs["desc"] = $item->find('.text')[0]->plaintext;
        $jobs['img'] = $item->find('img')[0]->src;
        $path = '../images/' . basename($jobs['img']);
        file_put_contents($path, file_get_contents($jobs['img']));
        $link = $item->find('h3 a')[0]->href;
        $html_content = file_get_html('http://www.amthuc365.vn/t25508c167/cam-nang-huu-ich/2017/05/' . $link);
        $content = $html_content->find('.formatTextStandard')[0];
        foreach ($content->find('a') as $value2) {
            $value2->outertext = $value2->plaintext;
        }
        foreach ($content->find('.listRealted') as $value2) {
            $value2->outertext = "";
        }
        foreach ($content->find('.prIntro') as $value2) {
            $value2->outertext = "";
        }

        $jobs["content"] = trim($content->innertext);
        $title = addslashes($jobs['title']);
        $decs = addslashes($jobs['desc']);
        $img = basename($jobs['img']);
        $noidung = addslashes($jobs["content"]);
        $query = "SELECT * FROM pabulum where name='$title' AND cate_id=3";
        if ($result_exits = mysqli_query($con, $query)) {
            if (mysqli_num_rows($result_exits) > 0) {
                echo 'Tồn tại tin trong dữ liệu' . "<br>";
            } else {
                $sql = "INSERT INTO pabulum(cate_id,name,img,mota,content,view_number,like_number) VALUES (3,'$title','$img','$decs','$noidung',0,0)";
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