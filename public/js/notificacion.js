function fn_notificacion(iTipo, sMensaje, iTiempo) {

    //INICIO TRY
    try {
        // VALOR POR DEFAULT, 10 SEG.
        iTiempo = iTiempo != undefined && iTiempo != null && iTiempo != 0 ? iTiempo : 10;
        // MENSAJE EN NEGRITAS
        sMensaje = "<b>" + sMensaje + "</b>";
        // TIEMPO DEFAULT
        var delay = alertify.get('notifier', 'delay');
        // MODIFICA EL VALOR DE TIEMPO QUE TIENE, AL TIEMPO QUE SE ESTABLECE EN iTiempo
        alertify.set('notifier', 'delay', iTiempo);
        // SE VERIFICA EL TIPO DE ALERTA
        switch (iTipo) {
            case 1:
                alertify.success(sMensaje);
                break;
            case 2:
                alertify.warning(sMensaje);
                break;
            case 3:
                alertify.error(sMensaje);
                break;
            default:
                alertify.error(sMensaje);
                break;
        }
        // RESTAURA EL VALOR DE TIEMPO POR DEFAULT
        alertify.set('notifier', 'delay', delay);
    }
    //FIN TRY
    //INICIO CATCH
    catch (obj_ex) {
        //SE PINTA ERROR
        console.log(obj_ex.message);
    }
    //FIN CATCH
}

function block() {
    $.blockUI({
        message: "<img src='https://belladoris.files.wordpress.com/2013/06/palomadoris.gif' alt='Cargando' width='100' height='100' /><br/>Cargando, por favor espere.",
        css: {
            border: 'none',
            padding: '35px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
        }
    });
}

function unBlock() {
    $.unblockUI();
}
