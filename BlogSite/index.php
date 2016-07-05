
<?php
include 'common.php';
include 'App/blog_app.php';

use function App\get_article_by_id;

$test = get_article_by_id($pdo, 1);


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Osterley Guide</title>
        
<!--         Bootstrap Core CSS - we can add this in later
        <link href="css/bootstrap.min.css" rel="stylesheet">

         Custom CSS 
        <link href="css/blog-post.css" rel="stylesheet">-->
 
    </head>
    
    <body>
    
        <h1> Welcome to the DevelopHer Guide to ...Osterley </h1>
            <div> This blog is dedicated to the sights, smells and sounds of Osterley and the surrounding area.
        <h2> Newest articles </h2>
        <h2> Submit an article</h2>
        
        
       
    </body>
</html>