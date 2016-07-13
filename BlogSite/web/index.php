<!DOCTYPE html>
<html lang="en">
<head>
    <title>Osterley Blog</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/lib/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="/lib/js/bootstrap.min.js"></script>
</head>

<body>
<?php
include("header.php"); 
include 'common.php';
include dirname(__FILE__).'/../App/blog_app.php';
include dirname(__FILE__).'/../dao/BlogDao.php';
include 'View/blog_view.php';
use function View\display;
use function BlogDao\read_articles;
$result = read_articles($pdo);


?>

<h2><font face="verdana"color="black">Newest articles </font></p></h2>

<?php 
echo display('preview_articles', ['articles' => $result]);
?>
<h2> <a href="/template/blog_post_form.html"><font face="verdana">Submit an article</font></a></h2>

<?php include("Footer.php"); ?>

</body>
</html>