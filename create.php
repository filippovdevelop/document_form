<?php


/*
Пример данных, для наполнения шаблона
Могут быть получены из формы, запроса к бд и др.
*/
$surname = "Всеволодову";
$name = "Ивану";
$thirdname = "Ивановичу";
$course = 2;
$educationProfile = "18.03.02 «Энерго - и ресурсосберегающие процессы в химической технологии, нефтехимии и биотехнологии» 
";
$typeEducation = "очной";
$group = "РГ-11-07";
$faculty = "ФРНГМ";
$adress = "г. Москва, ул. Бутлерова, д.3";
$telephone = "+79852225544";
$email = "mail1434@yandex.ru";
$fio = "{$surname} {$name} {$thirdname}";
$fio2 = "Петрова Петра Петровича";
$day = 25;
$month = "июля";
$year = 21;
$fio3 = "Петров П.П.";

/*
Создаем массив согласно разметке шаблона
*/
$documentDataArray = array(
    '1' => $fio, //ФИО в дат. падеже
    '2' => $course, // курс цифрой
    '3' => $educationProfile, // профиль обучения
    '4' => $typeEducation, // 
    '5' => $group, // группа обучения
    '6' => $faculty, // факультет обучения
    '7' => $fio2, // фио
    '8' => $adress,
    '9' => $telephone,
    '10' => $email,
    '11' => $day,
    '12' => $month,
    '13' => $year,
    '14' => $fio3
);




//Создаем универсальную функцию

/**
* Подставляет данные массива в шаблон и выдает файл на скачивание
* 
* @param array $inputArray Входной массив с данными для автозамены
*
* @param string $templateDir Путь до шаблона с расширением
*
* @param string $uploadFileDir Путь до директории скачанных файлов
*
* @param string $outputFileName Имя сгенерированного файла
*
* @return file скачивание файла из браузера
*/
function create_document($inputArray, $templateDir, $uploadFileDir, $outputFileName) {
    require_once 'vendor/autoload.php';
    
    //Подстановка данных 
    $document = new \PhpOffice\PhpWord\TemplateProcessor($templateDir);
    $uploadDir = $uploadFileDir;
    $document->setValues($inputArray);

    $document->saveAs($outputFileName); //если надо просто сохранить файл без скачивания
    echo("Документ создан функцией");

    /*
    //Скачивание файла
    // Имя скачиваемого файла
    $downloadFile = $outputFileName;
    // Контент-тип означающий скачивание
    header("Content-Type: application/octet-stream");
    // Размер в байтах
    header("Accept-Ranges: bytes");
    // Размер файла
    header("Content-Length: ".filesize($downloadFile));
    // Расположение скачиваемого файла
    header("Content-Disposition: attachment; filename=".$downloadFile);  
    // Прочитать файл
    readfile($downloadFile);
    //unlink($uploadFile);
    //unlink($outputFile);
    */
}

//Вызываем функцию
create_document($documentDataArray, 
'./template4.docx', 
__DIR__, 
'new_file.docx');

