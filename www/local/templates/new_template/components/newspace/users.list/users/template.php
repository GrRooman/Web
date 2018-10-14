<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?

?>
<div>
	<table border class="UPtable">
	<tr><th>Номер</th><th>Логин</th><th>ФИО</th><th>E-mail</th><th>Последняя авторизация</th></tr>
<?foreach ($arResult as $arItem):
$count++;
//tdump($arItem);
?>
		<tr><td><?echo $count?></td>
		<td><?=$arItem["LOGIN"] ?></td>
		<td><?=$arItem["LAST_NAME"]." ".$arItem["NAME"]." ".$arItem["SECOND_NAME"]?></td>
		<td><?=$arItem["EMAIL"]?></td>
		<td><?=$arItem["LAST_LOGIN"]?></td></tr>

<?
endforeach;
?>	
	</table>
</div>