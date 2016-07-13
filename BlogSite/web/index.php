<?php 
include("header.php"); 
include 'common.php';
include dirname(__FILE__).'/../App/blog_app.php';
include 'View/blog_view.php';
use function View\display;
$result = App\read_articles($pdo);
?>

<h2><font face="verdana"color="black">Newest articles </font></p></h2>

<?php 

echo display('preview_articles', ['articles' => $result]);
?>
<h2> <a href="/template/blog_post_form.html"><font face="verdana">Submit an article</font></a></h2>

<?php include("Footer.php"); ?>
