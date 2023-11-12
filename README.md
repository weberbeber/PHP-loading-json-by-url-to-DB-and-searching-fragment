# Обработка json файлов в php для заполнения БД
  Есть 2 json файла, которые содержать информацию блога, записи(posts) и комментарии к ним(comments). Нужно обработать json файлы, занести информацию в БД и произвести поиск комментариев.

## Этот проект реализует следующие задачи: 
1. В файле DB.sql описывается БД с которой предстоит работать.
2. В основном файле main.php идёт подключение к имеющейся БД через класс Connection и парсинг json файла через класс Parser с загрузкой в БД.
3. Файл index.html предоставляет интерфейс для поиска комментариев к записям (search.php) в БД.
