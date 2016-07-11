<?php include('Header.php'); 
    include 'common.php';
    include '../App/blog_app.php';
    use function App\read_roles, App\create_user;
    
    $firstNameErr = $lastNameErr = $emailErr = $passwordErr = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $firstName = test_input($_POST['firstname']);
        if (empty($firstName)) {
            $firstNameErr = "First name is required";
        }
        else {            
            if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
                $firstNameErr = "Only letters and white space allowed in first name"; 
            }
        }

        $lastName = test_input($_POST['lastname']);
        if (empty($lastName)){
            $lastNameErr = "Last name is required";
        }
        else {            
            if (!preg_match("/^[a-zA-Z ]*$/",$lastName)){
                $lastNameErr = "Only letters and white space allowed in last name"; 
            }
        }
        
        $pass = test_input($_POST['password']);
        if (empty($pass)){
            $passwordErr = "Password is required";
        }
        
        $email = test_input($_POST['email']);
        if (empty($email)){
            $emailErr = "Email is required";
        }
        else {            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format"; 
            }
        }
        
        if (empty($firstNameErr) && empty($lastNameErr) && empty($passwordErr) && empty($emailErr))
        {
            $new_user = new User(0, $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], 1, date("Y-m-d H:i:s"), $_POST['role']);
            echo create_user($pdo, $new_user);
            $_POST = array();
            header("Location: Admin.php");
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

<script lang='javascript' type="text/javascript">
    function resetfields()
    {
        document.getElementById("firstname").value = "";
        document.getElementById("lastname").value = "";
        document.getElementById("email").value = "";
        document.getElementById("password").value = "";
        document.getElementById("role").selectedIndex = "0";
    }
</script>

<p><span class="error">* Required field.</span></p>
<form id='createuserform' action='' method='POST'>
  <fieldset>
    <div>
        <table width='100%'>
            <tr>
                <td>
                    First Name
                </td>
                <td>
                    <input type='text' name='firstname' id='firstname' maxlength="100" value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" />
                    <span class="error">* <?php echo $firstNameErr;?></span>
                </td>
            </tr>
            <tr>
                <td>
                    Last Name
                </td>
                <td>
                    <input type='text' name='lastname' id='lastname' maxlength="100" value="<?php echo isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" />
                    <span class="error">* <?php echo $lastNameErr;?></span>
                </td>
            </tr>
            <tr>
                <td>
                    Email
                </td>
                <td>
                    <input type='text' name='email' id='email' maxlength="150" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" />
                    <span class="error">* <?php echo $emailErr;?></span>
                </td>
            </tr>
            <tr>
                <td>
                    Password
                </td>
                <td>
                    <input type='password' name='password' id='password' maxlength="100" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" />
                    <span class="error">* <?php echo $passwordErr;?></span>
                </td>
            </tr>
            <tr>
                <td>
                    Is Active ?
                </td>
                <td>
                    <input type="checkbox" name="IsActive" id="IsActive" checked="<?php echo isset($_POST['IsActive']) ? $_POST['IsActive'] : 'true' ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Role
                </td>
                <td>
                    <?php 
                        $selectedItem = isset($_POST['role']) ? $_POST['role'] : '';
                        $result = read_roles($pdo);
                        $select= '<select name="role" id="role">';
                        foreach ($result as $role)
                        {
                            $select.='<option value="'.$role->getRoleId().'"';
                            if ($selectedItem == $role->getRoleId())
                            {
                                $select.=' selected="true"';
                            }
                            $select.='>'.$role->getName().'</option>';
                        }
                        $select.='</select>';
                        echo $select;
                    ?>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                   <button id="createuser" type="submit">Create User</button>
                   <button id="reset" type="button" onclick="resetfields();">Reset</button>
                </td>
            </tr>
        </table>
    </div>
  </fieldset>
</form>

<?php include('Footer.php'); ?>
