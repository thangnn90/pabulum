<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 30/05/2017
 * Time: 08:06
 */
$conn = mysqli_connect("localhost", "root", "", "pabulum");
if (!$conn) {
    echo "connect fail" . mysqli_connect_error();
}
mysqli_set_charset($conn, 'utf8');
if (!empty($_POST["keyword"])) {
    $query = "SELECT * FROM pabulum WHERE name like '" . $_POST["keyword"] . "%' ORDER BY name LIMIT 0,6";
    $result = mysqli_query($conn, $query);
    if (!empty($result)) {
        ?>
        <ul id="country-list" style="width: inherit">
            <?php
            foreach ($result as $mon) {
                ?>
                <li onClick="selectCountry('<?php echo $mon["id"]; ?>');">
                    <img src="images/<?php echo $mon['img'] ?>" class="img-rounded" width="60" height="60"/>
                    <p><?php echo $mon["name"]; ?></p>
                </li>
            <?php } ?>
        </ul>
    <?php }
} ?>