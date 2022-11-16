function usuarioUpd() {    
    var id = $("input[name='id_upd']:checked").val();
    if (isNaN(id)) {
        alert("Seleccione Fila para Actualizar Datos");
    } else {
        window.location = "Proveedor?accion=GET&id=" + id;
    }
}

$('.mibtn-cancelar').on('click',function () {
//    alert($(this).data("id"));
    const id = $(this).data("id");
//    console.log(id);
    if (id=== 0) {
        alert("Advertencia\n\nSeleccione la(s) fila(s) a Retirar");
    } else {
        var exito = confirm('¿Seguro que deseas borrar los registros?');
        if (exito) {
            window.location = "UsuarioServlet?accion=eliminar&id=" + id.toString();
        } else {
            alert("Operación cancelada");
        }
    }
});

