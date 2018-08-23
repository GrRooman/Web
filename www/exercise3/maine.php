<?php
/**
 *
 *
 */
//require_once "ListGoods.php";

require_once('login.php');

// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка1 " . mysqli_error($link));


$res = mysqli_query($link, "SELECT * FROM rubrics ORDER BY id"); //Один единственный запрос на выборку =)

$rubr = getDescRubric($res);  //из результата выборки получаем массив с категориями
echo getTree($rubr);          //из массива с категориями получаем готовое дерево категорий =)

/**
 * получение списка товара
 * и скрытие ошибки изза пустого id
 */

if (@$_GET[id])getListGoods($link);


// выполняем операции с базой данных
/**
 *  функция получения массива с категориями
 * @param $res
 * @return array
 *
 */


function getDescRubric($res)
{

    $levels = array();
    $tree = array();
    $cur = array();

    while ($rows = mysqli_fetch_assoc($res)) {

        $cur = &$levels[$rows['id']];
        $cur['pid'] = $rows['pid'];
        $cur['name'] = $rows['name'];

        if ($rows['pid'] == 0) {
            $tree[$rows['id']] = &$cur;
        } else {
            $levels[$rows['pid']]['children'][$rows['id']] = &$cur;
        }

    }
    return $tree;
}

/**
 * Функция построения дерева категорий и подкатегорий
 * @param $arr
 * @return string
 *
 */

function getTree($arr)
{
    $out = '';
    $out .= '<ul>';
    foreach ($arr as $k => $v) {

        $out .= '<li><a href="?id=' . $k . '">' . $v['name'] . '</a></li>';
        if (!empty($v['children'])) {
            $out .= getTree($v['children']);
        }

    }
    $out .= '</ul>';
    return $out;

}

/**
 * Функция вывода списка продуктов
 * @param $e_link
 *
 */

function getListGoods($e_link)
{
    $idQuery = mysqli_query($e_link, "SELECT goods.name FROM goods 
                            JOIN rubrics_goods ON rubrics_goods.good_code=goods.code
                            JOIN rubrics ON rubrics.code=rubrics_goods.rubr_code 
                            where rubrics.id=$_GET[id];");

    while ($idArray = mysqli_fetch_assoc($idQuery)) {
        echo $idArray['name'] . "</br>";
    }
}


// закрываем подключение
mysqli_close($link);