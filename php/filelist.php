<?php 
public function get_posts()
{
$dbc = mysqli_connect('localhost','root','','lesson');
$sql = "SELECT * FROM posts";
$result = mysql_query($dbc, $sql);
$posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
return $posts;
}
?>