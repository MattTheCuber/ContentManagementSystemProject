<?php
   if (session_status() == PHP_SESSION_NONE) session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["loginlevel"]);
   
   echo 'You have logged out';
   header('Location: https://matthewvine.site');
?>