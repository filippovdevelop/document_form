//Формируем массив массивов для последующей вставки
$dataArray = [
    array(
        "surname" => "max",
        "telephone" => "8999"
    ),
    
    array(
        "surname" => "olga",
        "telephone" => "8777"
    )
    ,
    
    array(
        "surname" => "dima",
        "telephone" => "8555"
    )
    ,
    
    array(
        "surname" => "nata",
        "telephone" => "8444"
    )

];

//Подсчитаем количество строк для вставки
$row_num = count($dataArray);
 
// Подключаем автозагрузчик классов подключенных библиотек
require_once 'vendor/autoload.php';

//Подключаем шаблон
$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('./template10.docx');

/*
Копируем строки таблицы нужное количество раз для последующей вставки
в новые строки/ячейки будут вставлены теги с нумерацией
т.е. например если в строке был ${col2}, то
в последующих строках будут
col2#1
col2#2
col2#3
...
*/
$templateProcessor->cloneRow('col2', $row_num);


//Циклом подставляем значения в теги 
for ($i=1; $i <= $row_num; $i++) {

    $templateProcessor->setValue("col1#{$i}", $dataArray[$i-1]['surname']); ;
    $templateProcessor->setValue("col2#{$i}", $dataArray[$i-1]['telephone']);
    
};

//Сохраняем файл
$templateProcessor->saveAs('new_file.docx');
