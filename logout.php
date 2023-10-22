<?php
SESSION_START();
unset($_SESSION['account']);
header("Location: login.php");
?>