<?php

$insert = false;
if (isset($_POST['name'])) {
    // Set connection variables 
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection 
    $con = mysqli_connect($server, $username, $password);

    // Check for connection sucess
    if (!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Sucessfully connected to the DB";

    // Collect post variable 
    $name = $_POST['name'];
    $class = $_POST['class'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $descr = $_POST['descr'];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `class`, `gender`, `email`, `phone`, `descr`, `date`) 
    VALUES ( '$name', '$class', '$gender', '$email', '$phone', '$descr' , current_timestamp());";
    // echo $sql;

    // Execute the query  
    if($con->query($sql) == true){
        // echo " Sucessfully inserted";

        // Flag for successful insertion 
        $insert = true;
    }
    else {
        echo "ERROR: $sql <br> $con->error";
  
  }
//   Close the database Connection 
  $con->close();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel form</title>
    <link rel="stylesheet" href="style.css">
    <script src="index.js"></script>
</head>
<body>
    <img src="./img/tr.jpg" alt="GPERI" class="tr">
    <div class="container">
        <h1>Welcome to GPERI Kerala Trip</h1>
        <p>Enter below details to confirm your paricipation in the trip to us</p>
      <?php    
        if($insert == true){
        echo "<p class= 'submitMsg'>Thank you for joining Kerala trip with us</p>";
      }
      else {
          echo"form not submitted" ;

      }
      ?>
  
    <form action="index.php" method="POST">
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <input type="text" name= "class" id="class" placeholder="Enter your class">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender">
        <input type="email" name="email" id="email" placeholder="Enter your Email">
        <input type="phone" name="phone" id="phone" placeholder="Enter your contact numnber">
        <textarea name="descr" id="descr" cols="30" rows="10" placeholder="Enter any other information"></textarea>
        <button type="submit" class="btn">Submit</button>
        <button type="reset" class="btn ">Reset</button>        
    </form>
</div>
</body>
</html>