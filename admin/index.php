<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Page</title>
</head>

<body>
    <?php
    session_start();
    ?>
    <h1>Admin Page</h1>
    <p>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    </p>
    <a href="../handler/logout_handler.php">Logout</a>
</body>

</html>