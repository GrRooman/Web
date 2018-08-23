



<?php ## Формирование XML-файла
$content = '<?xml version="1.0" encoding="windows-1251"?><xml version="2.2"></xml>';
$xml = new SimpleXMLElement($content);

$goo = $xml->addChild('goods');

// Установка соединения с базой данных
require_once("login.php");

$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка1 " . mysqli_error($link));

$stringQuery = "SELECT goods.code,goods.name,price.type_price,price.price,
attribute_product.attribute,rubrics.name FROM goods 
left JOIN price ON goods.price_id=price.id
left JOIN attribute_product ON goods.name=attribute_product.name
JOIN rubrics ON rubrics.code=goods.code
where rubrics.id=12";

try {
    $query = mysqli_query($link,$stringQuery);

    while ($news = mysqli_fetch_assoc($query)) {
        $item = $goo->addChild('goods');
        $item->addAttribute('code',$news['code'] );
        $item->addAttribute('name',$news['name'] );
        $pric = $item->addChild('price',$news['price']);
        $pric->addAttribute('тип цены',$news['type_price']);

    }
} catch (Exception $e) {
    echo "Ошибка выполнения запроса: " . $e->getMessage();
}
$xml->asXML('build.xml');