<?php
    session_start();
    if(isset($_SESSION['userdata'])){
        header('location:vote_now.php');
    }

    include 'connect.php';

    if(isset($_POST['submit'])){
        $email = $_POST['email'];

        $checkquery = "SELECT * FROM `register` WHERE `Email`='$email' AND `Status`='active'";
        $result = mysqli_query($con,$checkquery);
        if(mysqli_num_rows($result)>0){
            $userdata = mysqli_fetch_assoc($result);
            $name = $userdata['Name'];
            $token = $userdata['token'];
            $subject = "Reset Password";
            $body = "Dear, $name. Click here to reset your password
http://localhost/Voting/reset_password.php?token=$token";
            $header = "From: shivlalkumarsharma30062003@rjcollege.edu.in";

            if(mail($email, $subject, $body, $header)){
                echo '
                <script>
                    alert("Check your email to reset your password...");
                    location.replace("login.php");
                </script>';
            }
            else{
                echo '
                <script>
                    alert("Something went wrong...");
                    location.replace("forget_password.php");
                </script>';
            }
        }
        else{
            echo '
            <script>
                alert("Email doesn\'t exists...");
                location.replace("forget_password.php");
            </script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <link rel="shortcut icon" href="./favicon.png" type="image/png">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <?php include 'nav.php' ?>

    <section>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
            <h2>Verify Email</h2>
            <div class="input">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" autofocus required>
                <i class="fa-sharp fa-solid fa-envelope"></i>
            </div>
            <div class="input" id="btn">
                <input type="submit" value="Submit" name="submit">
            </div>
            <div id="para">
                Don't have an account? <a href="register.php">Register</a>
            </div>
        </form>
    </section>
</body>
</html>