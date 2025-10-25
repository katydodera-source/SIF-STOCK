<?php
session_start();
require 'config/database.php';
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Contraseña incorrecta";
        }
    } else {
        $error = "Usuario no encontrado";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - S.I.F-STOCK</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>Login</h2>
<?php if(isset($error)) echo "<p>$error</p>"; ?>
<form method="post">
    <input type="email" name="email" placeholder="Correo" required><br>
    <input type="password" name="password" placeholder="Contraseña" required><br>
    <button type="submit" name="login">Entrar</button>
</form>
<p>¿No tienes cuenta? <a href="register.php">Regístrate</a></p>
</body>
</html>