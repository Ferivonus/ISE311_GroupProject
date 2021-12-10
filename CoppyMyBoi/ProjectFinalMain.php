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



<div class="justifyMiddle">
        <form class="HomeworkForm" method="post" action="" >
            <label for="To-do">What is your work to do?:</label><br>
            <input type="text" id="To-do" name="To-do" placeholder="type your work here" />
           
            <input type="submit" name="submit" value="add to database">
         </form>
     </div>

    <?php 
        extract($_POST);
        $servername = "localhost";
        $database = "u397214565_ISE311";
        $username = "u397214565_ferivonus";
        $password = "Fahrettin_basturk22";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $database);        // Check connection
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }

        $ToDo_arr="";
        $WorkNumber=0;
        if(isset($_POST['submit']))
        {
            $ToDo_arr = $_POST['To-do'];
            $WorkNumber++;
            echo "I am working<br>";
            
            $sql = "INSERT INTO jobs (AccountName,workingNum,WorkToDo) values ('ferivonus','$WorkNumber','$ToDo_arr')";
            if (mysqli_query($conn, $sql)) {
            echo "Database created successfully";
            } else {
            echo "Error creating database: " . mysqli_error($conn);
        }
        }

        

        mysqli_close($conn);
    ?>

     <div>
    <center>
        <div>
            <?php 
            echo $ToDo_arr;
            
            ?>
            
        </div>
    </center>

     
</body>


    
</div>
</html>