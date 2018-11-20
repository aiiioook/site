<html>
<head>
  <title>Результат загрузки файла</title>
  <meta charset="utf-8">
</head>
<body>
<?php
if (!empty($_COOKIE['username']) && ($_COOKIE['user_id'])) {
   if($_FILES["filename"]["size"] > 1024*3*1024)
   {
     echo ("Размер файла превышает три мегабайта");
     exit;
   }
   // Проверяем загружен ли файл
   if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
   {
    echo "Файл загружен";
     // Если файл загружен успешно, перемещаем его
     // из временной директории в конечную
     move_uploaded_file($_FILES["filename"]["tmp_name"], "../uploads/".$_FILES["filename"]["name"]);
   } else {
      echo("Ошибка загрузки файла");
   }
 }
 else {
  echo "Доступ закрыт!";
 }
?>
</body>
</html>