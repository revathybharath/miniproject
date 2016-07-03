<?php
 //enter namespaces of connecting files include
?>

<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	\Cart\Auth\login($pdo, $_POST['username'], $_POST['password']);
}
?>
 
 
<!doctype html>
<html>
<head><title>Blog Post</title></head>
<body>

<h1>Blog Post</h1>

<?php echo \Cart\View\display('loginform'); ?>

</body>
</html>