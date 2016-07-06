<?php

namespace BlogDao;
require_once '../model/Article.php';
require_once '../model/AuthorisationRole.php';
require_once '../model/Category.php';
require_once '../model/User.php';

// CART FUNCTIONS
function create_post($pdo, $new_article) {
        $stmt = $pdo->prepare("INSERT INTO articles (PostTitle, Content) VALUES (:PostTitle, :Content)");
        $stmt->bindValue(":PostTitle", $new_item['PostTitle']);
        $stmt->bindValue(":Content", $new_item['Content']);
        $stmt->execute();
}

function read_article_id($pdo, $article_id) {
        $stmt = $pdo->prepare("SELECT * FROM articles WHERE id = :id");
        $stmt->execute(['id' => $article_id]);
        return $stmt->fetch();
}

function read_article_name($pdo, $article_title) {
        $stmt = $pdo->prepare("SELECT * FROM articles WHERE PostTitle = :PostTitle");
        $stmt->execute(['name' => $article_title]);
        return $stmt->fetch();
}

function delete_article($pdo, $article_id) {
        $stmt = $pdo->prepare("DELETE FROM articles WHERE id = :id");
        $stmt->execute(['id' => $article_id]);
}

function delete_user($pdo, $username) {
        $stmt = $pdo->prepare("DELETE FROM users WHERE UserId = :UserId");
        $stmt->execute(['id' => $username]);
}

function create_user($user)
{
    $stmt = $pdo->prepare("INSERT INTO USER (FirstName, LastName, Email, Password, IsActive, RoleId) VALUES (:FirstName, :LastName, :Email, :Password, :IsActive, :RoldId)");
    $stmt->bindValue(":FirstName", $user['FirstName']);
    $stmt->bindValue(":LastName", $user['LastName']);
    $stmt->bindValue(":Email", $user['Email']);
    $stmt->bindValue(":Password", $user['Password']);
    $stmt->bindValue(":IsActive", $user['IsActive']);
    $stmt->bindValue(":RoldId", $user['RoldId']);    
    $stmt->execute();
    //$newArticle = $obj = new Article($foundArticle['ArticleId'], $foundArticle['CategoryId'], $foundArticle['UserId'], $foundArticle['PostTitle'], $foundArticle['CreatedOn'], $foundArticle['Content'], $foundArticle['RoleId']);
    //return $newArticle;
    $user = new \User($UserId, $FirstName, $LastName, $Email, $Password, $IsActive, $CreatedOn, $RoleId, $RoleName);
}

function read_users($pdo)
{
    $query = $pdo->query("SELECT usr.*, au.Name 'RoleName' FROM user usr JOIN authorisationrole au ON usr.RoleId = au.RoleId");
    $result = $query->fetchAll();
    
    foreach ($result as $user)
    {
        $usr = new \User($user['UserId'], $user['FirstName'], $user['LastName'], 
                        $user['Email'], $user['Password'], $user['IsActive'],
                        $user['CreatedOn'], $user['RoleId'], $user['RoleName']);
        $userObjArray[] = $usr;
    }    
    return $userObjArray;
}

function read_articles($pdo)
{
    $query = $pdo->query("select at.*, ct.Name 'CategoryName', CONCAT(ur.FirstName, ' ', ur.LastName) 'Author' from article at join category ct on at.CategoryId = ct.CategoryId join user ur on at.UserId = ur.UserId");
    $result = $query->fetchAll();
    
    foreach ($result as $article)
    {
        $art = new \Article($article['ArticleId'], $article['CategoryId'], $article['UserId'], 
                        $article['PostTitle'], $article['CreatedOn'], $article['Content']);
        $art->setAuthor($article['Author']);
        $art->setCategoryName($article['CategoryName']);
        $articleObjArray[] = $art;
    }    
    return $articleObjArray;
}
