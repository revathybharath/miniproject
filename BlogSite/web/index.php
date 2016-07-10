<?php include("header.php"); ?>

<?php
include 'common.php';
include dirname(__FILE__).'/../App/blog_app.php';

//use function App\get_article_by_id;
//$testArticle = get_article_by_id($pdo, 1);

//echo $testArticle->getPostTitle();
//echo $testArticle->getContent();
?>

<h2><font face="verdana"color="white">Newest articles </font></p></h2>
<h2> <a href='/template/blog_post_form.html'><font face="verdana">Submit an article</font></a></h2>

<?php include("Footer.php"); ?>
