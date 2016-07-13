<?php
namespace BlogDao;
require_once '../model/Article.php';
require_once '../model/AuthorisationRole.php';
require_once '../model/Category.php';
require_once '../model/User.php';

// CART FUNCTIONS
function create_post($pdo, $new_article) {
   
    try 
    {
        //`CategoryId`, `UserId`, `RoleId` ,`PostTitle`, `Content`)
        $stmt = $pdo->prepare("INSERT INTO Article (CategoryId, UserId, RoleId, PostTitle, Content) VALUES (:CategoryId, :UserId, :RoleId, :PostTitle, :Content)");
        $stmt->bindValue(":PostTitle", $new_article -> GetPostTitle());
        $stmt->bindValue(":Content", $new_article ->GetContent());
        $stmt->bindValue(":CategoryId", $new_article ->GetCategoryId());
        $stmt->bindValue(":UserId", $new_article ->GetUserId());
        $stmt->bindValue(":RoleId", $new_article ->GetRoleId());
        
        $stmt->execute();
    } 
    catch (Exception $e) 
    {
        echo 'Am i having exception???';
        die($e->getMessage());
    }
}

function read_article_id($pdo, $ArticleId) {
	$stmt = $pdo->prepare("SELECT * FROM article WHERE ArticleId = :ArticleId");
	$stmt->execute(['ArticleId' => $ArticleId]);
        $foundArticle = $stmt->fetch();
        //$newArticle = $obj = new Article($foundArticle['ArticleId'], $foundArticle['CategoryId'], $foundArticle['UserId'], $foundArticle['PostTitle'], $foundArticle['CreatedOn'], $foundArticle['Content'], $foundArticle['RoleId']);
        //return $newArticle;
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

function create_user($pdo, $user)
{
    // Email address is a unique key in the user table. And email is will be used as login so duplicate is not allowed
    $query = $pdo->prepare("SELECT * FROM user WHERE EMAIL = :email");
    $query->execute(['email' => $user->getEmail()]);
    $userExist = $query->fetchAll();
    
    if ((empty($userExist)) || (is_null($userExist))) 
    {
        $stmt = $pdo->prepare("INSERT INTO USER (FirstName, LastName, Email, Password, IsActive, RoleId) VALUES (:FirstName, :LastName, :Email, :Password, :IsActive, :RoldId)");
        $stmt->bindValue(":FirstName", $user->getFirstName());
        $stmt->bindValue(":LastName", $user->getLastName());
        $stmt->bindValue(":Email", $user->getEmail());
        $stmt->bindValue(":Password", $user->getPassword());
        $stmt->bindValue(":IsActive", $user->getIsActive());
        $stmt->bindValue(":RoldId", $user->getRoleId());
        $result = $stmt->execute();
        if ($result == true)
        {
            return 'User has been created!';
        }
        else
        {
            return 'Something went wrong';
        }
    }
    else
    {
        return "User ".$user->getEmail()." already exist in the database";
    }
}

function read_users($pdo)
{
    $query = $pdo->query("SELECT usr.*, au.Name 'RoleName' FROM user usr JOIN authorisationrole au ON usr.RoleId = au.RoleId");
    $result = $query->fetchAll();
    
    foreach ($result as $user)
    {
        $usr = new \User($user['UserId'], $user['FirstName'], $user['LastName'], 
                        $user['Email'], $user['Password'], $user['IsActive'],
                        $user['CreatedOn'], $user['RoleId']);
        $usr->setRoleName($user['RoleName']);
        $userObjArray[] = $usr;
    }    
    return $userObjArray;
}

function read_user_ById($pdo, $userId) 
{
    $query = $pdo->prepare("SELECT usr.*, au.Name 'RoleName' FROM user usr JOIN authorisationrole au ON usr.RoleId = au.RoleId WHERE usr.UserId = :userId");
    $query->execute(['userId' => $userId]);
    $result = $query->fetchAll();
    
    foreach ($result as $user)
    {
        $usr = new \User($user['UserId'], $user['FirstName'], $user['LastName'], 
        $user['Email'], $user['Password'], $user['IsActive'],
        $user['CreatedOn'], $user['RoleId']);
        $usr->setRoleName($user['RoleName']);
        break;
    }
    return $usr;
}

function read_articles($pdo)
{
    $query = $pdo->query("select at.*, ct.Name 'CategoryName', CONCAT(ur.FirstName, ' ', ur.LastName) 'Author' from Article at join category ct on at.CategoryId = ct.CategoryId join user ur on at.UserId = ur.UserId");
    $result = $query->fetchAll();
    
    foreach ($result as $article)
    {
        $art = new \Article($article['ArticleId'], $article['CategoryId'], $article['UserId'], 
                        $article['PostTitle'], $article['CreatedOn'], $article['Content'], $article['RoleId']);
        $art->setAuthor($article['Author']);
        $art->setCategoryName($article['CategoryName']);
        $articleObjArray[] = $art;
    }    
    return $articleObjArray;
}

function UserLogin($pdo, $userName, $password)
{
    $query = $pdo->prepare("SELECT usr.*, au.Name 'RoleName' FROM user usr JOIN authorisationrole au ON usr.RoleId = au.RoleId WHERE usr.EMAIL = :email");
    $query->execute(['email' => $userName]);
    $result = $query->fetchAll();
    
    if ((empty($result)) || (is_null($result))) 
    {
        // -1 means login does not exist in database;
        return -1;
    }
    else
    {
        foreach ($result as $user)
        {
            if ($user['Password'] != $password)
            {
                //-2 means Invalid password.
                return -2;
            }
            else
            {
                //3 Loggin successful
                return $user['UserId'];
            }
        }
    }
}

function read_category($pdo)
{
    $query = $pdo->query("SELECT * from category");
    $result = $query->fetchAll();
    
    foreach ($result as $categ)
    {
        $category = new \Category($categ['CategoryId'], $categ['Name'], $categ['CategoryDescription'], 
                        $categ['CreatedOn']);
          $categoryObjArray[] = $category;
    }    
    return $categoryObjArray;
        
}

function read_roles($pdo)
{
    $query = $pdo->query("select * from authorisationrole");
    $result = $query->fetchAll();
    
    foreach ($result as $role)
    {
        $authRole = new \AuthorisationRole($role['RoleId'], $role['Name'], $role['RoleDescription'], $role['CreatedOn']);
        $roleObjArray[] = $authRole;
    }    
    return $roleObjArray;
}