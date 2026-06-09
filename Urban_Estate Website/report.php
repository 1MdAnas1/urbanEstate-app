<?php
session_start();

$connection=mysqli_connect("localhost","root","") or die("Couldn't connect to server");
$query="CREATE DATABASE IF NOT EXISTS urbanestate";

$result=mysqli_query($connection , $query) 
or die("Query failed : " . mysql_error ($connection));
   
$db=mysqli_select_db($connection,"urbanestate") 
or die("Couldn't connect to database");

$query = "CREATE TABLE IF NOT EXISTS details(
      username VARCHAR (30) ,
      passwords VARCHAR(255) ,
      email VARCHAR(20) ,
      phone BIGINT(50)
      )";

$result=mysqli_query($connection,$query);

if(isset($_POST['subname']))
{
  $username=$_POST['suser'];
  $password=$_POST['spass'];
  $email=$_POST['smail'];
  $phone=$_POST['sphone'];

$userDB="";
$emailDB="";

$userquery="SELECT username FROM details WHERE username='$username'";
$result1=mysqli_query($connection,$userquery);
$usercnt=mysqli_num_rows($result1);

$emailquery="SELECT * FROM details WHERE email='$email'";
$result2=mysqli_query($connection,$emailquery);
$emailcnt=mysqli_num_rows($result2);

$phonequery="SELECT phone FROM details WHERE phone='$phone'";
$result3=mysqli_query($connection,$phonequery);
$phonecnt=mysqli_num_rows($result3);
  
if($emailcnt>0)
{  
  ?>
  <script>
        alert("Email ID Already registered !");                  
        window.location.href="signup.html";
 </script>           
   <?php
   

 }
else if($usercnt>0)
{
  ?>
  <script>
        alert("Username Already taken !");                  
        window.location.href="signup.html";
 </script>           
   <?php
}
else if($phonecnt>0)
{
  ?>
  <script>
        alert("Phone Number Already registered !");                  
        window.location.href="signup.html";
 </script>           
   <?php
}
else
{
$query= " INSERT INTO details(username,passwords,email,phone) VALUES ('$username','$password','$email','$phone') ";
$result=mysqli_query($connection,$query);
 
if($result)
{
       ?>
       <script>
              alert("Account Created Successfully !. Please Log in to continue.");
              window.location.href="login.html";
       </script>
     <?php
}
else
{
       ?>
       <script>
              alert("Data can not be inserted !!!");
              window.location.href="signup.html";
       </script>
     <?php  
      echo ($emailcnt);
}
}

}
   
?>


  