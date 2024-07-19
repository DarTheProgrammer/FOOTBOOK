<head>
       <script src="/javascript/index.js"></script>
       <link rel="stylesheet" href="style2.css">
     <style>body {
    background-image: url( 'rain.jpg' );
    background-repeat: no-repeat;
    background-position: center;
    background-size: 100% 100%;
    
}
</style>
</head>
<body class="body">
    <br>
    <div class="intro">
        <h1>HI WELCOME TO FOOTBOOK!</h1>

    </div>

            <div class="forms">
        <h1 class="login">SIGN UP</h1>
        <form action ="signup.php" method="post">
    <label id="myUser" >Username:</label>
    <input type="text" name="username" ><br><br>
    <label id="myPass" >Password:</label>
    <input type="password" name="password"><br><br>
    <input type="submit" name= "login" Value="Sign Up" id="submitBtn">
</form>

    
</div>
 </label>

      </div>
      
    </label><br><br>
</body>


<?php 
include("database.php");
include('signup_gui.php');
    session_start();
     
$username = null;

$password = null;


     if(isset($_POST["login"])){  

      
 

    if($_SERVER["REQUEST_METHOD"] == "POST"){
         
            $username = filter_input(INPUT_POST, "username",
        FILTER_SANITIZE_SPECIAL_CHARS);
      
        $password = filter_input(INPUT_POST, "password",
        FILTER_SANITIZE_SPECIAL_CHARS); 

        if(empty($username)){

            echo"<div style='font-size: 50px; background-color: red; padding-left: 90px; margin-left: 300px; margin-right: 300px;'>Please enter a username</div> ";

        }
        elseif(empty($password)){
                echo "<div style='font-size: 50px; background-color: red; padding-left: 90px; margin-left: 300px; margin-right: 300px;'>Please enter a password</div>";

        }
        else{ 
            $sql = "INSERT INTO `info` (`id`, `user`, `password`, `reg_date`) VALUES (NULL, '$username', '$password', current_timestamp())";    
            
            
            try{
                mysqli_query($conn, $sql);
                    echo"You are now registered";

            }
            
            catch(mysqli_sql_exception){
                echo "That username is already taken";
            }

            header("Location: home.php");
        }

         

        }
    }  
    
    

  mysqli_close($conn)
?>