<?php

//namespace DB;
require_once 'model/Article.php';	
//USER FUNCTIONS
//function read_user($pdo, $username) {
//	
//}
// ARTICLE FUNCTIONS
//function create_post($pdo, $new_article) {
//    	$stmt = $pdo->prepare("INSERT INTO articles (PostTitle, Content) VALUES (:PostTitle, :Content)");
//        $stmt->bindValue(":PostTitle", $new_item['PostTitle']);
//        $stmt->bindValue(":Content", $new_item['Content']);
//	$stmt->execute();
//}

function read_article_id($pdo, $ArticleId) {
	$stmt = $pdo->prepare("SELECT * FROM article WHERE ArticleId = :ArticleId");
	$stmt->execute(['ArticleId' => $ArticleId]);
	
        $foundArticle = $stmt->fetch();
         
        $newArticle = new Article($foundArticle['ArticleId'], $foundArticle['CategoryId'], $foundArticle['UserId'], $foundArticle['PostTitle'], $foundArticle['CreatedOn'], $foundArticle['Content'], $foundArticle['RoleId']);
        return $newArticle;
  
        print_r($testing);
}

//function read_article_name($pdo, $article_title) {
//	$stmt = $pdo->prepare("SELECT * FROM articles WHERE PostTitle = :PostTitle");
//        $stmt->execute(['name' => $article_title]);
//        return $stmt->fetch();
//}
//
//function delete_article($pdo, $article_id) {
//	$stmt = $pdo->prepare("DELETE FROM articles WHERE id = :id");
//        $stmt->execute(['id' => $article_id]);
//}
//
//function delete_user($pdo, $username) {
//	$stmt = $pdo->prepare("DELETE FROM users WHERE UserId = :UserId");
//        $stmt->execute(['id' => $username]);
//}
