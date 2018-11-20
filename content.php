<?php 
function get_posts()
{
$dbc = mysqli_connect('localhost','root','','lesson');
$sql = "SELECT * FROM posts";
$result = mysqli_query($dbc, $sql);
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
return $posts;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="style/styleContent.css">
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<meta charset="UTF-8">
	<title>Content</title>
</head>
<body>
	<header style="background-color: #f45b69;padding: 10%">
			<?php $posts = get_posts(); ?>
			<?php foreach($posts as $post): ?>
				<div class="row">
  <div class="span8">
    <div class="row">
      <div class="span8">
        <h4><strong><a href="/post.php?post_id=<?=$post['id']?>"><?=$post['title']?></a></strong></h4>
      </div>
    </div>
    <div class="row">
      <div class="span2">
        <a href="#" class="thumbnail">
            <img src="<?=$post['image']?>" alt="" >
        </a>
      </div>
      <div class="span6">      
        <p>
          <?=mb_substr($post['description'],0,150,'UTF-8'). '...'?>
        </p>
        <p><a class="btn btn-info btn-sm" href="/post.php?post_id=<?=$post['id']?>" style="">Читать полностью</a></p>

      </div>
    </div>
    <div class="row">
      <div class="span8">
        <p></p>
        <p>
          <i class="icon-user"></i> by <a href="#"><?=$post['author']?> </a> 
           |   <i class="icon-calendar"></i>DATE
        </p>
      </div>
    </div>
  </div>
</div>
<hr>
<?php endforeach; ?>


	</header>
	<footer style="background-color: #22181c;padding: 10%" >
			

		<h1>This is c</h1>
		<p>oaoaoaoao</p>
	</footer>
</body>
</html>