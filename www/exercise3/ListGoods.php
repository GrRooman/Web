<?php
/**
 * Фаил который выводит из БД список товаров и их
 * максимальную и минимальную цену
 */

require_once "login.php";

echo "<hr>";
echo "Список товаров и их цены" . "</br>";
echo "<hr>";



$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка1 " . mysqli_error($link));


$result = mysqli_query($link, "SELECT distinct goods.name,
	                  (select min(price.price) from price where goods.price_id=price.price_id) as min_price,
	                  (select max(price.price) from price where goods.price_id=price.price_id) as max_price
                       FROM goods JOIN price 
                       on goods.price_id=price.price_id");
$rows = mysqli_num_rows($result);

for ($j = 0; $j < $rows; ++$j) {
    $row = mysqli_fetch_row($result);
    foreach ($row as $value) {
        echo $value . " ";

    }
    echo '<br />';
}
echo "<hr>";
