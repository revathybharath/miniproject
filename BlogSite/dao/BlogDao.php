<?php

namespace BlogDao;
	
//USER FUNCTIONS
function read_user($pdo, $username) {
	
}
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
