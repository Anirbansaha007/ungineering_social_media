<?php
    session_start();
    $hostname = "127.0.0.1";
    $username = "root";
    $db_password = "123456";
    $db_name = "social_media";
    
    $conn = mysqli_connect($hostname,$username,$db_password,$db_name);
    if(!$conn){
        $response['success'] = false;
        $response['message'] = "Connection failed: " . mysqli_connect_error();
        echo json_encode($response);
        exit();
    }
    $id=$_SESSION['id'];
    $status=$_POST['status'];
    /*if(empty(trim($_POST['status'])))
    {
        echo "post can't be empty";
        ?>
        <br/><a href="homepage.php">RETRY</a>
        <?php        
    }
    else
    {*/
        $sql = "INSERT INTO statuses (user_id,status,datetime) VALUES ('$id','$status',now())";
        $result = mysqli_query($conn,$sql);
        if(!$result){
            $response['success'] = false;
            $response['message'] = "Error: " . $sql . "<br>" . mysqli_error($conn);                                
            echo json_encode($response);
            exit();
        }
        /*header("Location:homepage.php");
        exit;
    }*/
    $sql1= "SELECT * FROM statuses ORDER BY id DESC LIMIT 1";
    $result1 = mysqli_query($conn,$sql1);
    if(!$result1){
        $response['success'] = false;
        $response['message'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    $row1=mysqli_fetch_array($result1);
    //$userid=$row1['user_id'];
    $sql2= "SELECT users.name FROM statuses INNER JOIN users ON users.id=statuses.user_id WHERE statuses.user_id=$id";
    $result2 = mysqli_query($conn,$sql2);
    if(!$result2){
        $response['success'] = false;
        $response['message'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    $row2=mysqli_fetch_array($result2);
    $response['name'] = $row2['name'];
    $response['status']=$row1['status'];
    $datetime= $row1['datetime'];
    $response['time']= "Time : " . date("H:i \H\\r\s T | d M Y",strtotime($datetime)); 
    $response['success'] = true;
    //$response['message'] = "Status Posted";
    /*$datetime= $row1['datetime'];
    $format_time= "Time : " . date("H:i \H\\r\s T | d M Y",strtotime($datetime)); 
    $html= "<div class=\"br\">
                <div class=\"b1\">
                    <h4>
                        ".$row2['name']."
                    </h4>
                </div>
                <div class=\"b2\">           
                    ".$row1['status']."
                </div>
                <div class=\"b3\">    
                    ".$format_time."
                </div>
            </div>";
    $response['html'] = $html;
    $response['success'] = true;*/
    echo json_encode($response);
    mysqli_close($conn);
?>

