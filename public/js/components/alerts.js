function alertSucces(message){
    $('#alerts').append(
        '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
        '<strong>Se agrego el registro correctamente!</strong> '+
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'+ message+'</div>');
        $(window).scrollTop(0);   
}
function alertDanger(message){
    $('#alerts').append(
        '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
        '<strong>No se agrego el registro correctamente!</strong> '+
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'+ message+'</div>');
        $(window).scrollTop(0);   
}