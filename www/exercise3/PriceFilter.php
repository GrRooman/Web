<?php
/**
 *
 */

require_once "login.php";


echo "<hr>";
echo "Фильтр по названию товара" . "</br>";
echo "<hr>";

$strCode = <<<TES
<form name="PriceFilter.php" action="PriceFilter.php" method="post">
  <table>
    <tr>
      <td>Цена от:</td>
      <td><input type="text" name="price_start" /> </td>
    </tr>
    <tr>
      <td>Цена до:</td>
      <td><input type="text" name="price_end" /> </td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="submit" name="submit" value="Подобрать товар" />
      </td>
    </tr>
  </table>
</form>
TES;
echo $strCode;
unset($sql);

$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка1 " . mysqli_error($link));


function addWhere($where, $add, $and = true)
{
    if ($where) {
        if ($and) $where .= " AND $add";
        else $where .= " OR $add";
    } else $where = $add;
    return $where;
}

if (!empty($_POST["submit"])) {
    $where = "";

    if ($_POST["price_start"]) $where = addWhere($where, "`price` >= " . htmlspecialchars($_POST["price_start"])) . "";

    if ($_POST["price_end"]) $where = addWhere($where, "`price` <= " . htmlspecialchars($_POST["price_end"])) . "";

    $sql = "SELECT goods.name FROM `goods` JOIN price on goods.price_id=price.id";
    if ($where) $sql .= " WHERE $where";
}


function getQuer($e_link, $e_sql)
{
    /**
     * @param  $result  ошибка изза пустого значения
     * "param  $rows  ошибка изза пустого значения
     */
    @$result = mysqli_query($e_link, $e_sql);
    @$rows = mysqli_num_rows($result);

    for ($j = 0; $j < $rows; ++$j) {
        $row = mysqli_fetch_row($result);
        foreach ($row as $value) {
            echo $value . " ";

        }
        echo '<br />';
    }
}

/**
 * ошибки изза пустого значения
 *
 */

if (@$sql !== "SELECT goods.name FROM `goods` JOIN price on goods.price_id=price.id") getQuer($link, @$sql);

mysqli_close($link);
echo "<hr>";
?>