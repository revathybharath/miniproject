<?php

namespace App;

include 'DB/blog_DB.php';

use function DB\read_article_id;


function get_article_by_id($pdo, $id) {
    read_article_id($pdo,$id);
}

?>
