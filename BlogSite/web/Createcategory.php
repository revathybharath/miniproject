<?php include('Header.php'); 
include 'common.php';
include '../App/blog_app.php';
use function App\read_category,App\create_category;

$CateNameErr = $CateDescErr = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $categoryname = test_input($_POST['categoryname']);
        if (empty($categoryname)) {
            $CateNameErr = "Category name is required";
        }
    
       $categorydescription = test_input($_POST['categorydescription']);
        if (empty($categorydescription)){
            $CateDescErr = "Category Description is required";
        }

        if (empty($CateNameErr) && empty($CateDescErr))
        {
            $new_category = new category(0, $_POST['categoryname'], $_POST['categorydescription'],0);
            echo create_category($pdo, $new_category);
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
        document.getElementById("categoryname").value = "";
        document.getElementById("categorydescription").value = "";
    }
</script>

<h1 align='center'> Create New Category</h1>
<p><span class="error">* Required field.</span></p>
<form id='categoryform' action='' method='POST'>
  <fieldset>
    <div>
        <table width='100%'>
            <tr>
                <td>
                    Category Name
                </td>
                <td>
                    <input type='text' name='categoryname' id='categoryname' maxlength="100" value="<?php echo isset($_POST['categoryname']) ? $_POST['categoryname'] : '' ?>" />
                    <span class="error">* <?php echo $CateNameErr;?></span>
                </td>
            </tr>
            <tr>
                <td>
                    Category Description
                </td>
                <td>
                    <input type='text' name='categorydescription' id='categorydescription' maxlength="150" value="<?php echo isset($_POST['categorydescription']) ? $_POST['categorydescription'] : '' ?>" />
                    <span class="error">* <?php echo $CateDescErr;?></span>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                   <button id="createcategory" type="submit">Create Category</button>
                   <button id="reset" type="button" onclick="resetfields();">Reset</button>
                </td>
            </tr>
        </table>
    </div>
  </fieldset>
</form>
<?php include('footer.php'); ?>

