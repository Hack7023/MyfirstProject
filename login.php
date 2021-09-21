











<?php
$submission=false;
$error='stat';
$em=null;
$ph=null;
$gn=null;
if(isset($_POST['name'])){
    $server="localhost";
    $username="root";
    $password="";
    $db="myproj";
    $con= mysqli_connect($server,$username,$password,$db);
    if(!$con){
        die("connection to this database filed".mysqli_connect_error());
    }
    $name =$_POST['name'];
    $usn =$_POST['usn'];
    

    $sql="SELECT  gender , phone , email  FROM myproj WHERE usn='$usn';";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        //$row = $result->fetch_assoc() ;
        //   
        echo  " <script > 
                alert('login succesfull'); 
                window.location.href = 'afterlogin.php';
                </script>;";
          $submission=true;
      } else {
         $error='0';
      }
    // if($con->query($sql)==true){
    //    
    // }
    // else 
    // {
    //     $error=$con->error;
    // }
    $con->close();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>login</title>
</head>
<body>
    <div class='container'>
        <h1>welcome</h1>
        <p>enter your details</p>
       <?php
            if($submission ==true){
                echo "<p class='submitmsg'>login successfull</p>";
                
                
                
            }
            if($error=='0'){
                

                    //echo "<script <a href='index.php'/>alert('USN not registered')</script>";
                  echo  " <script > 
                    alert('ENTERED USN IS NOT REGISTERED'); 
                    window.location.href = 'index.php';
                    </script>;";
                
                //echo "<a '>ok</a>";
            }
            
       ?>
        <form action="login.php" method="post" >
            <input type="text" name="name" id="name" placeholder="enter your name">
            <input type="text" name="usn" id="usn" placeholder="enter your usn">
           
            <button class="btn">submit</button>
        

        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>