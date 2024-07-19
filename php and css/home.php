<?php
     session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
    <form action="home.php" method="post"><br>
       <center> <input type="submit" name="logout" value= "logout"><center><br><br>
    </form>
</body>
</html>


<?php
   

 
   


   
   
   if(isset($_POST["logout"])){

    session_destroy();
    header("Location: index.php");
   }
?>