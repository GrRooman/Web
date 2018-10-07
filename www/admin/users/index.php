<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Пользователи");
?><?$APPLICATION->IncludeComponent(
	"bitrix:forum.user.list", 
	"users", 
	array(
		"COMPONENT_TEMPLATE" => "users",
		"SHOW_USER_STATUS" => "N",
		"URL_TEMPLATES_MESSAGE_SEND" => "",
		"URL_TEMPLATES_PM_EDIT" => "",
		"URL_TEMPLATES_PROFILE_VIEW" => "profile_view.php?UID=#UID#",
		"URL_TEMPLATES_USER_POST" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "0",
		"USERS_PER_PAGE" => "20",
		"SET_NAVIGATION" => "Y",
		"DATE_FORMAT" => "d.m.Y",
		"DATE_TIME_FORMAT" => "d.m.Y H:i:s",
		"PAGE_NAVIGATION_TEMPLATE" => "",
		"SET_TITLE" => "Y",
		"SEO_USER" => "Y"
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>