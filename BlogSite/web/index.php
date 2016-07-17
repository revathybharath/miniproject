<?php 
include("header.php");
include 'common.php';
include '../App/blog_app.php';
include 'View/blog_view.php';
use function View\display;
$result = App\read_articles($pdo);
?>

<h2><font face="verdana"color="black">Newest articles </font></p></h2>

<?php 

echo display('preview_articles', ['articles' => $result]);
?>
<h3> <a href="/createBlogPost.php"><font face="verdana">Submit an article</font></a></h3>

<?php include("Footer.php"); ?>
