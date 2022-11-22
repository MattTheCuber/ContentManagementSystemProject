<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["loginlevel"]);
   session_destroy();
   
   echo 'You have logged out';
   header('Location: https://matthewvine.site');
?>