<?php 

include 'header.php';
include 'common.php';
include '../App/blog_app.php';
include 'View/blog_view.php';
use function View\display, App\read_users, App\read_articles;

$result = read_articles($pdo);
echo display('articles', ['articles' => $result]);

$result = read_users($pdo);
echo display('users', ['users' => $result]);

include("footer.php");
?>