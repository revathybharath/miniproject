<?php include('Header.php'); 
    include 'common.php';
    include '../App/blog_app.php';
    use function App\UserLogin, App\read_user_ById;
    
    $userNameErr = $passwordErr= "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $userName = test_input($_POST['username']);
        if (empty($userName)) {
            $userNameErr = "User name is mandatory";
        }

        $password = test_input($_POST['password']);
        if (empty($password)){
            $passwordErr = "Password is mandatory";
        }

        if (empty($userNameErr) && empty($passwordErr))
        {
            $result = UserLogin($pdo, $userName, $password);
            
            if ($result == -1)
            {
                $userNameErr = "Login ". $userName . " does not exist in database";
            }
            else
            {
                if ($result == -2)
                {
                    $passwordErr = "Invalid password";
                }
                else
                {                    
                    $_POST = array();
                    $usr = read_user_ById($pdo, $result);
                    session_start();
                    $_SESSION['UserObject']= $usr;
                    header("Location: index.php");
                }
            }
        }
    }
    
    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<h1><center>Login</center></h1>
<div id="login">
    
<p><span class="error">* Required field.</span></p>
<form id='login' action='' method='post' accept-charset='UTF-8'>
    
<label for='username' >Email</label></br>
<input type='text' name='username' id='username'  maxlength="50" placeholder="Email Address..."  value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" />
<span class='error'>* <?php echo $userNameErr; ?></span>
</br></br>
<label for='password' >Password</label></br>
<input type='password' name='password' id='password' maxlength="50" placeholder="**********" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" />
<span class='error'>* <?php echo $passwordErr; ?></span>
</br></br>
<input type='submit' name='Submit' value='Login' /></br>
</div>


</form>

<?php include 'footer.php';?>