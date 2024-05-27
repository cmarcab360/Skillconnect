let mensaje = document.getElementById("success");

//Si existe el elemento con id success, se ejecuta el setTimeout
if(mensaje != null){
    setTimeout(() => {
        if (mensaje.style.display === "none") {
            mensaje.style.display = "block";
        } else {
            mensaje.style.display = "none";
        }
    }, 3000);
}

