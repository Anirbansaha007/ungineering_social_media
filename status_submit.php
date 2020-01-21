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
    $status=$_POST['status'];
    if(empty(trim($_POST['status'])))
    {
        echo "post can't be empty";
        ?>
        <br/><a href="homepage.php">RETRY</a>
        <?php        
    }
    else
    {
        $sql = "INSERT INTO statuses (user_id,status,datetime) VALUES ('$id','$status',now())";
        $result = mysqli_query($conn,$sql);
        if(!$result){
            die("Error: ". $sql. "<br/>". mysqli_error($conn));    
        }
        header("Location:homepage.php");
        exit;
    }
    mysqli_close($conn);
?>
