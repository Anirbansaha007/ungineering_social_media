<?php
    session_start();
    $hostname = "127.0.0.1";
    $username = "root";
    $db_password = "123456";
    $db_name = "social_media";
    
    $conn = mysqli_connect($hostname,$username,$db_password,$db_name);
    if(!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }
    $id=$_SESSION['id'];
    $post=$_POST['status'];
    $sql = "INSERT INTO statuses (user_id,status,time) VALUES ('$id','$post',now())";
    $result = mysqli_query($conn,$sql);
    if(!$result){
        die("Error: ". $sql. "<br/>". mysqli_error($conn));
    }
    echo "status posted!!"
    ?>
    <br/><a href="homepage.php">click here</a> to go to homepage
    <?php
    mysqli_close($conn);
?>
