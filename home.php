<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./favicon.png" type="image/png">
    <title>Welcome <?php if(isset($_SESSION['userdata'])){ echo $_SESSION['userdata']['Name']; }?></title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <?php include 'nav.php'; ?>
    
    <section>
        <p id="para1">Online Voting System</p>
        <p id="para2">
            Welcome to the Online Voting System, a secure and efficient platform designed to empower your voice. With our system, you can participate in elections from the comfort of your home, ensuring convenience and accessibility for all eligible voters.
        </p>
        <p id="para3">
            Our platform is built with state-of-the-art security measures to guarantee the integrity and confidentiality of your votes. Whether you're voting for local, organizational, or national elections, we make your voting experience seamless and transparent.
        </p>
        <p id="para4">
            Log in or register today to be part of the democratic process. Let's shape the future together, one vote at a time!
        </p>
    </section>
</body>
</html>