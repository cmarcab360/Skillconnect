window.onload = iniciar;

function iniciar() {
    const modal = document.getElementById("modal");
    document.getElementById("btnOpen").addEventListener("click", abrir);// Mostrar el modal al hacer clic en el botón
    document.getElementById("cerrar").addEventListener("click", cerrar);// Cerrar el modal al hacer clic en el botón de cerrar

}

function abrir() {
    modal.showModal();
}

function cerrar() {
    modal.close();
}
