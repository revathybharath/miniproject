<?php  
namespace App;
include '../dao/BlogDao.php';

//DB\
use function BlogDao\read_article_id;
use function BlogDao\read_articles_from_db;
use function BlogDao\read_all_users;
use function BlogDao\read_user;
use function BlogDao\create_post_in_db;
use function BlogDao\create_user_in_db;
use function BlogDao\ValidateUserLogin;
use function BlogDao\read_category_from_db;
use function BlogDao\read_roles_from_db;


function get_article_by_id($pdo, $id) {
    return read_article_id($pdo,$id);
}

function read_articles($pdo)
{
    return read_articles_from_db($pdo);
}

function read_users($pdo)
{
    return read_all_users($pdo);
}

function read_user_ById($pdo, $userId)
{
    return read_user($pdo, $userId);
}

function create_post($pdo, $new_article) 
{
    return create_post_in_db($pdo, $new_article);
}

function create_user($pdo, $new_user)
{
    return create_user_in_db($pdo, $new_user);
}

function create_category($pdo, $new_category) 
{
    return create_category($pdo, $new_category);
}


function UserLogin($pdo, $userName, $password)
{
    return ValidateUserLogin($pdo, $userName, $password);
}

function read_roles($pdo)
{
    return read_roles_from_db($pdo);
}

function read_category($pdo)
{
    return read_category_from_db($pdo);
}

?>
