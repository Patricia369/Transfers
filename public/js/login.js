function validarUser(){
    var usuario = document.getElementById('userlogin').value;
    let errorUsuario = document.getElementById('errorUser');
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    console.log("validarUser"+ usuario);
    errorUsuario.textContent = "";
    if(usuario.trim() == ""){
        console.log("El campo usuario no puede estar vacío.");
        errorUsuario.textContent = "Debe ingresar un usuario.";
        return false;
    }
    if(usuario.length < 10 || usuario.length > 20){
        console.log("El usuario debe tener entre 3 y 20 caracteres.");
        errorUsuario.textContent = "Debe ingresar un usuario entre 10 y 20 caracteres.";
        return false;
    }
    if(!emailRegex.test(usuario)){
        console.log("El usuario no es válido.");
        errorUsuario.textContent = "Usuario no válido.";

        return false;
    }
    return true;
    
}
function validarPassword(){
    var password = document.getElementById('passlogin').value;
    let errorPass = document.getElementById('errorPass');
    let passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{5,10}$/; 
    errorPass.textContent = ""; 

        if( !password.trim()){
            console.log("Dentro del primer if");
          errorPass.textContent = ( "Debe introducir una constraseña."); 
            return false;
        }
       if(password.length < 5 || password.length > 10){
            errorPass.textContent = "La contraseña debe tener entre 5 y 10 caracteres.";
            return false;
        } 
        if(!passwordRegex.test(password)){
            errorPass.textContent = "La contraseña debe contener al menos una letra mayúscula, una letra minúscula y un número.";
            return false;
        }  
        return true; 

}
function validarFormLogin(){
    let validarLogin = [ validarPassword(), validarUser()];  
    if(validarLogin.includes(false)){
        return false;
    }  else{return true;}

}   


window.addEventListener("DOMContentLoaded", function(){
    var formulario = document.getElementById("loginForm");
    formulario.addEventListener("submit", function(event){
        if(validarFormLogin() == false){
            //detiene el envio del formulario si falla
            event.preventDefault(); 
            console.log("Formulario no válido.");

        }else{
            console.log("Formulario válido.");
        }
    });

});

