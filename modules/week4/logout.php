<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["authenticated"]);
   session_destroy();
   
   echo 'You have logged out';
   header('Location: sessions.php');
?>