<?php
include 'header.php';
include '../model/Article.php';
include '../app/blog_app.php';
include 'common.php';

use function App\create_post;

$articleTitle = $_POST['articleTitle'];
$articleData = $_POST['articleData'];
$UserId = $_POST['articleUser'];
//$articleAuthor = $_Post['articleAuthor'];


//echo $articleData;
//echo $articleTitle;
//($ArticleId, $CategoryId, $UserId, $PostTitle, $CreatedOn, $Content, $RoleID)
$blg = new Article (1, 1, $UserId, $articleTitle, date('Y-m-d H:i:s'), $articleData,1);

//echo $blg -> getPostTitle();

create_post($pdo,$blg);

echo 'Post has been created!';
//        }
//        
//    function test_input($data) 
//    {
//        $data = trim($data);
//        $data = stripslashes($data);
//        $data = htmlspecialchars($data);
//        return $data;
//    }
?>

<br>
<a href='/'>Home</a>

<?php
include 'footer.php'; 
?>
