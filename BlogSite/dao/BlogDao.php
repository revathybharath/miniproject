<?php
namespace BlogDao;
require_once '../model/Article.php';
require_once '../model/AuthorisationRole.php';
require_once '../model/Category.php';
require_once '../model/User.php';

function create_post_in_db($pdo, $new_article) 
{
    try 
    {
        //`CategoryId`, `UserId`, `RoleId` ,`PostTitle`, `Content`)
        $stmt = $pdo->prepare("INSERT INTO Article (CategoryId, UserId, RoleId, PostTitle, Content, CreatedOn) VALUES (:CategoryId, :UserId, :RoleId, :PostTitle, :Content, :CreatedOn)");
        $stmt->bindValue(":PostTitle", $new_article -> GetPostTitle());
        $stmt->bindValue(":Content", $new_article ->GetContent());
        $stmt->bindValue(":CategoryId", $new_article ->GetCategoryId());
        $stmt->bindValue(":UserId", $new_article ->GetUserId());
        $stmt->bindValue(":RoleId", $new_article ->GetRoleId());
        $stmt->bindValue(":CreatedOn", $new_article ->getCreatedOn());
        
        $stmt->execute();
    } 
    catch (Exception $e) 
    {
        echo 'Am i having exception???';
        die($e->getMessage());
    }
}

function read_article_id($pdo, $ArticleId) 
{
	$stmt = $pdo->prepare("SELECT * FROM article WHERE ArticleId = :ArticleId");
	$stmt->execute(['ArticleId' => $ArticleId]);
        $article = $stmt->fetch();
        
         $articleObj = new \Article($article['ArticleId'], $article['CategoryId'], $article['UserId'], 
                        $article['PostTitle'], $article['CreatedOn'], $article['Content'], $article['RoleId']);
       
        //$newArticle = $obj = new Article($foundArticle['ArticleId'], $foundArticle['CategoryId'], $foundArticle['UserId'], $foundArticle['PostTitle'], $foundArticle['CreatedOn'], $foundArticle['Content'], $foundArticle['RoleId']);
        return $articleObj;
}

function read_article_name($pdo, $article_title) 
{
    $stmt = $pdo->prepare("SELECT * FROM articles WHERE PostTitle = :PostTitle");
    $stmt->execute(['name' => $article_title]);
    return $stmt->fetch();
}

function delete_article($pdo, $article_id) 
{
    $stmt = $pdo->prepare("DELETE FROM articles WHERE id = :id");
    $stmt->execute(['id' => $article_id]);
}

function delete_user_byId($pdo, $userId) 
{
    $stmt = $pdo->prepare("DELETE FROM user WHERE UserId = :UserId");
    $stmt->execute(['UserId' => $userId]);
    $stmt->execute();
}

