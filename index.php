<?php include 'config.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Home</title>

<style>
body { background: linear-gradient(to right,#74ebd5,#ACB6E5); font-family: Arial; }
.container { width:600px; margin:40px auto; padding:20px; background:white; border-radius:12px; box-shadow:0 0 10px gray; }
.post { background:#f4f4f4; padding:10px; margin:10px 0; border-radius:8px; }
a { margin-right:10px; }
</style>
</head>

<body>
<div class="container">

<h2>Welcome <?php echo $_SESSION['user']; ?></h2>

<a href="create.php">Add Post</a>
<a href="logout.php">Logout</a>

<hr>

<form method="GET">
<input type="text" name="search" placeholder="Search...">
<button>Search</button>
</form>

<?php
$limit = 3;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page-1)*$limit;

$search = "";
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $result = $conn->query("SELECT * FROM posts 
    WHERE title LIKE '%$search%' OR content LIKE '%$search%' 
    LIMIT $start,$limit");
} else {
    $result = $conn->query("SELECT * FROM posts LIMIT $start,$limit");
}

if($result->num_rows == 0){
    echo "No posts found";
}

while($row = $result->fetch_assoc()){
    echo "<div class='post'>";
    echo "<h3>".$row['title']."</h3>";
    echo "<p>".$row['content']."</p>";
    echo "<a href='edit.php?id=".$row['id']."'>Edit</a> | ";
    echo "<a href='delete.php?id=".$row['id']."' onclick='return confirm(\"Delete?\")'>Delete</a>";
    echo "</div>";
}

$total = $conn->query("SELECT COUNT(*) as count FROM posts")->fetch_assoc()['count'];
$pages = ceil($total/$limit);

for($i=1;$i<=$pages;$i++){
    echo "<a href='?page=$i'>$i</a> ";
}
?>

</div>
</body>
</html>