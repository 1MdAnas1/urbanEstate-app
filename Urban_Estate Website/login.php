<?php
$username=$_POST['username'];
$password=$_POST['passname'];
$passDB="";
$connection=mysqli_connect("localhost","root","","urbanestate") or die("Couldn't connect to server");
$query="SELECT passwords FROM details WHERE username='$username'";

$result=mysqli_query($connection , $query) 
or die("Query failed : " . mysqli_error ($connection));
   
while($row=mysqli_fetch_assoc($result)){
    $passDB=$row['passwords'];
}
if(isset($_POST['subname']))
{
if($passDB == $password ){
    // login success
    ?>    
    <?php
    session_start();
    $_SESSION['username']=$username;

    $_SESSION['loggedin']=true;
    
    header('Location:secret.php');
}
else
{
    ?>
    <script>
         alert("Invalid Credentials. Please retry !");
         window.location.href="login.html";
    </script>     
    <?php
    
}
}
?>