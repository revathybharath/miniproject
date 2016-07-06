<?php

const DB_DSN = 'mysql:host=127.0.0.1;dbname=blog';
const DB_USER = 'root';
const DB_PASS = '';

try 
{
    $pdo = new PDO(DB_DSN, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) 
{
    die($e->getMessage());
}
?>