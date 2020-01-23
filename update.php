<?php
    session_start();
    $hostname="127.0.0.1";
    $username="root";
    $db_password="123456";
    $db_name="social_media";
    $user_id="1";
    
    $conn=mysqli_connect($hostname,$username,$db_password,$db_name);
    if(!$conn){
        diey("connection failed : " . mysqli_connect_error());
    }
    $id = 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $college = $_POST['college'];
    $phone_number = $_POST['phone_number'];
    $sql =("UPDATE users SET name='$name', email='$email',password='$password', college='$college', phone_number='$phone_number',WHERE id='$id'");
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Error: " . $sql . "<br>" . mysqli_error($conn));
    }
    while ($row=mysqli_fetch_array($result)) {
        echo $row['name'];
        echo $row['email'];
        echo $row['password'];
        echo $row['college'];
        echo $row['phone_number'];
   }
   mysqli_close($conn);
?>

        
         
