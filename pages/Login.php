<?php
// Start session to manage user login state
session_start();

// Dummy user data for login (This will later be replaced with database or a more secure method)
$users = [
    'user1' => 'password1',
    'user2' => 'password2',
    'admin' => 'admin123'
];

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize user inputs to avoid XSS attacks
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Check if user exists in our data
    if (isset($users[$username]) && $users[$username] == $password) {
        // If login is successful, set session and redirect to home page
        $_SESSION['username'] = $username;
        header('Location: index.php'); // Or your homepage/dashboard URL
        exit();
    } else {
        // Invalid login attempt
        $error = 'Invalid username or password.';
    }
}
?>

<?php include 'header.php'; ?>

<div class="login-container">
    <h2>Login</h2>
    <!-- Display error message if login fails -->
    <?php if (isset($error)) : ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <button type="submit">Login</button>
    </form>

    <p>Don't have an account? <a href="signup.php">Sign up</a></p>
</div>

<?php include 'footer.php'; ?>