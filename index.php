<?php
$name = $gender = $age = $address = $phone ="";
$nameerr = $gendererr = $ageerr = $addresserr = $phoneerr ="";
$insert = false;

$server ="localhost";
$username ="root";
$password = "";
$con=mysqli_connect($server,$username,$password);
if(!$con){
    die("connection to this database failed due to".mysqli_connect_error());
}
//echo"success connection to the database";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameerr = "Name is required";
    } else {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["gender"])) {
              $gendererr = "Gender is required";
            } else {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (empty($_POST["age"])) {
                      $ageerr = "Age is required";
                    } else {
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (empty($_POST["address"])) {
                              $addresserr = "Address is required";
                            } else {
                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    if (empty($_POST["phone"])) {
                                      $phoneerr = "Phone is required";
                                    } else {
                                        $name = test_input($_POST["name"]);
                                        $gender = test_input($_POST["gender"]);
                                        $age = test_input($_POST["age"]);
                                        $address= test_input($_POST["address"]);
                                      $phone = test_input($_POST["phone"]);

                                      


                                      $sql="INSERT INTO `sport`.`sport` (`name`, `gender`, `age`, `address`, `phone`, `date`) VALUES ('$name', '$gender', '$age', '$address', '$phone', current_timestamp());";

                                                       
                


                                      if($con->query($sql)==true){
                                        //echo "Successfully inserted";
                                        $insert = true;
                                    }
                                    else{
                                        echo"ERROR: $sql<br>$con->error";
                                        $insert = false;
                                    }
                                    $con->close();


                   
                                    }
                                }
                
                              
                            }
                        }
                      
                    }
                }
              
            }
        }
      
    }
}

   
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

            


                


//$sql="INSERT INTO `sport`.`sport` (`name`, `gender`, `age`, `address`, `phone`, `date`) VALUES ('$name', '$gender', '$age', '$address', '$phone', current_timestamp());";
//echo $sql;


//if($con->query($sql)==true){
    //echo "Successfully inserted";
  //  $insert = true;
//}
//else{
  //  echo"ERROR: $sql<br>$con->error";
    //$insert = false;
//}
//$con->close();

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Try to make form</title>
    <link rel="stylesheet" href="kl.css">
</head>
<body>
    <div id="container">
        <h1>Welcome To Sport Club Niraj Singh</h1>    
        <?php
        if($insert == true){
            echo "<p class='sub'>Form submitted Successfully</P>";
        }
        if($insert == false){
        echo "<p>Enter the details and submit to participate in toure</p>";}
        ?>   
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your full name">
            <span class="error">* <?php echo $nameerr;?></span><br>
            <input type="text" name="gender" id="gender" placeholder="Gender">
            <span class="error">* <?php echo $gendererr;?></span><br>
            <input type="number" name="age" id="age" placeholder="Age">
            <span class="error">* <?php echo $ageerr;?></span><br>
            <input type="text" name="address" id="address" placeholder="Address">
            <span class="error">* <?php echo $addresserr;?></span><br>
            <input type="text" name="phone" id="phone" placeholder="Contact number">
            <span class="error">* <?php echo $phoneerr;?></span><br>
            <button id="submit">Submit</button>

        </form>
        
    </div>
    <script src="index.js"></script>
</body>
</html>