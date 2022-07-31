var abrirpopupReporte = document.getElementById('abrir-popupReporte');
var popupReporte = document.getElementById('popupReporte');
var btnCerrarPopupReporte = document.getElementById('btn-cerrar-popupReporte');
var overlayReporte = document.getElementById('overlayReporte');

abrirpopupReporte.addEventListener('click', function() {
    popupReporte.classList.add('active');
    overlayReporte.classList.add('active'); 
});
btnCerrarPopupReporte.addEventListener('click', function() {
    popupReporte.classList.remove('active');
    overlayReporte.classList.remove('active');
});
