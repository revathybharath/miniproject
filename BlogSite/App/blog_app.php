<?php  
namespace App;
include '../dao/BlogDao.php';

//DB\
use function BlogDao\read_article_id;
use function BlogDao\read_articles;
use function BlogDao\read_users;
use function BlogDao\create_post;
use function BlogDao\read_roles;
use function BlogDao\create_user;

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

function create_post($pdo, $new_article) 
{
    return create_post($pdo, $new_article);
}

function read_roles($pdo)
{
    return read_roles($pdo);
}

function create_user($pdo, $new_user)
{
    return create_user($pdo, $new_user);
}
?>
