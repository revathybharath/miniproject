<?php  
namespace App;
include '../dao/BlogDao.php';

//DB\
use function BlogDao\read_article_id;
use function BlogDao\read_articles;
use function BlogDao\read_users;
use function BlogDao\read_user_ById;
use function BlogDao\create_post;
use function BlogDao\create_user;
use function BlogDao\Create_category;
use function BlogDao\UserLogin;
use function BlogDao\read_category;
use function BlogDao\read_roles;


function get_article_by_id($pdo, $id) {
    return read_article_id($pdo,$id);
}

function read_articles($pdo)
{
    return read_articles($pdo);
}

function read_users($pdo)
{
    return read_users($pdo);
}

function read_user_ById($pdo, $userId)
{
    return read_user_ById($pdo, $userId);
}

function create_post($pdo, $new_article) 
{
    return create_post($pdo, $new_article);
}

function create_user($pdo, $new_user)
{
    return create_user($pdo, $new_user);
}

function create_category($pdo, $new_category) 
{
    return create_category($pdo, $new_category);
}


function UserLogin($pdo, $userName, $password)
{
    return UserLogin($pdo, $userName, $password);
}

function read_roles($pdo)
{
    return read_roles($pdo);
}

function read_category($pdo)
{
    return read_category($pdo);
}




?>