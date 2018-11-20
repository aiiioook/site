<?php 
$post_id = $_GET['post_id'];
function get_post_by_id($post_id)
{
	$dbc = mysqli_connect('localhost','root','','lesson');
	$sql = "SELECT * FROM posts WHERE id = ".$post_id;
	$result = mysqli_query($dbc,$sql);
	$post = mysqli_fetch_assoc($result);
	return $post; 
}
function get_posts()
{
$dbc = mysqli_connect('localhost','root','','lesson');
$sql = "SELECT * FROM posts";
$result = mysqli_query($dbc, $sql);
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
return $posts;
}
if (!is_numeric($post_id)) {
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style/styleContent.css">
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<?$post = get_post_by_id($post_id);?>
	<header style="background-color: #f45b69;padding: 10%">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="page-header">
						<h1><?=$post['title'];?></h1>
						<p>
          <i class="icon-user"></i> by <a href="#"><?=$post['author']?> </a> 
           |   <i class="icon-calendar"></i>DATE
        </p>
					</div>
					     <div class="span8">
        <p></p>
      
      </div>
      <div class="post-content">
      	<?php 
      		echo "<pre>";
      		print_r($post['description']);
      	?>
      </div>
				</div>
			</div>
		</div>
		<!--  -->
	</header>
	<footer style="background-color: #22181c;padding: 10%">
		
	</footer>

	</div>
</body>
</html>