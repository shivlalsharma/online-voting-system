<?php
    include 'connect.php';

    if(isset($_GET['token'])){
        $token = $_GET['token'];
        
        $updatequery = "UPDATE `register` SET `Status`='active' WHERE `token`='$token'";
        $result = mysqli_query($con,$updatequery);
        if($result){ ?>
            <script>
                alert('You are verified successfully...');
                window.location = "login.php";
            </script>
       <?php }
       else{ ?>
        <script>
            alert('You are no longer verified...');
            location.replace('register.php');
        </script>
      <?php }
    }
?>