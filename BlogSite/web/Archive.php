<?php
include("header.php"); 
include 'common.php';
include dirname(__FILE__).'/../App/blog_app.php';
include 'View/blog_view.php';
use function View\display;
$result = App\read_articles($pdo);
?>

<html>
    <title>Archive</title>
    <body>
    <h1>Welcome to the Archives!</h1>
    <h2>Here you can find all of the articles ever posted, lucky you!</h2>
    </body>
</html>

<?php echo display('articles_archive', ['articles' => $result]);

include("Footer.php"); 
?>