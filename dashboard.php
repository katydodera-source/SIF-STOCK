<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - S.I.F-STOCK</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>Bienvenido al Dashboard</h2>
<p><a href="logout.php">Cerrar sesión</a></p>
</body>
</html>