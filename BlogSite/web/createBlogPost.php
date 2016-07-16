 <link rel="stylesheet" href="/css/view-article.css">
     
     <?php 
include("header.php"); 
include 'common.php';
include 'View/blog_view.php';
include dirname(__FILE__).'/../dao/BlogDao.php';

use function View\display;




echo display('form');

include 'footer.php'; 
?>