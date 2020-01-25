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
?>
<!DOCTYPE html>
<html>
    <head>
        <title>homepage</title>
        <link rel="stylesheet" href="css/homepage.css"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"/>
    </head>
    <body>
        <div class="a">
            <div class="ac1">
                <div class="logo">
                    <a href="homepage.php">                                
                        <div class="img">
                            <img class="pic" src="image/ungineering_logo.svg" />
                        </div>
                        <div class="text">
                            <div class="up">
                                <span style="color:#F04C4E">un</span>gineering
                            </div>
                            <div class="down">
                                <span style="color:#7F7C7E">A</span><span style="color:#F04C4E"> bit</span><span style="color:#7F7C7E"> of knowledge is good. A</span><span style="color:#F04C4E"> byte</span><span style="color:#7F7C7E"> is better</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <?php
                if(isset($_SESSION['id'])&&$_SESSION['id']){
                    ?>
                    <div class="ac2l">
                        <div class="logoutc">
                            <a class="lbl" href="logout.php">
                                <div class="logout">
                                    Logout
                                </div>                                
                            </a>
                        </div>
                        <div class="mydashc">
                            <div class="mydash">
                                <a class="la" href="my_profile.php">
                                    My Dashboard
                                </a>    
                            </div>
                        </div>
                    </div>  
                    <?php
                }  
                else{
                    ?>
                    <div class="ac2">
                        <div class="newc">
                            <a class="lb" href="registration.php">
                                <div class="new">
                                    New user
                                </div>
                            </a>
                        </div>
                        <div class="logc">
                            <a class="la" href="login.php">
                                <div class="log">
                                    Login
                                </div>
                            </a>
                        </div>
                    </div> 
                <?php
                }  
            ?>           
        </div>
        <div class="b">
        <?php
            if(isset($_SESSION['id'])&&$_SESSION['id']){
                ?>
            <div class="bst">
                <div class="b4">
                    Write something here
                </div>
                <div>
                    <form class=form_fillup method="post" action="status_submit.php">
                        <div>
                            <textarea class="b5" name="status" required></textarea>
                        </div>
                        <div class="button">
                            <input class="b6" type="submit" name="submit" value="Post"/>
                        </div>
                    <form>
                </div>    
            </div>
            <?php
            }
        ?>
            <div class= status_show>
            <?php
                $sql= "SELECT * FROM statuses ORDER BY id DESC";
                $result = mysqli_query($conn,$sql);
                if(!$result){
                    die("Error: " . $sql . "<br>" . mysqli_error($conn));
                }
                while($row=mysqli_fetch_array($result)){
            ?>   
                <div class="br">                
                    <div class="b1">
                        <h4>
                            <?php
                                $id=$row['user_id'];
                                $sql1= "SELECT users.name FROM statuses INNER JOIN users ON users.id=statuses.user_id WHERE statuses.user_id=$id";
                                $result1 = mysqli_query($conn,$sql1);
                                if(!$result1){
                                    die("Error: " . $sql . "<br>" . mysqli_error($conn));
                                }
                                $row1=mysqli_fetch_array($result1);
                                $name=$row1['name'];
                                echo $name;
                            ?>                
                        </h4>
                    </div>                
                    <div class="b2">
                        <?php
                            $status=$row['status'];
                            echo $status;
                        ?>
                    </div>
                    <div class="b3">
                        <?php
                            $datetime= $row['datetime'];
                            echo "Time : " . date("H:i \H\\r\s T | d M Y",strtotime($datetime));                        
                        ?>
                    </div>               
                </div>
                 <?php
                    }
                    mysqli_close($conn);  
                ?>                       
            </div>
        </div>            
        <div class="c">
            <div class="cc1">
                <div class="connect">
                    <div class="up">Connect with us at</div><br/>
                    <a class="yt" href="https://www.youtube.com/channel/UCJfiRBONgZIHsMtvlvCGaqg" target="_blank">
                        <img class="pic" src="image/yt1.png"/>
                    </a>                
                    <a href="https://www.facebook.com/Ungineering/" target="_blank">
                        <img class="pic" src="image/fb.png"/>
                    </a> 
                </div>
            </div>
            <div class="cc2">
                <div class="question">
                    <div class="up">
                        For any questions/ doubts, write us at-
                    </div>
                    <div class="down">
                        queries@ungineering.com
                    </div>
                </div>
            </div>
        </div>
        <script type = "text/javascript" src="js/jquery-3.4.1.min.js"></script> 
        <script type = "text/javascript" src="js/status.js"></script>         
    </body>
</html>
