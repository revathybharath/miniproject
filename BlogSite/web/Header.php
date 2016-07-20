<!DOCTYPE html>
<html>
    <head>
        <title>TTDOYLB blog</title>
        <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="img/favicn.ico" type="image" rel="icon"/> 
        <!-- CSS Style Sheet Link-->
        <link href="css/blog-post.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="js/jquery_v_1.4.js"></script>
        <script type="text/javascript" src="js/jquery_notification_v.1.js"></script>
        <link href="css/jquery_notification.css" rel="stylesheet" type="text/css"/>
    </head>
    <body background="img/TTDIYLB_Background_trans.png"style="background-repeat:repeat-n;width:100%;">
        <div id="nav">
            <div id ="nav-wrapper">
                <ul>
                    <li><a href="index.php"Home>Home</a></li>
                    <li><a href="AboutUs.php"About Us>About Us</a></li>
                    <li><a href="Archive.php"Archive>Archive</a></li>
                    <li><a href="ContactUs.php"Contact Us>Contact Us</a></li>
                    <?php 
                        include '../model/User.php';
                        session_start();
                        if (isset($_SESSION['UserObject'])) 
                        {
                            $usr = $_SESSION['UserObject'];
                        }
                        if ((empty($usr)) || (is_null($usr)))
                        {
                            echo '<li><a href="Login.php">Login</a></li>';
                        }
                        else 
                        {
                            if ($usr->getRoleName() == 'Admin')
                            {
                                echo '<li>'
                                    . '<a href="Admin.php?Manage=user">Administration</a>'
                                    . '<ul>'
                                        . '<li><a href="Admin.php?Manage=user">Manage User</a></li>'
                                        . '<li><a href="Admin.php?Manage=article">Manage Article</a></li>'
                                        . '<li><a href="Admin.php?Manage=category">Manage Category</a></li>'
                                    . '</ul>'
                                    . '</li>';
                            }
                            echo '<li><a href="Logout.php">Logout</a></li>';
                            echo '<li id="WelcomeMsg">Welcome '.$usr->getFirstName().'</li>';
                        }
                    echo '</ul>';
                    ?>
            </div>
        </div>
        <div ID="logo">
            <img  id="logoimg" src="img/TTDIYLB logo.png" style="background-repeat:repeat-y;width:40%;" align="center" />
        </div>
        <header>
            <table width="100%">
                <tr>
                    <td>
                        <div id="title">
                            
                        </div>
                        <div id="catchy">
                            
                        </div>
                    </td>
                    <td align="right">
                        <form method="get" action="index.php" class="box">
                            <input type="text" class="keywords" id="searchtxt" name="searchtxt" placeholder="Search here & press enter ..." autocomplete="off" />
                        </form>
                    </td>
                </tr>
            </table>
        </header>

        <div id="section">
            
