<?php
session_start();
include 'db.php';

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($pass, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            header("Location: dashboard.php");
        } else { $error = "Invalid Password!"; }
    } else { $error = "User not found!"; }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login | Campus Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #F9F5F2; height: 100vh; display: flex; align-items: center; justify-content: center; }
        .login-box { background: white; padding: 40px; border-radius: 20px; width: 100%; max-width: 400px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
        .btn-login { background-color: #DCAE96; color: white; width: 100%; border-radius: 10px; padding: 12px; border: none; font-weight: bold; }
        h2 { color: #DCAE96; font-weight: bold; text-align: center; margin-bottom: 30px; }
    </style>
</head>
<body>
<div class="login-box">
    <h2>Student Login</h2>
    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="POST">
        <div class="mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username" required style="padding: 12px; border-radius: 10px;">
        </div>
        <div class="mb-4">
            <input type="password" name="password" class="form-control" placeholder="Password" required style="padding: 12px; border-radius: 10px;">
        </div>
        <button type="submit" name="login" class="btn btn-login">Login to Portal</button>
    </form>
</div>
</body>
</html>