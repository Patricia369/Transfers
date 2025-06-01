<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Transfers/public/css/login.css">
    <title>login Usuario</title>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Bienvenido Transfers</h1>
            <p>Inicia sesión en tu cuenta</p>
        </div>
        <form action="/Transfers/app/appController.php?controller=viajero&action=loginViajero" method="POST" id="loginForm">
        <input type="hidden" name="action" value="loginViajero">    
        
         <!-- Mostrar el mensaje de error dentro del formulario -->
         <?php if (isset($_SESSION['error'])): ?>
                <div class="error-message">
                    <p class="error"><?php echo $_SESSION['error']; ?></p>
                </div>
                <?php unset($_SESSION['error']); // Limpiar el mensaje después de mostrarlo ?>
            <?php endif; ?>
        <div class="input-group">
                <label for="userlogin">Ingresa tu usuario</label>
                <input type="text" id="userlogin" name="email" placeholder="example@gmail.com" minlength="10" maxlength="20" required>
                <span id="errorUser" class="error"></span>
            </div>
            <div class="input-group">
                <label for="passlogin">Contraseña</label>
                <input type="password" id="passlogin" name="password" placeholder="Contraseña" minlength="5" maxlength="10" required>
                <span id="errorPass" class="error"></span>
            </div>
            <button type="submit" class="login-btn" >Iniciar sesión</button>
            
            <div class="register-link">
                <p>¿No tienes cuenta? <a href="/Transfers/app/views/register.php">Regístrate</a></p>
            </div>
        </form>
    </div>
    <script src="../../public/js/login.js"></script>

</body>
</html>