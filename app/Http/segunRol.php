<?php

function segunRol($tipo){
    switch ($tipo) {
        case 1:
            return redirect('/');
            break;
        case 3:
            return redirect('/homeAdmin');
            break;
        case 4:
            return redirect('/homeVentas');
            break;
        case 5:
            return redirect('/homeCobranza');
            break;
        case 6:
            return redirect('/homeGVentas');
            break;
        case 7: 
            return redirect('/homeGCobranza');
            break;
        case 8:
            return redirect('/homeRh');
            break;
        case 9:
            return redirect('/homeFinanzas');
            break;
    }
    return false;
}