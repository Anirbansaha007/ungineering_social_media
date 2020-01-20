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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";
    $result = mysqli_query($conn,$sql);
    if(!$result){
        die("Error:". $sql . "<br/>" . mysqli_error($conn));
    }
    echo "Registration Sucessfull";
    $sql1= "SELECT * FROM users";
    $result1 = mysqli_query($conn,$sql1);
    if(!$result1){
        die("Error: " . $sql . "<br>" . mysqli_error($conn));
    }
    while($row=mysqli_fetch_array($result1))
        if($row['email']==$email){
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        }
    ?>
    <a href="homepage.php">CLICK HERE <br/></a> TO GO TO HOME PAGE.
    <?php
    mysqli_close($conn);  
?>  
