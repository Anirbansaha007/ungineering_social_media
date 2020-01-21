<?php
    session_start();
    $hostname="127.0.0.1";
    $username="root";
    $db_password="123456";
    $db_name="social_media";
    
    $conn = mysqli_connect($hostname,$username,$db_password,$db_name);
    if(!$conn){
        die("connection failed: ". mysqli_connect_error());
    }
    $email = $_POST['email'];
    $password = $_POST['password'];
    $flag=0;
    $sql= "SELECT * FROM users";
    $result = mysqli_query($conn,$sql);
    if(!$result){
        die("Error: " . $sql . "<br>" . mysqli_error($conn));
    }
    while($row=mysqli_fetch_array($result))
    {
        if(($row['email']==$email) && ($row['password']==$password))
        {
            $flag=1;
            break;
        }
    }
    if($flag==0)
    {
        echo(" INVALID USERNAME OR PASSWORD");
    }   
    else
    {
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        ?>
        <a href="homepage.php">CLICK HERE <br/></a> TO GO TO HOME PAGE.
        <?php        
    }
    header("Location:homepage.php");
        exit;
    mysqli_close($conn);  
?>  
