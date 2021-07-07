function cancelarCita(id_cita) {

    //verifica que ningun campo este vacio
    if (id_cita == 0 || id_cita == "" || id_cita == null) {
        alert("No se pudieron eliminar los datos");
    } else {
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "op/cancelar_cita.php",
            data: "id_cita=" + id_cita,
            success: function (resp) {
                if (resp == 1) {
                    location.href = "perfil.php";
                } else {
                    alert("No se pudieron eliminar los datos");
                }
            }
        });

    } // fin del if del campos vacios


}