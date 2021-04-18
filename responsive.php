<!DOCTYPE html>
<html lang="en" ">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="responsive.css">
    <script>
        function move(p)
        {
            p.style.boxShadow="2px 2px 5px red";
            p.style.backgroundColor="slategray";
           
           
        }
        function sub(p)
        {
            p.style.boxShadow="2px 2px 10px green";
            
        }
        
    </script>
</head>
<body style="background-image: linear-gradient(180deg,black,grey) ;height: 900px;">
    <nav>
        <a class="reg" href="responsive.php" >Register</a>
       <a class="pat" href="info.php">patients info</a>
       <a  class="update" href="update.php">update state</a> 
    </nav>
<div class="container">
    <p id="first-1">
     <form action="responsive.php" meathod="POST">
     <P class="form">First name</P><br><input class="inp" type="text" onmouseover="move(this) "class="in" name="fname"> 
     <P class="form">Last name</P><br><input class="inp"  type="text"onmouseover="move(this) " name="lname"> 
     <P class="form">Age</P><br><input class="inp" type="number"onmouseover="move(this) " name="age"> 
     <P class="form">Mobile Number</P><br><input class="inp" type="number" onmouseover="move(this) "name="mobile"><br> 
     <P class="form">area</P><br><input class="inp" type="text" onmouseover="move(this) "name="area"><br>
     <P class="form">state</P><br>
    <input class="radio" type="radio" name="state" value="active"><label  for="active">active</label>
    <input class="radio" type="radio" name="state"value="recovered"><label for="recovered">recovered</label>
    <input class="radio" type="radio" name="state"value="death"><label for="death">death</label>
      <input class="button" type="submit" name=" su"onmouseover="sub(this) ">
     </form>   
    </p>
    
</div>
    
</body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="bank";

if(isset($_REQUEST['su']))
{
$fname=$_REQUEST['fname'];
$lname=$_REQUEST['lname'];
$age=$_REQUEST['age'];
$mobile=$_REQUEST['mobile'];
$area=$_REQUEST['area'];
$state=$_REQUEST['state'];



$conn = new mysqli($servername, $username, $password,$dbname);



$sql="insert into patients values('$fname','$lname','$age','$mobile','$area','$state')";

if($conn->query($sql)===TRUE)
{
	
	echo 'inserted';
	
}
else
{
	echo 'error generated'.$conn->error;
}
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
echo "<h1 class='r'>"."REGISTERED"."</h1>";
$conn->close();


}


?>