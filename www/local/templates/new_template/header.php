<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE HTML>
<html lang=”<?=LANGUAGE_ID;?>
<head>
<?$APPLICATION->ShowHead();?>
	<title><?$APPLICATION->ShowTitle();?></title>
	<?
	//test_dump(SITE_TEMPLATE_PATH);
	$assets = \Bitrix\Main\Page\Asset::getInstance();
	
	$assets->addCss(SITE_TEMPLATE_PATH . "/template_styles.css");
	$APPLICATION->AddHeadScript("/local/templates/.default/js/jquery-1.8.2.min.js");
	$APPLICATION->AddHeadScript("/local/templates/.default/js/slides.min.jquery.js");
	$APPLICATION->AddHeadScript("/local/templates/.default/js/jquery.carouFredSel-6.1.0-packed.js");
	$APPLICATION->AddHeadScript("/local/templates/.default/js/functions.js");
	?>
	<link rel="shortcut icon" type="image/x-icon" href="/local/templates/favicon.ico"/>
	<!--[if gte IE 9]><style type="text/css">.gradient {filter: none;}</style><![endif]-->
</head>
<body>
<?$APPLICATION->ShowPanel();?>
	<div class="wrap">
		<div class="hd_header_area"> 
			<div class="hd_header">
				<table>
					<tr>
						<td rowspan="2" class="hd_companyname">
							<h1><?$APPLICATION->IncludeComponent(
									"bitrix:main.include", 
									".default", 
								array(
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "inc",
									"EDIT_TEMPLATE" => "",
									"PATH" => "/local/templates/new_template/include/logo.php",
									"COMPONENT_TEMPLATE" => ".default"
									),
									false
									);?>
							</h1>
						</td>
						<td rowspan="2" class="hd_txarea">
							<span class="tel"><?$APPLICATION->IncludeComponent(
								"bitrix:main.include", 
								".default", 
								array(
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "inc",
									"EDIT_TEMPLATE" => "",
									"PATH" => "/local/templates/new_template/include/phonenumber.php",
									"COMPONENT_TEMPLATE" => ".default"
								),
								false
							);?>
							</span>	<br/>	
							<?=GetMessage("WORK_TIME");?> <span class="workhours">ежедневно с 9-00 до 18-00</span>						
						</td>
						<td style="width:232px">
							<form action="">
								<div class="hd_search_form" style="float:right;">
									<input placeholder="Поиск" type="text"/>
									<input type="submit" value=""/>
								</div>
							</form>
						</td>
					</tr>
					<tr>
						<td style="padding-top: 11px;">
							<?$APPLICATION->IncludeComponent(
								"bitrix:system.auth.form",
								"auth",
								Array(
									"FORGOT_PASSWORD_URL" => "/user/",
									"PROFILE_URL" => "/user/profile.php",
									"REGISTER_URL" => "/user/registration.php",
									"SHOW_ERRORS" => "Y"
								)
							);?><br>
						</td>
					</tr>
				</table>
				<?$APPLICATION->IncludeComponent(
					"bitrix:menu", 
					"top_multi", 
					array(
						"ALLOW_MULTI_SELECT" => "N",
						"CHILD_MENU_TYPE" => "left",
						"COMPONENT_TEMPLATE" => "top_multi",
						"DELAY" => "N",
						"MAX_LEVEL" => "2",
						"MENU_CACHE_GET_VARS" => array(
						),
						"MENU_CACHE_TIME" => "3600",
						"MENU_CACHE_TYPE" => "A",
						"MENU_CACHE_USE_GROUPS" => "Y",
						"ROOT_MENU_TYPE" => "top",
						"USE_EXT" => "N"
					),
					false
				);?><br>
			</div>
		</div>
		
		<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "nav", Array(
		"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
		"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
		"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
			),
			false
			);?>
<br>
		<div class="main_container page">
			<div class="mn_container">
				<div class="mn_content">
					<div class="main_post">
						<div class="main_title">
							<p class="title"><?$APPLICATION->ShowTitle(false);?></p>
						</div>
						<!-- workarea -->