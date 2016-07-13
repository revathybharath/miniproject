
<?php 
include("header.php"); 
include 'common.php';
include 'View/blog_view.php';
include dirname(__FILE__).'/../dao/BlogDao.php';

use function View\display;

$result = BlogDao\read_article_id($pdo, htmlspecialchars($_GET["id"]));


echo display('article', ['article' => $result]);

include 'footer.php'; 
?>