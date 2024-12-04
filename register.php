<?php
    session_start();
    if(isset($_SESSION['userdata'])){
        header('location:vote_now.php');
    }

    include 'connect.php';

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($con,$_POST['name']);
        $address = mysqli_real_escape_string($con,$_POST['address']);
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $phone = mysqli_real_escape_string($con,$_POST['phone']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        $role = mysqli_real_escape_string($con,$_POST['role']);
        $photo = $_FILES['photo']['name'];
        $photo_tmp = $_FILES['photo']['tmp_name'];

        $pass_hash = password_hash($password,PASSWORD_BCRYPT);
        $token = bin2hex(random_bytes(15));

        $checkquery = "SELECT * FROM `register` WHERE (`Email`='$email' AND `Status`='active') OR `Photo`='$photo'";
        $result = mysqli_query($con,$checkquery);
        if(mysqli_num_rows($result)>0){
            echo '
            <script>
                alert("Email or photo already in use. Please try again.");
                location.replace("register.php");
            </script>';
        }
        else{
            if(!empty($password)){
                $insertquery = "INSERT INTO `register` (`Name`,`Address`,`Email`,`Phone`,`Password`,`Role`,`Photo`,`token`,`Status`,`Date`) VALUES('$name','$address','$email','$phone','$pass_hash','$role','$photo','$token','active',current_timestamp())";
                $result = mysqli_query($con,$insertquery);
                if($result){
                    move_uploaded_file($photo_tmp, "image/$photo");

                    $subject = "Email Verification ";
                    $body = "Dear, $name. Click Here to verify your account
http://localhost/Voting/verify.php?token=$token ";
                    $sender = "From: shivlalkumarsharma30062003@rjcollege.edu.in ";

                    if(mail($email, $subject, $body, $sender)){ 
                        echo "
                        <script>
                            alert('Check your email to verify your account...');
                            location.replace('login.php');
                        </script>";
                    }
                   else{ 
                    echo "
                        <script>
                            alert('Something went wrong...');
                            location.replace('register.php');
                        </script>";
                    }
                }
                else{
                    echo "
                    <script>
                        alert('Something went wrong...');
                        location.href = 'register.php';
                    </script>";
                }
            }
            else{ 
                echo "
                <script>
                    alert('Password must be required...');
                    location.replace('register.php');
                </script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="shortcut icon" href="./favicon.png" type="image/png">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <?php include 'nav.php'; ?>

    <section>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" onsubmit="return validate()" enctype="multipart/form-data">
            <h2>Register</h2>
            <div class="input">
                <input type="text" name="name" placeholder="Enter your name" maxlength="40" autofocus required>
                <i class="fa-sharp fa-solid fa-user"></i>
            </div>
            <div class="input">
                <input type="text" name="address" placeholder="Enter your address" maxlength="80" autofocus required>
                <i class="fa-sharp fa-solid fa-location-dot"></i>
            </div>
            <div class="input">
                <input type="email" name="email" placeholder="Enter your email" autofocus required>
                <i class="fa-sharp fa-solid fa-envelope"></i>
            </div>
            <div class="input">
                <input type="tel" name="phone" placeholder="Enter your phone number" pattern="^[0-9]{10}$" autofocus required>
                <i class="fa-sharp fa-solid fa-phone-volume"></i>
            </div>
            <div class="input">
                <input type="password" name="password" id="password" placeholder="Enter your password" onkeyup="validatePassword(this.value)" autofocus required>
                <i class="fa-solid fa-eye-slash" id="eyeClose" onclick="toggle()"></i>
                <p class="error"></p>
            </div>
            <div class="input">
                <input type="file" name="photo" autofocus required>
            </div>
            <div class="input">
                <select name="role">
                    <option value="1" selected>Voter</option>
                    <option value="2">Group</option>
                </select>
            </div>
            <div id="btn">
                <input type="submit" value="Submit" name="submit">
            </div>
            <div id="para"> Already have an account? <a href="login.php">Login</a></div>
        </form>
    </section>

    <script src="register.js"></script>
</body>
</html>