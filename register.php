<?php
require 'config/database.php';
if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (name,email,password) VALUES (?,?,?)");
    $stmt->bind_param("sss",$name,$email,$password);
    if($stmt->execute()){
        header("Location: login.php");
        exit;
    } else {
        $error = "Error al registrar usuario";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registro - S.I.F-STOCK</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>Registro</h2>
<?php if(isset($error)) echo "<p>$error</p>"; ?>
<form method="post">
    <input type="text" name="name" placeholder="Nombre" required><br>
    <input type="email" name="email" placeholder="Correo" required><br>
    <input type="password" name="password" placeholder="Contraseña" required><br>
    <button type="submit" name="register">Registrarse</button>
</form>
<p>¿Ya tienes cuenta? <a href="login.php">Login</a></p>
</body>
</html>