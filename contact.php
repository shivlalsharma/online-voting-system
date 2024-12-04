<?php
    session_start();
    include 'connect.php';

    if(!isset($_SESSION['userdata'])){
        header('location:login.php');
    }

    if(isset($_POST['submit'])){
        $msg = mysqli_real_escape_string($con,$_POST['msg']);
        $name = mysqli_real_escape_string($con,$_POST['name']);
        $uid = mysqli_real_escape_string($con,$_POST['uid']);
        $address = mysqli_real_escape_string($con,$_POST['address']);
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $phone = mysqli_real_escape_string($con,$_POST['phone']);
        $role = mysqli_real_escape_string($con,$_POST['role']);
        $status = mysqli_real_escape_string($con,$_POST['status']);
        $votes = $_POST['votes'];

        $insertquery = "INSERT INTO `contact` (`User_Id`,`Name`,`Address`,`Email`,`Phone`,`Role`,`Message`,`Status`,`Votes`,`Date`) VALUES ('$uid','$name','$address','$email','$phone','$role','$msg','$status',$votes,current_timestamp())";
        $result = mysqli_query($con,$insertquery);
        if($result){
            echo '
            <script>
                alert("Message has been sent successfully...");
                location.replace("contact.php");
            </script>';
        }
        else{
            echo '
            <script>
                alert("Something went wrong...");
                location.replace("contact.php");
            </script>';
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="shortcut icon" href="./favicon.png" type="image/png">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <?php include 'nav.php'; ?>

    <section>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
            <h2>Contact</h2>
            <input type="hidden" name="uid" value="<?php echo $_SESSION['userdata']['Id']; ?>">
            <input type="hidden" name="name" value="<?php echo $_SESSION['userdata']['Name']; ?>">
            <input type="hidden" name="address" value="<?php echo $_SESSION['userdata']['Address']; ?>">
            <input type="hidden" name="email" value="<?php echo $_SESSION['userdata']['Email']; ?>">
            <input type="hidden" name="phone" value="<?php echo $_SESSION['userdata']['Phone']; ?>">
            <input type="hidden" name="role" value="<?php echo $_SESSION['userdata']['Role']; ?>">
            <input type="hidden" name="status" value="<?php echo $_SESSION['userdata']['current_status']; ?>">
            <input type="hidden" name="votes" value="<?php echo $_SESSION['userdata']['votes']; ?>">
            <div class="input">
                <label for="msg">Message</label>
                <input type="text" id="msg" name="msg" autofocus required>
                <i class="fa-sharp fa-solid fa-message"></i>
            </div>
            <div class="input" id="btn">
                <input type="submit" value="Send Message" name="submit">
            </div>
        </form>
    </section>
</body>
</html>