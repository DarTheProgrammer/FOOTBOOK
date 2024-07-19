<?php
    session_start();
    
    include("facebook.php");
    include("web home.php");
    include("database.php");
 
    ?>



<?php
    if(isset($_POST["login"])){  

      
 

        if(!empty($_POST["username"]) && !empty($_POST["password"])){
            
            $username = filter_input(INPUT_POST, "username",
            FILTER_SANITIZE_SPECIAL_CHARS);
            
          
            $password = filter_input(INPUT_POST, "password",
            FILTER_SANITIZE_SPECIAL_CHARS); 
    
            $sql = "SELECT * FROM info WHERE user = '$username'";

            $result = mysqli_query($conn, $sql);

         
        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_assoc($result);

            $realuser= $row["user"] ;
             $realpassword = $row["password"] ;

                $hash = password_hash($realpassword, PASSWORD_DEFAULT);

                if(password_verify($password, $hash)){

                    echo "real you";

                    header("Location: home.php");
            
        
    

                }
                else{
                        echo"Incorrect Password/Username";
                }
                }
 
        }
    }
         
  mysqli_close($conn);
   ?>