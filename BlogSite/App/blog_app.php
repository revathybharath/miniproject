<?php

namespace App;

include 'DB/blog_DB.php';
//DB\
use function read_article_id;


function get_article_by_id($pdo, $id) {
    return read_article_id($pdo,$id);
}

?>
