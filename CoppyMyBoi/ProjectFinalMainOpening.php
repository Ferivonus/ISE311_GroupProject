<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ISE311_css/mainsite.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="ISE311_css/topNav.css?<?php echo time(); ?>">
    <script src="ISE311_js/javascriptCodes.js"></script>
    <script src="ISE311_js/formJs.js"></script>
    <title>Group work</title>
</head>
<body>

<ul class="topnav" id="myTopNavbar">
     <li><a href="default.php">To-do Board</a></li>

      
    <li class="dropdown right" >
        <a href="javascript:void(0)" class="dropbtn">Who we are</a>
        <div class="dropdown-content">
            <a href="#Fahrettin">Fahrettin</a>
            <a href="#Can"> Can</a>
            <a href="#Berk"> Berk</a>
        </div>
    </li>

    
    <li class="iconTop"><a style="font-size:16px;" href="javascript:void(0);" onclick="myFunctionTop()">&#9776;</a></li>

</ul>
<div class="justifyMiddle">
        <form class="HomeworkForm" method="post" action="" >
            <label for="username">username:</label><br>
            <input type="text" id="username" name="username" placeholder="Enter your username" />  <span id="UsernameError" class="error"></span> <br>
            <label for="password">password:</label> <br>
            <input type="password" id="password" name="password" placeholder="Enter your password" />  <span id="PasswordError" class="error"></span> <br> 
            <input type="submit" name="submit" value="sign me" onclick=LoginFunc()>

            <input style="margin-left: 37px;" type="submit" name="submit" value="Log me in" onclick=LoginFunc()> <br>
         </form>
        <p id="generalError" class="error"> </p>
     </div>

</body>
</html>