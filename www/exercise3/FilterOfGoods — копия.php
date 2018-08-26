<?php
/**
 *
 */

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
      <td colspan="2">Товар</td>
    </tr>
    <tr>
      <td>Хим. вещества</td>
      <td>
        <input type="checkbox" name="goods[]" value="1" />
      </td>
    </tr>
    <tr>
      <td>Автозапчасти</td>
      <td>
        <input type="checkbox" name="goods[]" value="2" />
      </td>
    </tr>
    <tr>
      <td>Стройматериалы</td>
      <td>
        <input type="checkbox" name="goods[]" value="3" />
      </td>
    </tr>
    <tr>
      <td>Спец. оборудование</td>
      <td>
        <input type="checkbox" name="goods[]" value="4" />
      </td>
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
    if ($_POST["price_start"]) $where = addWhere($where, "`price` >= '" . htmlspecialchars($_POST["price_start"])) . "'";
    if ($_POST["price_end"]) $where = addWhere($where, "`price` <= '" . htmlspecialchars($_POST["price_end"])) . "'";
//    if ($_POST["goods"]) $where = addWhere($where, "`goods` IN (" . htmlspecialchars(implode(",", $_POST["manufacturers"])) . ")");

    $sql = "SELECT * FROM `goods` JOIN price on goods.price_id=price.id";
    if ($where) $sql .= " WHERE $where";
    echo $sql;
}
echo "<hr>";
?>