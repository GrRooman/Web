<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Пользователи");
?><?$APPLICATION->IncludeComponent(
	"bitrix:main.user.link",
	"",
	Array(
		"CACHE_TIME" => "7200",
		"CACHE_TYPE" => "A",
		"ID" => "",
		"NAME_TEMPLATE" => "#LAST_NAME# #NAME# #SECOND_NAME#",
		"SHOW_LOGIN" => "Y",
		"USE_THUMBNAIL_LIST" => "Y"
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>