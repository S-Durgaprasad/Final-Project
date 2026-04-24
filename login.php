<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<style>
body { background: linear-gradient(to right,#74ebd5,#ACB6E5); font-family: Arial; }
.container { width:300px; margin:100px auto; padding:20px; background:white; border-radius:10px; text-align:center; }
input { width:90%; padding:8px; margin:10px 0; }
button { background:#007BFF; color:white; padding:8px; border:none; }
</style>
</head>
<body>
<div class="container">
<h2>Login</h2>

<form method="POST">
<input type="text" name="username" placeholder="Username">
<input type="password" name="password" placeholder="Password">
<button name="login">Login</button>
</form>

<a href="register.php">Register</a>
<a href="forgot.php">Forgot Password?</a>

<?php
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $res = $conn->query("SELECT * FROM users WHERE username='$username'");
    $user = $res->fetch_assoc();

    if($user && password_verify($password,$user['password'])){
        $_SESSION['user'] = $username;
        header("Location: index.php");
    } else {
        echo "<p style='color:red;'>Invalid Login</p>";
    }
}
?>
</div>
</body>
</html>