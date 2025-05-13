<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/register.css">
    <title>Registro Usuario</title>
</head>
<body>
    <form action="/Transfers/app/appController.php?controller=viajero&action=crearViajero" id="formRegister"  method="POST">
        <input type="hidden" name="action" value="crearViajero">   
    <h1>Registro Usuario</h1>
    <label for="nombre">Nombre </label>
    <input type="text" id="nombre" name="nombre" placeholder="Nombre" minlength="3" maxlength="15"  required >
    <span id="errorNombre" class="error"></span>
    <label for="apellido1">Primer Apellido </label>
    <input type="text" id="apellido1" name="apellido1" placeholder="Apellido"  minlength="3" maxlength="15" required>
    <span id="errorApellido1" class="error"></span>
    <label for="apellido2">Segundo Apellido </label>
    <input type="text" id="apellido2" name="apellido2" placeholder="Apellido" minlength="3" maxlength="15" required>
    <span id="errorApellido2" class="error"></span>
    <label for="direccion">Dirección </label>
    <input type="text" id="direccion" name="direccion" placeholder="Domicilio " minlength="5" maxlength="30" required>
    <span id="errorDireccion" class="error"></span>
    <label for="codPostal">Código Postal </label>
    <input type="text" id="codPostal" name="codigoPostal" placeholder="25400 " min="4" max="5" >
    <span id="errorcodPostal" class="error"></span>
    <label for="ciudad">Ciudad</label>
    <input type="text" id="ciudad" name="ciudad" placeholder="  Ciudad" minlength="4" maxlength="18" >
    <span id="errorCiudad" class="error"></span>
    <label for="pais">País</label>
    <input type="text" id="pais" name="pais" placeholder="País" minlength="4" maxlength="15" >
    <span id="errorPais" class="error"></span>
    <label for="email">Email </label>   
    <input type="text" id="email" name="email" placeholder="example@gmail.com" minlength="10" maxlength="20" required>
    <span id="errorEmail" class="error"></span>
    <label for="password">Contraseña </label>
    <input type="text" id="password" name="password" placeholder="Contraseña" min="5" max="10" required>
    <span id="errorPassword" class="error"></span>
    <button type="submit" id="btnRegistrar" >REGISTRAR</button> 
    <button type="reset" id="btnLimpiar">Limpiar</button>
    <a href="login.php"><button type="button" id="btnAlogin" >Login</button></a>    
    <div class="register-link">
        <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
    </form>
    <script src="../../public/js/register.js"></script>
</body>
</html>