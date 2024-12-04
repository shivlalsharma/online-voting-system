<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <link rel="shortcut icon" href="./favicon.png" type="image/png">
    <link rel="stylesheet" href="nav.css">
</head>
<body>
    <nav>
        <img src="image/logo.png" alt="Election Logo">
        <div class="menu-toggle" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="vote_now.php">Vote Now</a></li>
            <li><a href="contact.php">Contact</a></li>
            <?php
                if (!isset($_SESSION['userdata'])) {
                    echo '
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>';
                }
            ?>
            <?php
                if (isset($_SESSION['userdata'])) { ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php }
            ?>
        </ul>
    </nav>

    <script>
        function toggleMenu() {
            const nav = document.querySelector('nav ul');
            const toggle = document.querySelector('.menu-toggle');
            nav.classList.toggle('active');
            toggle.classList.toggle('open');
        }
    </script>
</body>
</html>