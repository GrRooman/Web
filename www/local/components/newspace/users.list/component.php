<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();



$filter = Array('ID'=>""); 
$rsUsers = CUser::GetList(($by="ID"), ($order="asc"), $filter); 
while($arDataUser = $rsUsers->GetNext()) 
{  
$arResult[]= $arDataUser;
}

$this->IncludeComponentTemplate();
?>