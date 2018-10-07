<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");
?><?$APPLICATION->IncludeComponent(
	"bitrix:forum.user.profile.view", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"UID" => $_REQUEST["2"],
		"URL_TEMPLATES_READ" => "read.php?FID=#FID#&TID=#TID#",
		"URL_TEMPLATES_MESSAGE" => "message.php?FID=#FID#&TID=#TID#&MID=#MID#",
		"URL_TEMPLATES_PROFILE" => "profile.php?UID=#UID#",
		"URL_TEMPLATES_USER_LIST" => "user_list.php",
		"URL_TEMPLATES_PM_LIST" => "pm_list.php",
		"URL_TEMPLATES_MESSAGE_SEND" => "message_send.php?TYPE=#TYPE#&UID=#UID#",
		"URL_TEMPLATES_PM_EDIT" => "pm_edit.php",
		"URL_TEMPLATES_SUBSCR_LIST" => "subscr_list.php",
		"URL_TEMPLATES_USER_POST" => "user_post.php?UID=#UID#&mode=#mode#",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "0",
		"FID_RANGE" => array(
		),
		"DATE_FORMAT" => "d.m.Y",
		"DATE_TIME_FORMAT" => "d.m.Y H:i:s",
		"SEND_MAIL" => "E",
		"SEND_ICQ" => "A",
		"USER_PROPERTY" => array(
		),
		"SET_NAVIGATION" => "Y",
		"SET_TITLE" => "Y",
		"USER_PROPERTY_NAME" => "",
		"SHOW_RATING" => "",
		"RATING_ID" => "",
		"RATING_TYPE" => ""
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>