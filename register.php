<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<style>
body { background: linear-gradient(to right,#74ebd5,#ACB6E5); font-family: Arial; }
.container { width:300px; margin:100px auto; padding:20px; background:white; border-radius:10px; text-align:center; }
input { width:90%; padding:8px; margin:10px 0; }
button { background:#007BFF; color:white; padding:8px; border:none; }
</style>
</head>
<body>
<div class="container">
<h2>Register</h2>

<form method="POST">
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button name="register">Register</button>
</form>

<a href="login.php">Login</a>

<?php
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $conn->query("INSERT INTO users (username,password) VALUES ('$username','$password')");
    echo "<p style='color:green;'>Registered!</p>";
}
?>
</div>
</body>
</html>