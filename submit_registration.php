<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $course = htmlspecialchars(trim($_POST['course']));
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

    // Data to store
    $data = "$name,$email,$course,$password\n";

    $file = 'registrations.txt';

    if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX)) {
        echo "<h3 style='color:green; text-align:center; margin-top:50px;'>✅ Registration Successful!</h3>";
        echo "<p style='text-align:center;'><a href='student_registration.html'>Back to Registration</a></p>";
    } else {
        echo "<h3 style='color:red; text-align:center; margin-top:50px;'>❌ Error saving registration. Try again!</h3>";
        echo "<p style='text-align:center;'><a href='student_registration.html'>Back to Registration</a></p>";
    }

    // Remember Me cookie
    if(isset($_POST['remember_me'])) {
        setcookie("user_email", $email, time() + (86400 * 30), "/"); // 30 days
    }
} else {
    echo "<h3 style='color:red; text-align:center; margin-top:50px;'>⚠️ Invalid request method!</h3>";
}
?>
