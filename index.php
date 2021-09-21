




<?php
$submission=false;
$error='stat';
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
    $gender =$_POST['gender'];
    $phone =$_POST['phone'];
    $email =$_POST['email'];
    $other =$_POST['other'];

    $sql="INSERT INTO  `myproj` ( `name`, `usn`, `gender`, `phone`, `email`, `other`, `date`) VALUES ('$name', '$usn', '$gender', '$phone', '$email', '$other', current_timestamp());";


    if($con->query($sql)==true){
       $submission=true;
    }
    else 
    {
        $error=$con->error;
    }
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

    <title>Document</title>
</head>
<body>
    <div class='container'>
        <h1>welcome</h1>
        <p>enter your details</p>
       <?php
            if($submission ==true){
                echo "<p class='submitmsg'>FORM SUBMITTED</p>";
            }
            if($error!='stat'){
                echo "<p class='submitmsgerror'>$error</p>";
            }
            
       ?>
        <form action="index.php" method="post" >
            <input type="text" name="name" id="name" placeholder="enter your name">
            <input type="text" name="usn" id="usn" placeholder="enter your usn">
            <input type="text" name="gender" id="gender" placeholder="enter your gender">
            <input type="phone" name="phone" id="phone" placeholder="enter your phone">
            <input type="email" name="email" id="email" placeholder="enter your email">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="enter any info">
            </textarea>
            <button class="btn">submit</button>
        

        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>