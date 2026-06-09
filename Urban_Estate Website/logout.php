<?php

session_start();
$_SESSION=array();

session_destroy();

?>
<script>
    alert("Logged Out Successfully");
    window.location.href="login.html";
</script>
<?php

?>