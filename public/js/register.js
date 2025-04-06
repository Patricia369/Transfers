function validarNombre(){
    var nombre = document.getElementById("nombre").value;
    let errorNombre = document.getElementById("errorNombre");
    let nombreRegex = /^[a-zA-Z\s]+$/; 
    let nombres = nombre.split(" ");
    let esValido = true;
    if( !nombre.trim()){
        errorNombre.textContent = "Debe ingresar un nombre.";
        esValido = false;
    }
    if(!isNaN(nombre)){
        errorNombre.textContent = "No debe ingresar números en el nombre.";
         esValido = false;
    }
    if ( nombre.length < 3 || nombre.length > 15){
        errorNombre.textContent = "Debe ingresar un nombre entre 3 y 15 caracteres.";
        esValido = false;
    } 
    if(nombres.length>2 ){
        errorNombre.textContent = "El nombre no puede contener más de 2 palabras.";
        console.log(" Se ingresaron más de 2 palabras");
        esValido = false;
    } 
    if(!nombreRegex.test(nombre) || !isNaN(nombre)){
        errorNombre.textContent = "No debe ingresar números en el nombre.";
        console.log(" No debe ingresar números en el nombre");
        esValido = false;
    } 
    if(esValido){
        errorNombre.textContent = ""; 
        console.log("Nombre válido: " + nombre);
        return true; // Nombre válido
     }
}
function validarApellido1(){
    var apellido1 = document.getElementById("apellido1").value;
    let errorApellido1 = document.getElementById("errorApellido1");
    let apellidoRegex = /^[a-zA-Z\s]+$/; 
    let esValido = true;
    errorApellido1.textContent = ""; 
    if( !apellido1.trim()){
        errorApellido1.textContent = "Debe ingresar el primer apellido.";
        console.log(apellido1.trim());
        esValido = false;
    }
    if(!isNaN(apellido1)){
        console.log(apellido1);
        errorApellido1.textContent = "No debe ingresar números en el apellido.";
         esValido = false;
    }
    if ( apellido1.length < 3 || apellido1.length > 15){
        console.log(apellido1);
        errorApellido1.textContent = "Debe ingresar un apellido entre 3 y 15 caracteres.";
        esValido = false;
    } 
    if(!apellidoRegex.test(apellido1) || !isNaN(apellido1)){
        errorApellido1.textContent = "No debe ingresar números en su primer apellido .";
        esValido = false;
    } 
    return esValido;
}
    function validarApellido2(){
        var apellido2 = document.getElementById("apellido2").value;
        let errorApellido2 = document.getElementById("errorApellido2");
        let apellido2Regex = /^[a-zA-Z\s]+$/; 
       let esValido = true;
       errorApellido2.textContent = ""; 
        if( apellido2.trim() === ""){
           alert("Debe ingresar el segundo apellido");
           errorApellido2.textContent = "Debe ingresar el segundo apellido.";
            console.log(apellido2.trim() +" apellido2" + apellido2.length);
            esValido = false;
        }
        if(!isNaN(apellido2)){
            errorApellido2.textContent = "No debe ingresar números en el segundo apellido.";
             esValido = false;
        }
        if ( apellido2.length < 3 || apellido2.length > 15){
            errorApellido2.textContent = "Debe ingresar un apellido entre 3 y 15 caracteres.";
            esValido = false;
        } 
        if(!apellido2Regex.test(apellido2) || !isNaN(apellido2)){
            errorApellido2.textContent = "No debe ingresar números en su segundo apellido .";
            esValido = false;
        } 
        return esValido;
    } 
    function validarDireccion(){
        var direccion = document.getElementById("direccion").value;
        let errorDireccion = document.getElementById("errorDireccion");
        let esValido = true;
        errorDireccion.textContent = ""; 
        if( !direccion.trim()){
            errorDireccion.textContent = "Debe ingresar una dirección válida.";
            esValido = false;
        }
        if ( direccion.length < 5 || direccion.length > 30){
            errorDireccion.textContent = "Debe ingresar una dirección válida.";
            esValido = false;
        } 
       return esValido;
    }
    function validarCodPostal(){
        console.log("validarCodPostal");
        var codPostal = document.getElementById("codPostal").value;
        let errorCodPostal = document.getElementById("errorcodPostal");
        let codPostalRegex = /^[0-9]{5}$/; 
        let esValido = true;
        errorCodPostal.textContent = ""; 
        if( !codPostal.trim()){
            errorCodPostal.textContent = "Debe ingresar un código postal.";
            esValido = false;
        }
        if(!codPostalRegex.test(codPostal)){
            errorCodPostal.textContent = "El código postal debe contener 5 dígitos.";
            esValido = false;
        } 
        return esValido;
    }
    function validarPais(){
        var pais = document.getElementById("pais").value;
        let errorPais = document.getElementById("errorPais");
        let nombrePais = pais.split(" ");
        let paisRegex = /^[a-zA-Z\s]+$/;
        let esValido = true;
        errorPais.textContent = ""; 
        if( !pais.trim()){
            errorPais.textContent = "Debe ingresar un país.";
            esValido = false;
        }
        if( pais.length <5 || pais.length >30 ){
            errorPais.textContent = "Debe ingresar un país entre 5 y 30 caracteres.";
            esValido = false;
        }
        if(!isNaN(pais)){
            errorPais.textContent = "No debe ingresar números en el país.";
            esValido = false;
        }
        if(!paisRegex.test(pais) || !isNaN(pais)){
            errorPais.textContent = "No debe ingresar números en el país.";
            esValido = false;
        }
        if(nombrePais.length >2){
            errorPais.textContent = "El país no puede contener más de 3 palabras.";
            console.log(" Se ingresaron más de 3 palabras");
            esValido = false;
        }
            
    return esValido;
    }
    function validarEmail(){
        var email = document.getElementById("email").value;
        let errorEmail = document.getElementById("errorEmail");
        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        let esValido = true;
        errorEmail.textContent = ""; 
        if( !email.trim()){
            errorEmail.textContent += "Debe ingresar un email.";
            return false;
        }
        if(!emailRegex.test(email)){
            errorEmail.textContent += "El email no es válido.";
            return false;
        }
        if(email.length < 12 || email.length > 20){
            errorEmail.textContent += "Email no válido, máximo 20 carácteres.";
            esValido = false;
        }
         return esValido;

    }
    function validarPassword(){
        var password = document.getElementById("password").value;
        let errorPassword = document.getElementById("errorPassword");
        let passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{5,10}$/; 
        let esValido = true;
        errorPassword.textContent = ""; 
        if( !password.trim()){
            errorPassword.textContent += "Debe ingresar una contraseña.";
            esValido = false;
        }
        if(password.length < 5 || password.length > 10){
            errorPassword.textContent += "La contraseña debe tener entre 5 y 10 caracteres.";
            esValido = false;
        } 
        if(!passwordRegex.test(password)){
            errorPassword.textContent += "La contraseña debe contener al menos una letra mayúscula, una letra minúscula y un número.";
            esValido = false;
        }
        return esValido; 
    }
    
          
