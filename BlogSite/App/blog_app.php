<?php

namespace App;

include 'dao/BlogDao.php';
//DB\
use function BlogDao\read_article_id;


function get_article_by_id($pdo, $id) {
    return read_article_id($pdo,$id);
}

?>
