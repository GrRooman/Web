<?php
/**
 *
 */

require_once "login.php";

echo "<hr>";
echo "Список товаров и их цены" . "</br>";
echo "<hr>";

$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка1 " . mysqli_error($link));


$result = mysqli_query($link, "SELECT goods.name,price.price FROM goods JOIN price
ON goods.price_id = price.id;");
$rows = mysqli_num_rows($result);

for ($j = 0; $j < $rows; ++$j) {
    $row = mysqli_fetch_row($result);
    foreach ($row as $value) {
        echo $value . " ";

    }
    echo '<br />';
}
echo "<hr>";
