<?php include 'config.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Create</title>
<style>
body { background: linear-gradient(to right,#74ebd5,#ACB6E5); font-family: Arial; }
.container { width:300px; margin:100px auto; padding:20px; background:white; border-radius:10px; text-align:center; }
input,textarea { width:90%; margin:10px 0; padding:8px; }
button { background:#007BFF; color:white; padding:8px; border:none; }
</style>
</head>

<body>
<div class="container">

<h2>Add Post</h2>

<form method="POST">
<input type="text" name="title" placeholder="Title">
<textarea name="content" placeholder="Content"></textarea>
<button name="submit">Add</button>
</form>

<?php
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $content = $_POST['content'];

    $conn->query("INSERT INTO posts (title,content) VALUES ('$title','$content')");
    header("Location: index.php");
}
?>

</div>
</body>
</html>