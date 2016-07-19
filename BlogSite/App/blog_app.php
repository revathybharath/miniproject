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
use function BlogDao\read_roles_from_db;
use function BlogDao\read_category_from_db, 
             BlogDao\create_category_in_db, BlogDao\delete_user_byId,
             BlogDao\update_user_in_db,BlogDao\read_category_by_id,
             BlogDao\update_category_in_db, BlogDao\delete_category_byId,
             BlogDao\search_article_in_db;

function get_article_by_id($pdo, $id) 
{
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

function update_user($pdo, $user)
{
    update_user_in_db($pdo, $user);
}

function create_category($pdo, $new_category) 
{
    return create_category_in_db($pdo, $new_category);
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

function delete_user($pdo, $userId)
{
    return delete_user_byId($pdo, $userId);
}

function read_category_ById($pdo, $categoryId)
{
    return read_category_by_id($pdo, $categoryId);
}

function update_category($pdo, $category)
{
    return update_category_in_db($pdo, $category);
}

function delete_category($pdo, $categoryId)
{
    return delete_category_byId($pdo, $categoryId);
}

function search_article($pdo, $searchText)
{
    return search_article_in_db($pdo, $searchText);
}
?>
