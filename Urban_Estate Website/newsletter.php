<?php
$connection=mysqli_connect("localhost","root","") or die("Couldn't connect to server");

$query="CREATE DATABASE IF NOT EXISTS urbanestate";

$result=mysqli_query($connection , $query) 
or die("Query failed : " . mysql_error ($connection));
   
$db=mysqli_select_db($connection,"urbanestate") 
or die("Couldn't connect to database");

$query = "CREATE TABLE IF NOT EXISTS newsletter(
    email VARCHAR(30) 
    )";

$result=mysqli_query($connection,$query);

if(isset($_POST['subnews']))
{

    $email=$_POST['emailname'];
    $emaildb="";

    $emailquery="SELECT * FROM newsletter WHERE email='$email'";
    $result2=mysqli_query($connection,$emailquery);
    $emailcnt=mysqli_num_rows($result2);

    if($emailcnt>0)
    {
        ?>
           <script>
               alert("Email ID already subscribed");
               window.location.href="index.html";
           </script>
        <?php
    }
    else
    {
        $query= " INSERT INTO newsletter(email) VALUES ('$email') ";
        $result=mysqli_query($connection,$query);

      if($result)
       {
       ?>
       <script>
              alert("Subscribed Succesfully !!!");
              window.location.href="index.html";
       </script>
     <?php
       }
       else
       {
       ?>
       <script>
              alert("Data can not be inserted !!!");              
              window.location.href="index.html";
       </script>
     <?php  
      echo ($emailcnt);
       }
    }
}

?>