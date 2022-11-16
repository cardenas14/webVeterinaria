function productosUpd() {    
    var id = $("input[name='id_upd']:checked").val();
    if (isNaN(id)) {
        alert("Seleccione Fila para Actualizar Datos");
    } else {
        window.location = "Productos?accion=GET&id=" + id;
    }
}

function productosDel() {
    var ids = [];
    $("input[name='id_del']:checked").each(function () {
        ids.push($(this).val());
    });
    if (ids.length === 0) {
        alert("Advertencia\n\nSeleccione la(s) fila(s) a Retirar");
    } else {
        var exito = confirm('¿Seguro que deseas borrar los registros?');
        if (exito) {
            window.location = "Productos?accion=DEL&ids=" + ids.toString();
        } else {
            alert("Operación cancelada");
        }
    }
}