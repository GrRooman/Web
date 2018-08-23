<?php
/**
 *
 */

require_once "login.php";


$text = <<<Thtm
<form method = 'POST' enctype = "multipart/form-data" >
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <input type = 'file' name = 'fileXML' />
    <input type = 'submit' value = 'Загрузить' />
</form>
Thtm;
echo $text;


$uploaddir = $_SERVER['DOCUMENT_ROOT'] . '\\uploads\\';
$shortName = basename($_FILES['fileXML']['name']);
$uploadfile = "$uploaddir" . "$shortName";


echo '<pre>';
if (move_uploaded_file($_FILES['fileXML']['tmp_name'], $uploadfile)) {
    echo "Файл был успешно загружен.\n";
} else {
    echo "Ошибка!\n";
}



if (file_exists($uploadfile)) {
    $xml = simplexml_load_file($uploadfile);

    print_r($xml);
} else {
    exit('Не удалось открыть файл test.xml.');
}

