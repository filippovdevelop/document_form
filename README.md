# Генерация печатных форм с помощью разметки и подстановки в шаблоны word
Генерация печатных форм с помощью php на основе шаблонов docx

0) Цель: в разы повысить скорость разработки большинства печатных форм за счет шаблонизации (1 форма = 1 день, а не 1 форма = 7-15-20 дней с ошибками).
Также повышается удобство разработки: упрощение, нет необходимости бэкэндеру писать HTML.
Возможно автоматическое тестирование формы на предмет "вылезает за края","смещения" и др.

1) Общая суть: использование библиотеки PHPWORD для генерации печатной формы в docx с помощью размеченного word шаблона от аналитика/заказчика.

2) Общий алгоритм: 
-Заказчик выдает печатную форму в docx. 
-Аналитик или разработчик размечает ее тегами типа ${1}, куда будут подстановкой вставляться данные. 
-Разработчик подготавливает массив для заполнения - например из результатов заполнения формы или запроса к БД. 
-Вызывает реализованные функции по генерации документа и получает готовый файл.
-Его сразу можно переформатировать в pdf, отдавать на скачивание.

Зависимости:
1) Библиотека phpword  https://github.com/PHPOffice/PHPWord https://phpword.readthedocs.io/en/latest/
2) Composer


Установка и использование:
1)  composer require phpoffice/phpword в папку проекта
2)  открыть в браузере файл create.php
3)  В директорию проекта сохранится файл
4)  Можно менять данные/шаблон

Что требуется чаще всего (типовые примеры + подходы к ним)
1) Заявления (Заявление в ЛК на перевод на дистанционное обучение. Одностраничные документы с персональной инфой и основным текстом.) - простая подстановка
2) Заявки (как заявления, но с таблицей данных по человеку) - подстановка + генерация таблицы по шаблону
3) Списки людей в таблице с данными - генерация таблицы по шаблону
4) Сложные бланки (пример командировочные заявления) - подстановка
5) Многостраничные статичные: например эл. зачетка (также шаблоны + склейка страниц) 
6) Динамичные, например резюме (удалять невостребованные секции)
7) Крайний случай - рисовать HTML
