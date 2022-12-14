<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["loginlevel"]);

   header('Location: https://matthewvine.site');
?>