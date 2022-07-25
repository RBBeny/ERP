

//Variables para el formulario por partes
var cnp1 = document.getElementById("cnp1");
var cnp2 = document.getElementById("cnp2");
var cnp3 = document.getElementById("cnp3");
var cnp4 = document.getElementById("cnp4");
var siguienteP2 = document.getElementById("siguienteP2");
var siguienteP3 = document.getElementById("siguienteP3");
var siguienteP4 = document.getElementById("siguienteP4");
var atrasP1 = document.getElementById("atrasP1");
var atrasP2 = document.getElementById("atrasP2");
var atrasP3 = document.getElementById("atrasP3");
var progress = document.getElementById("progress");
//Variables para popup's
/* 
var abrirpopupEstado = document.getElementById('abrir-popupEstado');
var popupEstado = document.getElementById('popupEstado');
var btnCerrarPopupEstado = document.getElementById('btn-cerrar-popup');
var overlayEstado = document.getElementById('overlayEstado');
*/
var abrirpopupMunicipio = document.getElementById('abrir-popupMunicipio');
var popupMunicipio = document.getElementById('popupMunicipio');
var btnCerrarPopupMunicipio = document.getElementById('btn-cerrar-popupMunicipio');
var overlayMunicipio = document.getElementById('overlayMunicipio');

var abrirpopupColonia = document.getElementById('abrir-popupColonia');
var popupColonia = document.getElementById('popupColonia');
var btnCerrarPopupColonia = document.getElementById('btn-cerrar-popupColonia');
var overlayColonia = document.getElementById('overlayColonia');





//Funcion para desplegar los contenedores de clienteCobro
function showContent() {
    element = document.getElementById("clienteCobro");
    check = document.getElementById("check");
    if (check.checked) {
        element.style.display = 'block';
    } else {
        element.style.display = 'none';
    }
}

//Funciones para el formulario por partes
siguienteP2.onclick = function() {
    cnp1.style.display = "none";
    cnp2.style.display = "block";
    progress.style.width = "240px";
}
siguienteP3.onclick = function() {
    cnp2.style.display = "none";
    cnp3.style.display = "block";
    progress.style.width = "360px";
}
siguienteP4.onclick = function() {
    cnp3.style.display = "none";
    cnp4.style.display = "block";
    progress.style.width = "100%";
}
atrasP1.onclick = function() {
    cnp1.style.display = "block";
    cnp2.style.display = "none";
    progress.style.width = "120px";
}
atrasP2.onclick = function() {
    cnp2.style.display = "block";
    cnp3.style.display = "none";
    progress.style.width = "240px";
}
atrasP3.onclick = function() {
    cnp3.style.display = "block";
    cnp4.style.display = "none";
    progress.style.width = "360px";
}

//Funciones para los popup's
/*
abrirpopupEstado.addEventListener('click', function() {
    popupEstado.classList.add('active');
    overlayEstado.classList.add('active'); 
});
btnCerrarPopupEstado.addEventListener('click', function () {
        popupEstado.classList.remove('active');
        overlayEstado.classList.remove('active');
    });
*/
abrirpopupMunicipio.addEventListener('click', function() {
    popupMunicipio.classList.add('active');
    overlayMunicipio.classList.add('active'); 
});
btnCerrarPopupMunicipio.addEventListener('click', function() {
    popupMunicipio.classList.remove('active');
    overlayMunicipio.classList.remove('active');
});

abrirpopupColonia.addEventListener('click', function() {
    popupColonia.classList.add('active');
    overlayColonia.classList.add('active'); 
});
btnCerrarPopupColonia.addEventListener('click', function() {
    popupColonia.classList.remove('active');
    overlayColonia.classList.remove('active');
});




