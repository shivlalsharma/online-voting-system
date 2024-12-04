<?php
    session_start();
    include 'connect.php';

    if(!isset($_SESSION['userdata'])){
        header('location:login.php');
    }

    $userdata = $_SESSION['userdata'];
    $groupdata = $_SESSION['groupdata'];

    if($_SESSION['userdata']['current_status']==0){
        $status = '<b style="color:red">Not Voted</b>';
    }
    else{
        $status = '<b style="color:green">Voted</b>';
    }

    if(isset($_POST['submit'])){
        $gvotes = $_POST['gvotes'];
        $total_gvotes = $gvotes + 1;
        $gid = $_POST['gid'];
        $uid = $_POST['uid'];

        $updategroup = mysqli_query($con,"UPDATE `register` SET `votes`='$total_gvotes' WHERE `Id`='$gid'");
        $updateuser = mysqli_query($con,"UPDATE `register` SET `current_status`=1 WHERE `Id`='$uid'");

        if($updategroup AND $updateuser){
            $group = mysqli_query($con,"SELECT * FROM `register` WHERE `Role`=2");
            $groupdata = mysqli_fetch_all($group,MYSQLI_ASSOC);
            $_SESSION['groupdata'] = $groupdata;
            $_SESSION['userdata']['current_status'] = 1;
            echo '
                <script>
                    alert("Voted Successfully...");
                    location.replace("vote_now.php");
                </script>';
        }
        else{
            echo '
                <script>
                    alert("Some error has occured...");
                    location.replace("vote_now.php");
                </script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote Now</title>
    <link rel="shortcut icon" href="./favicon.png" type="image/png">
    <link rel="stylesheet" href="vote_now.css">
</head>
<body>
    <?php include 'nav.php'; ?>
    
    <section>
    <!-- User Details -->
    <div id="user">
        <img src="image/<?php echo $userdata['Photo']; ?>" alt="My Photo">
        <div>
            <div class="details"><b>Name : </b><?php echo $userdata['Name']; ?></div>
            <div class="details"><b>Address : </b><?php echo $userdata['Address']; ?></div>
            <div class="details"><b>Email : </b><?php echo $userdata['Email']; ?></div>
            <div class="details"><b>Mobile No. : </b><?php echo $userdata['Phone']; ?></div>
            <div class="details"><b>Status : </b><?php echo $status; ?></div>
        </div>
    </div>

    <!-- Group Details -->
    <div id="group">
        <div id="group-part">
            <?php if ($_SESSION['groupdata']) {
                for ($i = 0; $i < count($groupdata); $i++) { ?>
                    <div class="group-item">
                        <div class="group-details">
                            <div class="details"><b>Name : </b><?php echo $groupdata[$i]['Name']; ?></div>
                            <div class="details"><b>Address : </b><?php echo $groupdata[$i]['Address']; ?></div>
                            <div class="details"><b>Votes : </b><?php echo $groupdata[$i]['votes']; ?></div>
                            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="Post">
                                <input type="hidden" name="gvotes" value="<?php echo $groupdata[$i]['votes']; ?>">
                                <input type="hidden" name="gid" value="<?php echo $groupdata[$i]['Id']; ?>">
                                <input type="hidden" name="uid" value="<?php echo $userdata['Id']; ?>">
                                <?php if ($_SESSION['userdata']['current_status'] == 0) { ?>
                                    <div id="btn">
                                        <input type="submit" name="submit" value="Vote">
                                    </div>
                                <?php } else { ?>
                                    <div id="button">
                                        <input type="submit" disabled name="submit" value="Voted">
                                    </div>
                                <?php } ?>
                            </form>
                        </div>
                        <div id="image">
                            <img src="image/<?php echo $groupdata[$i]['Photo']; ?>" alt="Group Photo">
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</section>
</body>
</html>