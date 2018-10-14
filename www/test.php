<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");
?><?$APPLICATION->IncludeComponent(
	"newspace:us",
	"",
	Array(
		"SEO_USER" => "Y",
		"TEMPLATE_FOR_DATE" => "Y;m;d"
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>