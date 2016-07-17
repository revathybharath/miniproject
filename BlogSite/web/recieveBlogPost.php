<?php
include 'header.php';
include '../model/Article.php';
//include '../dao/BlogDao.php';
include '../app/blog_app.php';
include 'common.php';

use function create_post;

$articleTitle = $_POST['articleTitle'];
$articleData = $_POST['articleData'];


//echo $articleData;
//echo $articleTitle;
//($ArticleId, $CategoryId, $UserId, $PostTitle, $CreatedOn, $Content, $RoleID)
$blg = new Article (1, 1, 1, $articleTitle, date('Y-m-d H:i:s'), $articleData,1);

//echo $blg -> getPostTitle();

create_post($pdo,$blg);

echo 'Post has been created!';
?>
<br>
<a href='/'>Home</a>

<?php
include 'footer.php'; 
?>
