<?php 

include 'header.php';
include 'common.php';
include '../App/blog_app.php';
include 'View/blog_view.php';
use function View\display, 
        App\read_users, 
        App\read_articles,  
        App\read_category,  
        App\read_roles;

$usr = $_SESSION['UserObject'];

if ((empty($usr)) || (is_null($usr)))
{
    header("Location: index.php");
}

if ($usr->getRoleName() != 'Admin')
{
    echo 'Only user with adminstrator preveliges can access Admin page';
}
else
{
    $result = read_articles($pdo);
    echo display('articles', ['articles' => $result]);

    $result = read_users($pdo);
    echo display('users', ['users' => $result]);

    //$result = read_roles($pdo);
    //echo display('role', ['Role' => $result]);

    $result = read_category($pdo);
    echo display('category', ['Category' => $result]);
}

include("footer.php"); 
?>