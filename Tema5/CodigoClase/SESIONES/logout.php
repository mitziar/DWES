<?php
session_start();//para que coga session id de mi cookie
session_destroy();
header("Location: ./login.php");
exit();
?>