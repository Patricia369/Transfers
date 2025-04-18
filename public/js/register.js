
function validarNombre(){
    var nombre = document.getElementById("nombre").value;
    let errorNombre = document.getElementById("errorNombre");
    let nombreRegex = /^[a-zA-Z\s]+$/; 
    let nombres = nombre.split(" ");
    errorNombre.textContent = "";
    if( !nombre.trim()){
       errorNombre.textContent = "Debe ingresar un nombre.";
        return false;
    }
    if ( nombre.length < 3 || nombre.length > 15 && nombre.trim()){
        errorNombre.textContent = ("Debe ingresar un nombre entre 3 y 15 caracteres.");
        return false;
    } 
    if(nombres.length>2 ){
        errorNombre.textContent = ("El nombre no puede contener más de 2 palabras.");
        return false;
    } 
    if(!nombreRegex.test(nombre) || !isNaN(nombre)){
        errorNombre.textContent = ("No debe ingresar números en el nombre.");
        console.log(" No debe ingresar números en el nombre");
        return false;
    } 
    return true; 
}
function validarApellido1(){
    var apellido1 = document.getElementById("apellido1").value;
    let errorApellido1 = document.getElementById("errorApellido1");
    let apellidoRegex = /^[a-zA-Z\s]+$/; 
    errorApellido1.textContent = ""; 
    if( !apellido1.trim()){
        errorApellido1.textContent = "Debe ingresar el primer apellido.";
        console.log(apellido1.trim());
        return false;
    }
    if ( apellido1.length < 3 || apellido1.length > 15){
        errorApellido1.textContent = "Debe ingresar un apellido entre 3 y 15 caracteres.";
        return false;
    } 
    if(!apellidoRegex.test(apellido1) || !isNaN(apellido1)){
        errorApellido1.textContent = "No debe ingresar números, ni tildes en su primer apellido .";
        return false;
    } 
    return true;
}
    function validarApellido2(){
        var apellido2 = document.getElementById("apellido2").value;
        let errorApellido2 = document.getElementById("errorApellido2");
        let apellido2Regex = /^[a-zA-Z\s]+$/; 
       errorApellido2.textContent = ""; 
        if( apellido2.trim() === ""){
           errorApellido2.textContent = "Debe ingresar el segundo apellido.";
            return false;
        }
        if(!isNaN(apellido2)){
            errorApellido2.textContent = "No debe ingresar números, ni tildes en el segundo apellido.";
             return false;
        }
        if ( apellido2.length < 3 || apellido2.length > 15){
            errorApellido2.textContent = "Debe ingresar un apellido entre 3 y 15 caracteres.";
            return false;
        } 
        if(!apellido2Regex.test(apellido2) || !isNaN(apellido2)){
            errorApellido2.textContent = "No debe ingresar números en su segundo apellido .";
            return false;
        } 
        return true;
    } 
    function validarDireccion(){
        var direccion = document.getElementById("direccion").value;
        let errorDireccion = document.getElementById("errorDireccion");
        
        errorDireccion.textContent = ""; 
        if( !direccion.trim()){
            errorDireccion.textContent = "Debe ingresar una dirección válida.";
           return false;
        }
        if ( direccion.length < 5 || direccion.length > 30){
            errorDireccion.textContent = "Debe ingresar una dirección válida.";
            return false;
        } 
       return true;
    }
    function validarCodPostal(){
        console.log("validarCodPostal");
        var codPostal = document.getElementById("codPostal").value;
        let errorCodPostal = document.getElementById("errorcodPostal");
        let codPostalRegex = /^[0-9]{5}$/; 
        errorCodPostal.textContent = ""; 
        if( !codPostal.trim()){
            errorCodPostal.textContent = "Debe ingresar un código postal.";
            return false;
        }
        if(!codPostalRegex.test(codPostal)){
            errorCodPostal.textContent = "El código postal debe contener 5 dígitos.";
            return false;
        } 
        return true;
    }
    function validarCiudad(){
        var ciudad = document.getElementById("ciudad").value;
        let errorCiudad = document.getElementById("errorCiudad");
        let ciudadRegex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ]+(?:\s[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ]+){0,3}$/;; 
        console.log("validarCiudad"+ ciudad);
        errorCiudad.textContent = ""; 
        if(!ciudad.trim()){
            errorCiudad.textContent = "Debe ingresar una ciudad.";
            return false;
        }
        if ( ciudad.length < 4 || ciudad.length > 15){
            errorCiudad.textContent = "Debe ingresar una ciudad entre 3 y 18 caracteres.";
            return false;
        }
        if(!ciudadRegex.test(ciudad) || !isNaN(ciudad)){
            errorCiudad.textContent = "No debe ingresar números en la ciudad. Debe ingresar una ciudad válida.";
            return false;
        }

    }
    function validarPais(){
        var pais = document.getElementById("pais").value;
        let errorPais = document.getElementById("errorPais");
        let nombrePais = pais.split(" ");
        let paisRegex = /^[a-zA-Z\s]+$/;
        
        errorPais.textContent = ""; 
        if( !pais.trim()){
            errorPais.textContent = "Debe ingresar un país.";
            return false;
        }
        if( pais.length <5 || pais.length >30 ){
            errorPais.textContent = "Debe ingresar un país entre 5 y 30 caracteres.";
            return false;
        }
        if(!isNaN(pais)){
            errorPais.textContent = "No debe ingresar números en el país.";
            return false;
        }
        if(!paisRegex.test(pais) || !isNaN(pais)){
            errorPais.textContent = "No debe ingresar números en el país.";
            return false;
        }
        if(nombrePais.length >2){
            errorPais.textContent = "El país no puede contener más de 3 palabras.";
            return false;
        }
            
    return true;
    }
    function validarEmail(){
        var email = document.getElementById("email").value;
        let errorEmail = document.getElementById("errorEmail");
        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        errorEmail.textContent = ""; 
        if( !email.trim()){
            errorEmail.textContent = "Debe ingresar un email.";
            return false;
        }
        if(!emailRegex.test(email)){
            errorEmail.textContent = "El email no es válido.";
            return false;
        }
        if(email.length < 12 || email.length > 20){
            errorEmail.textContent = "Email no válido, máximo 20 carácteres.";
            return false;
        }
         return true;

    }
    function validarPassword(){
        var password = document.getElementById("password").value;
        let errorPassword = document.getElementById("errorPassword");
        let passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{5,10}$/; 
        
        errorPassword.textContent = ""; 
        if( !password.trim()){
            console.log("Dentro del primer if");
          errorPassword.textContent = ( "Debe ingresar una contraseña."); 
            return false;
        }
       if(password.length < 5 || password.length > 10){
            errorPassword.textContent = "La contraseña debe tener entre 5 y 10 caracteres.";
            return false;
        } 
        if(!passwordRegex.test(password)){
            
            errorPassword.textContent = "La contraseña debe contener al menos una letra mayúscula, una letra minúscula y un número.";
            return false;
        }  
        return true; 
    }
    function validarFormulario(){
        let validacionCampos = [validarNombre(), validarApellido1(), validarApellido2(), validarDireccion(),
                 validarCodPostal(), validarCiudad(), validarPais(), validarEmail(), validarPassword()];  
        if(validacionCampos.includes(false)){
            return false;
        }  else{return true;}

    }   
    window.addEventListener("DOMContentLoaded", function(){
        var formulario = document.getElementById("formRegister");
        formulario.addEventListener("submit", function(event){
            if(validarFormulario() == false){
                //detiene el envio del formulario si falla
                event.preventDefault(); 
                console.log("Formulario no válido.");

            }else{
                console.log("Formulario válido.");
            }
        });

    });
    
          
