function habilitarBoton(){
    ag_1 = document.getElementById("ag_1").value;
    ag_2 = document.getElementById("ag_2").value;
    ag_3 = document.getElementById("ag_3").value;
    ag_4 = document.getElementById("ag_4").value;
    ag_5 = document.getElementById("ag_5").value;
    ag_6 = document.getElementById("ag_6").value;
    ag_7 = document.getElementById("ag_7").value;
    val=0;
    if(ag_1==""){

    }
    if(ag_2==""){
        val++;
    }
    if(ag_3==""){
        val++;
    }
    if(ag_4==""){
        val++;
    }
    if(ag_5>""){
        val++;
    }
    if(ag_6==""){
        val++;
    }
    if(ag_7==""){
        val++;
    }
    if (val==0){
        document.getElementById("btn").disabled = false;
    }else{
        document.getElementById("btn").disabled = true;
    }
}

document.getElementById("ag_1").addEventListener("keyup",habilitarBoton);
document.getElementById("ag_2").addEventListener("keyup",habilitarBoton);
document.getElementById("ag_3").addEventListener("keyup",habilitarBoton);
document.getElementById("ag_4").addEventListener("keyup",habilitarBoton);
document.getElementById("ag_5").addEventListener("keyup",habilitarBoton);
document.getElementById("ag_6").addEventListener("keyup",habilitarBoton);
document.getElementById("ag_7").addEventListener("keyup",habilitarBoton);

function eliminar() {
    let text;
    if (confirm("Seguro que quiere eliminar al usuario") == true) {
      alert("Se elimino")
    } else {
      alert("Se cancelo la eliminación")
    }
    document.getElementById("demo").innerHTML = text;
  }