function create_user_in_db($pdo, $user)
{   
    // Email address is a unique key in the user table. And email is will be used as login so duplicate is not allowed
    $query = $pdo->prepare("SELECT * FROM user WHERE EMAIL = :email");
    $query->execute(['email' => $user->getEmail()]);
    $userExist = $query->fetchAll();
    
    if ((empty($userExist)) || (is_null($userExist))) 
    {
        $stmt = $pdo->prepare("INSERT INTO USER (FirstName, LastName, Email, Password, IsActive, RoleId) VALUES (:FirstName, :LastName, :Email, :Password, :IsActive, :RoleId)");
        //hash password before inserting into db
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt->bindValue(":FirstName", $user->getFirstName());
        $stmt->bindValue(":LastName", $user->getLastName());
        $stmt->bindValue(":Email", $user->getEmail());
        $stmt->bindValue(":Password", $password);
        $stmt->bindValue(":IsActive", $user->getIsActive());
        $stmt->bindValue(":RoleId", $user->getRoleId());
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

function update_user_in_db($pdo, $user)
{
    $stmt = $pdo->prepare("UPDATE USER SET FirstName = :FirstName, LastName = :LastName, Email = :Email, Password = :Password, IsActive = :IsActive, RoleId = :RoleId WHERE UserId = :UserId");
    $stmt->bindValue(":UserId", $user->getUserId());
    $stmt->bindValue(":FirstName", $user->getFirstName());
    $stmt->bindValue(":LastName", $user->getLastName());
    $stmt->bindValue(":Email", $user->getEmail());
    $stmt->bindValue(":Password", $user->getPassword());
    $stmt->bindValue(":IsActive", $user->getIsActive());
    $stmt->bindValue(":RoleId", $user->getRoleId());
    $result = $stmt->execute();
    if ($result == true)
    {
        return 'User has been updated!';
    }
    else
    {
        return 'Something went wrong';
    }
}

function read_all_users($pdo)
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

function read_user($pdo, $userId) 
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

function read_articles_from_db($pdo)
{
    $query = $pdo->query("select at.*, ct.Name 'CategoryName', CONCAT(ur.FirstName, ' ', ur.LastName) 'Author' from Article at join category ct on at.CategoryId = ct.CategoryId join user ur on at.UserId = ur.UserId ORDER BY CreatedOn DESC");
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

function get_user_hash($pdo, $username){	

		try {
			$query = $pdo->prepare("SELECT password FROM user WHERE email = :email");
			$query->execute(array('email' => $username));
			
			$row = $query->fetch();
			return $row['password'];

		} catch(PDOException $e) {
		    echo '<p class="error">'.$e->getMessage().'</p>';
		}
	}

function ValidateUserLogin($pdo, $userName, $password)
{ $query = $pdo->prepare("SELECT usr.*, au.Name 'RoleName' FROM user usr JOIN authorisationrole au ON usr.RoleId = au.RoleId WHERE usr.EMAIL = :email");
    $query->execute(['email' => $userName]);
    $result = $query->fetchAll();
    $passwordhash = get_user_hash($pdo, $userName);
    
    if ((empty($result)) || (is_null($result))) 
    {
        // -1 means login does not exist in database;
        return -1;
    }
    else
    {    foreach ($result as $user)
        {
            if (password_verify($password, $passwordhash)!= 1)
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

function create_category_in_db($pdo,$new_category)
{
        $stmt = $pdo->prepare("INSERT INTO CATEGORY (Name, CategoryDescription) VALUES (:Name, :CategoryDescription)");
        $stmt->bindValue(":Name", $new_category->getName());
        $stmt->bindValue(":CategoryDescription", $new_category->getCategoryDescription());
        $result = $stmt->execute();
        if ($result == true)
        {
            return 'Category has been created!';
        }
        else
        {
            return 'Something went wrong';
        }
}

function read_category_from_db($pdo)
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

function read_roles_from_db($pdo)
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

function read_category_by_id($pdo, $categoryId)
{
    $query = $pdo->prepare("SELECT * FROM category WHERE CategoryId = :categoryId");
    $query->execute(['categoryId' => $categoryId]);
    $result = $query->fetchAll();
    
    foreach ($result as $categor)
    {
        $category = new \Category($categor['CategoryId'], $categor['Name'], $categor['CategoryDescription'], $categor['CreatedOn']);        
        break;
    }
    return $category;
}

function update_category_in_db($pdo, $category)
{
    $stmt = $pdo->prepare("UPDATE Category SET Name = :Name, CategoryDescription = :CatDescription WHERE CategoryId = :CategoryId");
    $stmt->bindValue(":Name", $category->getName());
    $stmt->bindValue(":CatDescription", $category->getCategoryDescription());
    $stmt->bindValue(":CategoryId", $category->getCategoryId());
    $result = $stmt->execute();
    if ($result == true)
    {
        return 'Category has been updated!';
    }
    else
    {
        return 'Something went wrong';
    }
}

function delete_category_byId($pdo, $categoryId) 
{
    $stmt = $pdo->prepare("DELETE FROM Category WHERE CategoryId = :CategoryId");
    $stmt->execute(['CategoryId' => $categoryId]);
    $stmt->execute();
}

function search_article_in_db($pdo, $searchText)
{
    $query = $pdo->query("select at.*, ct.Name 'CategoryName', CONCAT(ur.FirstName, ' ', ur.LastName) 'Author' "
            . "from Article at join category ct on at.CategoryId = ct.CategoryId "
            . "join user ur on at.UserId = ur.UserId WHERE PostTitle LIKE \"%$searchText%\" OR Content LIKE \"%$searchText%\" ORDER BY CreatedOn DESC");
    $result = $query->fetchAll();
    
    if (count($result) > 0)
    {
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
    return null;
    
}