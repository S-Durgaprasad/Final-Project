<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Forgot</title>
<style>
body { background: linear-gradient(to right,#74ebd5,#ACB6E5); font-family: Arial; }
.container { width:300px; margin:100px auto; padding:20px; background:white; border-radius:10px; text-align:center; }
input { width:90%; padding:8px; margin:10px 0; }
button { background:#007BFF; color:white; padding:8px; border:none; }
</style>
</head>

<body>
<div class="container">

<h2>Reset Password</h2>

<form method="POST">
<input type="text" name="username" placeholder="Username">
<input type="password" name="newpass" placeholder="New Password">
<button name="reset">Reset</button>
</form>

<?php
if(isset($_POST['reset'])){
    $username = $_POST['username'];
    $newpass = password_hash($_POST['newpass'], PASSWORD_DEFAULT);

    $conn->query("UPDATE users SET password='$newpass' WHERE username='$username'");
    echo "<p style='color:green;'>Updated!</p>";
}
?>

</div>
</body>
</html>