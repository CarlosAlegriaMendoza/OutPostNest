<?php
// Initialize error message
$error_message = '';

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and validate form input
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (empty($name) || empty($email) || empty($message)) {
        $error_message = 'All fields are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = 'Please enter a valid email address.';
    } else {
        // Simulate successful form submission (no email is actually sent)
        $error_message = 'Thank you for your message. We will get back to you soon.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Outpost Nest</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="container">
            <h1>Outpost Nest</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content Section -->
    <main>
        <h2>Contact Us</h2>

        <?php if ($error_message): ?>
            <p class="message"><?php echo $error_message; ?></p>
        <?php endif; ?>
        
        <form action="contact.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Email:</label>
        
            <input type="email" id="email" name="email" value="fakeuser@example.com" required><br>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea><br>

            <button type="submit">Send Message</button>
        </form>
    </main>

    <!-- Footer Section -->
    <footer>
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> Outpost Nest. All Rights Reserved.</p>
            <nav>
                <ul>
                    <li><a href="privacy.php">Privacy Policy</a></li>
                    <li><a href="terms.php">Terms of Service</a></li>
                    <li><a href="index.php">Home</a></li>
                </ul>
            </nav>
        </div>
    </footer>
</body>
</html>