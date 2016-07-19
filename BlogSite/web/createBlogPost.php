 <link rel="stylesheet" href="/css/view-article.css">
 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
 <script>tinymce.init({
    selector: "textarea", 
    plugins: "image",
    image_caption: true
  });</script>


 <?php
include("header.php"); 
include 'common.php';
include 'View/blog_view.php';
include dirname(__FILE__).'/../App/blog_app.php';

use function View\display;

    if ((empty($usr)) || (is_null($usr)))
    {
        echo '<li><a href="Login.php">Login</a></li>';
    }
    else 
    {
       echo display('form', ['UserId' => $usr->getUserId()]);  
   
    }

include 'Footer.php'; 
?>