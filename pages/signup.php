<?php
// Processing form submission if POST request is made
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Capture and sanitize input data
    $username = htmlspecialchars(trim($_POST['username']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $confirm_password = htmlspecialchars(trim($_POST['confirm_password']));

    // Validate inputs
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "All fields are required!";
        exit;
    }

    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Simulate saving the data
    echo "<h2>Sign-Up Successful!</h2>";
    echo "Welcome, $username!<br>Your email is $email.<br>";
    exit;  
}
?>

<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Outpost Nest</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Sign Up for Outpost Nest</h1>
    </header>
    <main>
        <form action="signup.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required><br>

            <button type="submit">Sign Up</button>
        </form>
    </main>

    <?php include_once 'footer.php'; ?>
    
</body>
</html>