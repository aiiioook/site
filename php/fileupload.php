<html>
<head>
  <title>Загрузка файлов на сервер</title>
</head>
<body>
      <?php 
if (!isset( $_COKKIE['username'] ) ){
?>
      <h2><p><b> Форма для загрузки файлов </b></p></h2>
      <form action="upload.php" method="post" enctype="multipart/form-data">
      <input type="file" name="filename"><br> 
      <input type="submit" value="Загрузить"><br>
      </form>
<?php 
}
else {
  echo "Доступа нет";
  ?>
   <h2><p><b> Форма для загрузки файлов </b></p></h2>
      <form action="upload.php" method="post" enctype="multipart/form-data">
      <input type="file" name="filename"><br> 
      <input type="submit" value="Загрузить"><br>
      </form>
  <?php
}

?>      
</body>
</html>