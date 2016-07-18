<?php 
include("header.php");
include 'common.php';
include '../App/blog_app.php';
include 'View/blog_view.php';
use function View\display;
?>

<h2><font face="verdana"color="black">Newest articles </font></p></h2>

<?php 

    $searchText = "";    
    if(isset($_GET['searchtxt']))
    {
        $searchText = $_GET['searchtxt'];
    }

    if (empty($searchText))
    {
        $result = App\read_articles($pdo);
    }
    else 
    {
       $result = App\search_article($pdo, $searchText);
    }
    if ($result == NULL)
    {
        echo 'No article to display';
    }
    else 
    {
        echo display('preview_articles', ['articles' => $result]);
    }

?>

<h3> <a href="/createBlogPost.php"><font face="verdana">Submit an article</font></a></h3>

<?php include("Footer.php"); ?>
