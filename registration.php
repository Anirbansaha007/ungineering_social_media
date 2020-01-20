<!DOCTYPE html>
<html>
    <head>
        <title>Web_Registration</title>
        <link rel="stylesheet" href="css/registration.css"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"/>
    </head>  
    <body>
        <div class="header">
            <div class="row1">
                <div class="row1col1"><img style="float:right;" src="image/ungineering_logo.svg" alt=" Ungineering logo"></div>
                <div class="row1col2">
                    <h1><span>un</span>gineering</h1>
                    <h6>A <span>bit</span> of knwoledge is good.A <span>byte</span> is better</h6>
                </div>
            </div>
            <div class="row2">
                <div class="row2col1">
                    <a style="text-decoration: underline red;" href="login.php"><span>Existing User</span></a>
                </div>
                <div class="row2col2">
                    <a style="color: black;" href="registration.php">New User</a>
                </div>
            </div>
            <form method="post" action="registration_submit.php">
                <div id="bigtext">
                    <h1>Create New Account at </br>Ungineering</h1>
                </div>
                <div class="form">
                    <div class="label">Name</div>
                    <input class="input" type="text" name="name">
                </div>
                 <div class="form">
                    <div class="label">Email</div>
                    <input class="input" type="text" name="email">
                </div>
                 <div class="form">
                    <div class="label">Password</div>
                    <input class="input" type="password" name="password">
                </div>
                 <div class="form">
                    <div class="label">Confirm Password</div>
                    <input class="input" type="password" name="password">
                </div>
                <div class="ad"><input type="submit" name="submit" value="Submit"></div>
                <div class="ad"><a style="text-decoration: underline red;"href="login.php"><span>Existing User,Login</span></a></div>
            </form>
        </div>
        <div class="footer">
           <div class="footera1">
                <div class="x">Connect with us at -</div><br/>
                <a class="y" href="https://www.youtube.com/channel/UCJfiRBONgZIHsMtvlvCGaqg" target="_blank">
                    <img class="img1" src="image/yt1.png"/>
                </a>                
                <a href="https://www.facebook.com/Ungineering/" target="_blank">
                    <img class="img1" src="image/fb.png"/>
                </a>
            </div>
            <div class="footera2">
                <div class="x">
                    <div>For any questions / doubts, write us at -</div>
                </div>
                <div class="y">
                    <p>queries@ungineering.com</p>
                </div>
            </div>
        </div>
       
    </body>
</html>
        
        
            
           
