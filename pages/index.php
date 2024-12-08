<?php

session_start();

include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" conttent="width=device-width, initial-scale=1.0">
    <title>Outpost Nest - Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <header>
        <h1>Welcome to Outpost Nest!</h1>
        <p>Your go-to community for sharing and discovering camping adventures, tips, and experiences.</p>
    </header>

    <nav>
        <ul>
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Sign Up</a></li>
            <li><a href="blog.php">Explore Blogs</a></li>
        </ul>
    </nav>

    <section class="intro">
        <h2>About Outpost Nest</h2>
        <p>Outpost Nest is a platform created for campers of all experience levels. Whether you are a seasoned camper with plenty of tips to share or a newcomer looking for guidance, you will find a welcoming community here.</p>
        <p>Browse through our blogs, join discussions, and become part of a supportive network of outdoor enthusiasts. Create an account to share your own stories or offer tips to help others in their camping journeys.</p>
        <p>Get started by logging in or signing up to explore all the features we offer!</p>
    </section>

    <?php if (isset($_SESSION['username'])): ?>
        <section class="welcome-back">
            <h2>Welcome back, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
            <p><a href="profile.php">View your profile</a> or <a href="blog.php">check out the latest blogs</a>.</p>
        </section>
    <?php endif; ?>

</div>

<?php
// Include footer for consistent layout
include_once 'footer.php';
?>

</body>
</html>