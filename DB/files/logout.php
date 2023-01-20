<?php
session_start();
session_destroy();
echo "Logout erfolgreich";
header('refresh: 3; url =../../index.php');
?>