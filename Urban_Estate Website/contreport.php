<?php
session_start();

$connection=mysqli_connect("localhost","root","") or die("Couldn't connect to server");
$query="CREATE DATABASE IF NOT EXISTS urbanestate";

$result=mysqli_query($connection , $query) 
or die("Query failed : " . mysql_error ($connection));
   
$db=mysqli_select_db($connection,"urbanestate") 
or die("Couldn't connect to database");

$query = "CREATE TABLE IF NOT EXISTS contactus(
      name VARCHAR (30) ,
      email VARCHAR(50) ,
      subject VARCHAR(50) ,
      message VARCHAR(300)
      )";

$result=mysqli_query($connection,$query);

if(isset($_POST['subname']))
{
  $name=$_POST['suser'];
  $email=$_POST['smail'];
  $subject=$_POST['ssubject'];
  $message=$_POST['smessage'];

  $query= " INSERT INTO contactus(name,email,subject,message) VALUES ('$name','$email','$subject','$message') ";
$result=mysqli_query($connection,$query);

if($result)
{
       ?>
       <script>
              alert("Message Submitted Successfully !");
              window.location.href="contactus.html";
       </script>
     <?php
}
else
{
       ?>
       <script>
              alert("Data can not be inserted !!!");
              window.location.href="contactus.html";
       </script>
     <?php  
      
}

}
   
?>


  