<?php include 'config.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
}

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM posts WHERE id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit</title>
<style>
body { background: linear-gradient(to right,#74ebd5,#ACB6E5); font-family: Arial; }
.container { width:300px; margin:100px auto; padding:20px; background:white; border-radius:10px; text-align:center; }
input,textarea { width:90%; margin:10px 0; padding:8px; }
button { background:#007BFF; color:white; padding:8px; border:none; }
</style>
</head>

<body>
<div class="container">

<h2>Edit Post</h2>

<form method="POST">
<input type="text" name="title" value="<?php echo $data['title']; ?>">
<textarea name="content"><?php echo $data['content']; ?></textarea>
<button name="update">Update</button>
</form>

<?php
if(isset($_POST['update'])){
    $title = $_POST['title'];
    $content = $_POST['content'];

    $conn->query("UPDATE posts SET title='$title',content='$content' WHERE id=$id");
    header("Location: index.php");
}
?>

</div>
</body>
</html>