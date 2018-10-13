<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Пользователи");
?><?$APPLICATION->IncludeComponent(
	"newspace:users.list",
	"users",
	Array(
		"CACHE_TIME" => "0",
		"CACHE_TYPE" => "A",
		"DATE_FORMAT" => "d.m.Y",
		"DATE_TIME_FORMAT" => "d.m.Y H:i:s",
		"PAGE_NAVIGATION_TEMPLATE" => "",
		"SEO_USER" => "Y",
		"SET_NAVIGATION" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_USER_STATUS" => "N",
		"URL_TEMPLATES_MESSAGE_SEND" => "message_send.php?TYPE=#TYPE#&UID=#UID#",
		"URL_TEMPLATES_PM_EDIT" => "pm_edit.php?FID=#FID#&MID=#MID#&UID=#UID#&mode=#mode#",
		"URL_TEMPLATES_PROFILE_VIEW" => "profile_view.php?UID=#UID#",
		"URL_TEMPLATES_USER_POST" => "user_post.php?UID=#UID#&mode=#mode#",
		"USERS_PER_PAGE" => "20"
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>