<?php include("header.php"); ?>

<?php
include 'common.php';
include dirname(__FILE__).'/../App/blog_app.php';

use function App\get_article_by_id;
$testArticle = get_article_by_id($pdo, 1);

//echo $testArticle->getPostTitle();
//echo $testArticle->getContent();
?>

<h2> Newest articles </h2>
<h2> Submit an article</h2>

<?php include("Footer.php"); ?>