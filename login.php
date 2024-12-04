<?php
    session_start();
    if(isset($_SESSION['userdata'])){
        header('location:vote_now.php');
    }

    include 'connect.php';

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $checkquery = "SELECT * FROM `register` WHERE `Email`='$email' AND `Status`='active'";
        $result = mysqli_query($con, $checkquery);
        if(mysqli_num_rows($result)>0){
            $userdata = mysqli_fetch_assoc($result);
            $hash_pass = $userdata['Password'];
            $pass = password_verify($password,$hash_pass);
            if($pass){ 
                $_SESSION['userdata'] = $userdata;
                $group = mysqli_query($con,"SELECT * FROM `register` WHERE `Role`=2");
                $groupdata = mysqli_fetch_all($group,MYSQLI_ASSOC);
                $_SESSION['groupdata'] = $groupdata; ?>
                <script>
                    alert('You are logged in successfully...');
                    location.replace('vote_now.php');
                </script>
            <?php }
            else{ ?>
                <script>
                    alert('Invalid Password');
                    location.replace('login.php');
                </script>
        <?php }
        }
        else{ ?>
            <script>
                alert('Invalid Credentials...');
                location.replace('login.php');
            </script>
    <?php }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="./favicon.png" type="image/png">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <?php include 'nav.php'; ?>

    <section>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
            <h2>Login</h2>
            <div class="input">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" autofocus required>
                <i class="fa-sharp fa-solid fa-envelope"></i>
            </div>
            <div class="input">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" autofocus required>
                <i class="fa-solid fa-eye-slash" id="eyeClose" onclick="toggle()"></i>
            </div>
            <div class="input" id="forget">
                <a href="forget_password.php">Forget Password ? </a>
            </div>
            <div class="input" id="btn">
                <input type="submit" value="Submit" name="submit">
            </div>
            <div id="para">
                Don't have an account ? <a href="register.php">Register</a>
            </div>
        </form>
    </section>

    <script src="register.js"></script>
</body>
</html>