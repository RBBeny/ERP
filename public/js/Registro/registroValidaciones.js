const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
const selects = document.querySelectorAll('#formulario select');

const expresiones = {
    nombreUsuario: /^[a-zA-ZÀ-ÿ\s]{3,30}$/,
    apellidoPaternoUsuario: /^[a-zA-ZÀ-ÿ\s]{3,30}$/,
    apellidoMaternoUsuario: /^[a-zA-ZÀ-ÿ\s]{3,30}$/,
    nomUsuario: /^[a-zA-Z0-9\_\-]{4,15}$/,
    cveTipoUsuario: /^[0-9]{1,10}$/,
    password: /^.{4,16}$/,
    cveEstatus: /^[0-9]{1,10}$/,
}

const campos = {
    nombreUsuario: false,
    apellidoPaternoUsuario: false,
    apellidoMaternoUsuario: false,
    nomUsuario: false,
    cveTipoUsuario: true,
    password: false,
    cveEstatus: true
}

const validarFormulario = (e) => {
    switch (e.target.name) {
        case "nombreUsuario":
            validarCampo(expresiones.nombreUsuario, e.target, 'nombreUsuario');
            break;
        case "apellidoPaternoUsuario":
            validarCampo(expresiones.apellidoPaternoUsuario, e.target, 'apellidoPaternoUsuario');
            break;
        case "apellidoMaternoUsuario":
            validarCampo(expresiones.apellidoMaternoUsuario, e.target, 'apellidoMaternoUsuario');
            break;
        case "nomUsuario":
            validarCampo(expresiones.nomUsuario, e.target, 'nomUsuario');
            break;
        case "cveTipoUsuario":
            validarCampo(expresiones.cveTipoUsuario, e.target, 'cveTipoUsuario');
            break;
        case "password":
            validarCampo(expresiones.password, e.target, 'password');
            break;
        case "cveEstatus":
            validarCampo(expresiones.cveEstatus, e.target, 'cveEstatus');
            break;
    }
}

const validarCampo = (expresion, input, campo) => {
    if (expresion.test(input.value)) {
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        campos[campo] = true;
    } else {
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos[campo] = false;
    }
}



inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
    e.preventDefault();
    if (campos.nombreUsuario && campos.apellidoPaternoUsuario && campos.apellidoMaternoUsuario && campos.nomUsuario
        && campos.cveTipoUsuario && campos.password && campos.cveEstatus) {
        
        var nombreUsuario = document.getElementById('nombreUsuario').value;
        var apellidoPaternoUsuario = document.getElementById('apellidoPaternoUsuario').value;
        var apellidoMaternoUsuario = document.getElementById('apellidoMaternoUsuario').value;
        var nomUsuario = document.getElementById('nomUsuario').value;
        var cveTipoUsuario = document.getElementById('cveTipoUsuario').value;
        var password = document.getElementById('password').value;
        var cveEstatus = document.getElementById('cveEstatus').value;
    
        var _token = $("input[name=_token]").val();
       
        console.log("noSolicitud: " + nombreUsuario);

        formulario.reset();
        $.ajax(
            {
                url: '/registrarUsuarios', type: "POST",
                data: {
                    nombreUsuario: nombreUsuario,
                    apellidoPaternoUsuario: apellidoPaternoUsuario,
                    apellidoMaternoUsuario: apellidoMaternoUsuario,
                    nomUsuario: nomUsuario,
                    cveTipoUsuario: cveTipoUsuario,
                    password: password,
                    cveEstatus: cveEstatus,
                    _token: _token
                },
                success: function (res) {
                    console.log('Se ha creado un registro correctamente');

                    alert("Se Agrego el usuario con exito");

                    document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
                        icono.classList.remove('formulario__grupo-correcto');
                    });
                    location.reload();
                },
                error: function (res) {
                    alert("No se pudo agregar el usuario");
                    console.log("No se ha hecho el registro");
                }

            });




    } else {
        document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
    }

});