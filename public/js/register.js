function validarNombre(){
    var nombre = document.getElementById("nombre").value;
    console.log(nombre);
    if( !nombre.strim() || nombre == null ){
        alert("Debe ingresar un nombre.");
        return false;
    }


    

}