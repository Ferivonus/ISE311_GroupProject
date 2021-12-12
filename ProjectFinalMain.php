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


    
       
    
        if(isset($_POST['SignMe'])){
            $AccountUsername = $_POST['username'];
            $AccountPassword = $_POST['password'];
            if(empty($AccountUsername) || empty($AccountPassword))
            {
                $YouCanLoginAs="<p>username and password is required for sing in. </p>";
            }
            else{
                $SigningFlag=true;
                $Who = $AccountUsername;
                $sqlwho= "SELECT Username From Accounts WHERE Username like '$Who'";
                $result = mysqli_query($conn, $sqlwho);

                while($row = mysqli_fetch_row($result))
                    {
                        foreach ($row as $key =>$value){
                            if($AccountUsername == $value){
                                $SigningFlag=false;
                                $YouCanLoginAs="Your username is already used by some dude.";
                                break;
                            }
                        }
                    }
                


                if($SigningFlag)
                {
                    $sql = "INSERT INTO Accounts (Username,superPassword) values ('$AccountUsername','$password')";
                    mysqli_query($conn, $sql);
                    $YouCanLoginAs = " <p>You can log in as ". $AccountUsername . " right now.</p>";
                    $NewPerson=false;
                    $_SESSION['newPerson']=false;
                    $_SESSION['flag'] = true;

                    setcookie('userName', $AccountUsername, time()- 50000 );
                    $_SESSION['userName'] = $AccountUsername;
                    $AccountUsername = $userName;
                }      
            }      
        }

        elseif(isset($_POST['submitLog']))
        {
            $AccountUsername = $_POST['username'];
            $AccountPassword = $_POST['password'];
            if(empty($AccountUsername) || empty($AccountPassword))
                {
                    $YouCanLoginAs="<p>username and password is required for login. </p>";
                    
                }
                else{
                    $SubmitFlg=false;

                    $Who = $AccountUsername;
                    $sqlwho= "SELECT superPassword From Accounts WHERE Username like '$Who'"; 
                    $result = mysqli_query($conn, $sqlwho);

                    while($row = mysqli_fetch_row($result))
                    {
                        foreach ($row as $key =>$value){
                            if($AccountPassword == $value){
                                $SubmitFlg=true;
                                break; 
                            }
                        }
                    }

                    if($SubmitFlg)
                    {
                        $NewPerson=false;
                        $_SESSION['newPerson']=false;
                        setcookie('userName', $AccountUsername, time()- 50000 );
                        $_SESSION['userName'] = $AccountUsername;
                        $AccountUsername = $userName;
                        $_SESSION['flag'] = true;
                    }
                    else{
                        $YouCanLoginAs="You miss wrote your username or password.";
                    }
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
                <input type='text' id='username' name='username' placeholder='Enter your username' value= '$AccountUsername'/> <br>
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

        
        $username = $_SESSION['userName'];

        if(isset($_POST['addJob']))
        {
            
            $ToDo_arr = $_POST['To-do'];            
            $sql = "INSERT INTO jobs (AccountName,WorkToDo,is_checked) values ('$username','$ToDo_arr',0)";
            $NewPerson=true;
            mysqli_query($conn, $sql);
        }
        $Who = $username;
        $sqlwho= "SELECT WorkToDo From jobs WHERE AccountName like '$Who'"; 
        $resultWrite = mysqli_query($conn, $sqlwho);
        

    
    echo " <div class = 'justifyMiddle'> "; 
        
            echo "<table>";
            echo "<th> what shoul I do </th>";
            echo "<th> I am doing it. </th>";
            echo "<th> :3 </th>";

            while($row = mysqli_fetch_row($resultWrite))
            {
                echo "<tr>";
                foreach ($row as $key =>$value){
                                //bir şeyi silmek isterken silmek istediği şeyin datasını bul value yi array olarak kaydedebilir. obje dili çalışabilir.
                                //bir şeyler denenecek gibi, çünkü update olmuyor vsvs, ne yapman gerekiyor onu bulmam gerekiyor.

                    echo "<td>" .$value. "</td>";
                    echo "<td> <input name='' type='checkbox' value=''> </td>";
                    echo "<td> <div style= 'float:right' > <button>delate</button> </td>";
                    
                }
                echo "</tr>";
            }
            echo "</table>";
            mysqli_close($conn);
            
    echo " </div>";
            ?>

</div>

            




    </div>
</body>

</html>