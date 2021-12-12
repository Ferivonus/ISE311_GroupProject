<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ISE311_css/mainsite.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="ISE311_css/topNav.css?<?php echo time(); ?>">
    <script src="ISE311_js/javascriptCodes.js"></script>

    <title>Group work</title>
</head>
<body>

<?php 
session_start();
$server_servername = "localhost";
$server_database = "u397214565_ISE311";
$server_username = "u397214565_ferivonus";
$server_password = "Fahrettin_basturk22";

// Create connection
$conn = mysqli_connect($server_servername, $server_username, $server_password, $server_database);        // Check connection
if (!$conn) {
//die("Connection failed: " . mysqli_connect_error());
}
?>


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
<div class="site">

<h1 class="page-title">Everything will be better in future</h1>

<div class="codeSide">

<?php    
    extract($_POST);
    $NewPerson=true;
    $username="";
    $userName="";
    $flag;
    $_SESSION['newPerson']=$NewPerson;
    $_SESSION['flag'];

    if(isset($_POST['delate'])){
            $username="";
            $_SESSION['userName'] = "";
            $_SESSION['flag'] = false;
        }


        $YouCanLoginAs="";


    
       
    
    
        if(isset($_POST['submitLog']))
        {
            $AccountUsername = $_POST['username'];
            $AccountPassword = $_POST['password'];
            if(empty($AccountUsername) || empty($AccountPassword))
                {
                    $YouCanLoginAs="<p>username and password is required for login. </p>";
                    
                }
                else{
                    $NewPerson=false;
                    
            
                    $_SESSION['newPerson']=false;
                    setcookie('userName', $username, time()- 50000 );
                    $_SESSION['userName'] = $username;
                    $username = $userName;
                    $_SESSION['flag'] = true;
                }
            
        }

        elseif(isset($_POST['SignMe'])){
            $AccountUsername = $_POST['username'];
            $AccountPassword = $_POST['password'];
            if(empty($AccountUsername) || empty($AccountPassword))
            {
                $YouCanLoginAs="<p>username and password is required for sing in. </p>";
            }
            else{
                $sql = "INSERT INTO Accounts (Username,superPassword) values ('$AccountUsername','$password')";
                mysqli_query($conn, $sql);
                $YouCanLoginAs = " <p>You can log in as ". $AccountUsername . " right now.</p>";
            }
            
        }
        else{
            $YouCanLoginAs="";
        }

        if($_SESSION['flag'])
        {
            $_SESSION['newPerson']=false;
        } 

    if($_SESSION['newPerson'])
    {
            echo "<div class='justifyMiddle'>
            <form class='HomeworkForm' method='post' action='' >
                <label for='username'>username:</label><br>
                <input type='text' id='username' name='username' placeholder='Enter your username' /> <br>
                <label for='password'>password:</label> <br>
                <input type='password' id='password' name='password' placeholder='Enter your password' /> <br> 
                <input type='submit' name='SignMe' value='sign me' >
        
                <input style='margin-left: 37px;' type='submit' name='submitLog' value='Log me in' > <br>
            </form>
              $YouCanLoginAs 
        </div> </div> </div>
        </body>
        </html>";
        exit();
    }   
?>




<div class="justifyMiddle">
        <form class="HomeworkForm" method="post" action="">
            <h3><?php  echo "welcome ". $_SESSION['userName'];?></h3>
            <label for="To-do">What is your work to do:</label><br> 
            <input type="text" id="To-do" name="To-do" placeholder="type your work here" />
            <input type="submit" name="addJob" value="add your job">
            <input type="submit" name="delate" value="quit">
         </form>
     </div>

    <?php 
        extract($_POST);

        $ToDo_arr="";

        
        

        if(isset($_POST['addJob']))
        {
            $ToDo_arr = $_POST['To-do'];            
            $sql = "INSERT INTO jobs (AccountName,WorkToDo) values ('$username','$ToDo_arr')";
            $NewPerson=true;
            mysqli_query($conn, $sql);
        }
        $username = $_SESSION['userName'];
        $Who = $username;
        $sqlwho= "SELECT WorkToDo From jobs WHERE AccountName like '$Who'"; 
        $result = mysqli_query($conn, $sqlwho);
        
    ?>

     <div>
    <center>
        <div>
            <?php
//            echo $YouCanLoginAs;
            echo $ToDo_arr;
            
            echo "<table>";
            while($row = mysqli_fetch_row($result))
            {
                echo "<tr>";
                foreach ($row as $key =>$value){
                    echo "<td>".$value."</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            mysqli_close($conn);
            ?>
            
        </div>
    </center>
    </div>

</div>






    </div>
</body>

</html>