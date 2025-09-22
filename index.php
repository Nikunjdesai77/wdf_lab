<?php
session_start();

// Hardcoded test users
$users = [
    "nikunj" => "Nikunj@123",
    "student1" => "Stud@123"
];

$login_success = false;
$message = "";

// Logout handling
if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    setcookie("username", "", time()-3600, "/");
    header("Location: index.php");
    exit();
}

// Login handling
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $remember = isset($_POST['remember_me']);

    if(isset($users[$username]) && $users[$username] === $password){
        $_SESSION['username'] = $username;

        if($remember){
            setcookie("username", $username, time() + (30*24*60*60), "/"); // 30 days
        }

        $login_success = true;
        $message = "✅ Login successful! Welcome $username";
    } else {
        $message = "❌ Invalid username or password";
    }
}

// Auto-login via cookie
if(!$login_success && isset($_COOKIE['username'])){
    $_SESSION['username'] = $_COOKIE['username'];
    $login_success = true;
    $message = "✅ Logged in via cookie as ".$_COOKIE['username'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Portal Login</title>
  <link rel="stylesheet" href="index.css">
</head>
<body class="login-page">

  <div class="overlay">
    <div class="login-form">
      <h2>Student Portal Login</h2>

      <?php
      if($message !== ""){
          echo "<p style='color:".($login_success ? "green" : "red")."; font-weight:bold;'>$message</p>";
      }
      ?>

      <?php if(!$login_success): ?>
      <form id="login-form" method="POST" action="index.php">
        <input type="text" name="username" id="username" placeholder="Student ID or Email" required>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <label>
          <input type="checkbox" name="remember_me"> Remember Me
        </label>
        <button type="submit">Login</button>
      </form>
      <?php else: ?>
      <form method="POST">
        <button name="logout" type="submit">Logout</button>
      </form>
      <?php endif; ?>

      <div class="signup-text">
        <a href="#">Forgot Password?</a>
      </div>
    </div>
  </div>

  <script src="index.js"></script>
</body>
</html>
