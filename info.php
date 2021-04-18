<!DOCTYPE html>
<html lang="en" style="background-image: url(photo.jpg)">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="responsive.css">
</head>
<body>
    <nav>
         <a class="reg" href="responsive.html">Register</a>
       <a class="pat" href="info.php">patients info</a>
       <a  class="update" href="update.php">update state</a> 
    </nav>
<div class="container">
    <p id="first-1">
     <form action="<?php echo $_SERVER['PHP_SELF'];?>" meathod="POST">
     
     <P class="form">Mobile Number</P><br><input type="number"   name="mobile"><br> 
       
      <input class="button" type="submit"  name="s" >
     </form>   
    </p>
    
</div>
    
</body>
</html>
<link rel="stylesheet" href="responsive.css">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="bank";

if(isset($_REQUEST['s']))
{	
$mobile=$_REQUEST['mobile'];




$conn = new mysqli($servername, $username, $password,$dbname);



$sql="select count(*) from patients where state='active'";
$result = $conn->query($sql);
$row=$result->fetch_assoc();
echo "<h1 class='act'>"."active cases:".$row['count(*)']."</h1>";
$sql="select count(*) from patients where state='recovered'";
$result = $conn->query($sql);
$row=$result->fetch_assoc();
echo "<h1 class='rec'>"."Recovered:".$row['count(*)']."</h1>";
$sql="select count(*) from patients where state='death'";
$result = $conn->query($sql);
$row=$result->fetch_assoc();
echo "<h1 class='death'>"."Deaths:".$row['count(*)']."</h1>";

$sql="select state from patients where mobile='$mobile'";
$result = $conn->query($sql);
$row=$result->fetch_assoc();
echo "<p class='result'>"."State:".$row['state']."</p>";

$conn->close();
}



?>

















