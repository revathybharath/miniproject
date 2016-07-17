<!DOCTYPE html>
<html>
    <head>
        <title>Osterley Guide</title>
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
    <body>
        <div id="nav">
            <div id ="nav-wrapper">
                <ul>
                    <li><a href="index.php"Home>Home</a></li>
                    <li><a href="AboutUs.php"About Us>About Us</a></li>
                    <li><a href="Archive.php"Archive>Archive</a></li>
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
                                echo '<li><a href="Admin.php">Administration</a></li>';
                            }
                            echo '<li><a href="Logout.php">Logout</a></li>';
                            echo '<li id="WelcomeMsg">Welcome '.$usr->getFirstName().'</li>';
                        }
                    echo '</ul>';
                    ?>
            </div>
        </div>
        <div ID="logo">
        <img id="logoimg" src="img/logo1.jpg" style="background-repeat:repeat-y;width:100%;" />
        </div>
        <header>
            <table width="100%">
                <tr>
                    <td>
                        <div id="title">
                            Osterley Guide By DevelopHers
                        </div>
                        <div id="catchy">
                            Sights, smells and sounds of Osterley
                        </div>
                    </td>
                    <td align="right">
                        <form method="POST" action="index.php" class="box">
                            <input type="text" class="keywords" id="searchtxt" name="searchtxt" placeholder="Search here & press enter ..." autocomplete="off" />
                        </form>
                    </td>
                </tr>
            </table>
        </header>

        <div id="section">
            
