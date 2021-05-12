<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" .   mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Colleect post variable
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;


    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully Inserted";

        // Flag foe successfull insertion
        $insert = true;
    }
    else {
        echo "ERROR: $sql <br> $con->error";
    }
    // Close thedatabase connecton
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To GLA University Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="GLA University">
    <div class="container">
        <h1>Welcome to GLA University US trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in trip.</p>
        <?php
        if($insert == true){
        echo "<p class='submitmsg'>Thanks for submitting this form. We are happy to see you joiningfor the US trip.</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
           <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
           <button class="btn">Submit</button>
           <!-- <button class="btn">Reset</button> -->
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>