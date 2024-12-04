<?php
    session_start();
    if(isset($_SESSION['userdata'])){
        header('location:vote_now.php');
    }

    include 'connect.php';

    if(isset($_POST['submit'])){
        if(isset($_POST['token'])){
            $token = $_POST['token'];
            $pass = $_POST['password'];
            $cpass = $_POST['cpassword'];
    
            $pass_hash = password_hash($pass,PASSWORD_BCRYPT);

            if($pass==$cpass){
                $updatepass = "UPDATE `register` SET `Password`='$pass_hash' WHERE `token`='$token'";
                $result = mysqli_query($con, $updatepass);
                if($result){
                    echo '
                    <script>
                        alert("Password has been updated...");
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
                        alert("Password do not match...");
                        location.replace("forget_password.php");
                    </script>';
            }
        }
        else{
            echo "<script>window.open('login.php','_self')</script>";
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="shortcut icon" href="./favicon.png" type="image/png">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <?php  include 'nav.php'; ?>

    <section>
        <?php 
            $token = '';
            if(isset($_GET['token'])){
                $token = $_GET['token'];
            } else{
                echo "<script>window.open('login.php','_self')</script>";
                exit();
            }
        ?>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post" onsubmit="return validate()">
            <h2>Reset Password</h2>
            <div class="input">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" onkeyup="validatePassword(this.value)" autofocus required>
                <i class="fa-solid fa-eye-slash" id="eyeClose" onclick="toggle()"></i>
                <p class="error"></p>
            </div>
            <div class="input">
                <label for="cpassword">Confirm Password</label>
                <input type="password" id="cpassword" name="cpassword" onkeyup="validateCPassword(this.value)" autofocus required>
                <p class="error"></p>
            </div>
            <input type="hidden" name="token" value="<?php echo $token; ?>">
            <div class="input" id="btn">
                <input type="submit" value="Submit" name="submit">
            </div>
            <div id="para">
                Already have an account ? <a href="login.php">Login</a>
            </div>
        </form>
    </section>

    <script src="register.js"></script>
</body>
</html>