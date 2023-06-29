"use strict";
window.addEventListener("load", function () {
    Main.MostrarListado();
});
var Main;
(function (Main) {
    var URL_API = "http://localhost:9876/";
    var AJAX = new Ajax();
    function MostrarListado() {
        AJAX.Get(URL_API + "alumnos_bd", MostrarListadoSuccess, "", Fail);
    }
    Main.MostrarListado = MostrarListado;
    function AgregarProducto() {
        var legajo = parseInt(document.getElementById("legajo").value);
        var apellido = document.getElementById("apellido").value;
        var nombre = (document.getElementById("nombre").value);
        var foto = document.getElementById("foto");
        var data = {
            "legajo": legajo,
            "apellido": apellido,
            "nombre": nombre
        };
        var form = new FormData();
        form.append('foto', foto.files[0]);
        form.append('obj', JSON.stringify(data));
        console.log(foto.files[0]);
        AJAX.Post(URL_API + "alumnos_bd", AgregarSuccess, form, Fail);
    }
    Main.AgregarProducto = AgregarProducto;
    function AgregarSuccess(retorno) {
        console.log("Agregar: ", retorno);
        MostrarListado();
        LimpiarForm();
    }
    function ModificarProducto() {
        var legajo = parseInt(document.getElementById("legajo").value);
        var nombre = document.getElementById("nombre").value;
        var apellido = (document.getElementById("apellido").value);
        var foto = document.getElementById("foto");
        var data = {
            "legajo": legajo,
            "nombre": nombre,
            "apellido": apellido
        };
        var form = new FormData();
        form.append('foto', foto.files[0]);
        form.append('obj', JSON.stringify(data));
        AJAX.Post(URL_API + "alumnos_bd/modificar", ModificarSuccess, form, Fail);
    }
    Main.ModificarProducto = ModificarProducto;
    function ModificarSuccess(retorno) {
        console.log("Modificar: ", retorno);
        var btn = document.getElementById("btnForm");
        btn.value = "Agregar";
        btn.removeEventListener("click", function () {
            ModificarProducto();
        });
        btn.addEventListener("click", function () {
            AgregarProducto();
        });
        MostrarListado();
        LimpiarForm();
    }
    function MostrarListadoSuccess(data) {
        var prod_obj_array = JSON.parse(data);
        console.log("Mostrar: ", prod_obj_array);
        var div = document.getElementById("divListado");
        var tabla = "<table class=\"table table-hover\">\n                        <tr>\n                            <th>LEGAJO</th><th>APELLIDO</th><th>NOMBRE</th><th>FOTO</th><th>ACCIONES</th>\n                        </tr>";
        if (prod_obj_array.length < 1) {
            tabla += "<tr><td>---</td><td>---</td><td>---</td><td>---</td>\n                            <td>---</td></tr>";
        }
        else {
            for (var index = 0; index < prod_obj_array.length; index++) {
                var dato = prod_obj_array[index];
                tabla += "<tr><td>".concat(dato.legajo, "</td><td>").concat(dato.apellido, "</td><td>").concat(dato.nombre, "</td>\n                                        <td><img src=\"").concat(URL_API).concat(dato.foto, "\" width=\"80px\" height=\"80px\"></td>\n                                        <td><button type=\"button\" class=\"btn btn-info\" id=\"\" \n                                                data-obj='").concat(JSON.stringify(dato), "' name=\"btnModificar\">\n                                                <span class=\"bi bi-pencil\"></span>\n                                            </button>\n                                            <button type=\"button\" class=\"btn btn-danger\" id=\"\" \n                                                data-legajo='").concat(dato.legajo, "' name=\"btnEliminar\">\n                                                <span class=\"bi bi-x-circle\"></span>\n                                            </button>\n                                        </td></tr>");
            }
        }
        tabla += "</table>";
        div.innerHTML = tabla;
        document.getElementsByName("btnModificar").forEach(function (boton) {
            boton.addEventListener("click", function () {
                var obj = boton.getAttribute("data-obj");
                var obj_dato = JSON.parse(obj);
                document.getElementById("legajo").value = obj_dato.legajo;
                document.getElementById("apellido").value = obj_dato.apellido;
                document.getElementById("nombre").value = obj_dato.nombre;
                document.getElementById("img_foto").src = URL_API + obj_dato.foto;
                document.getElementById("div_foto").style.display = "block";
                document.getElementById("legajo").readOnly = true;
                var btn = document.getElementById("btnForm");
                btn.value = "Modificar";
                btn.removeEventListener("click", function () {
                    AgregarProducto();
                });
                btn.addEventListener("click", function () {
                    ModificarProducto();
                });
            });
        });
        document.getElementsByName("btnEliminar").forEach(function (boton) {
            boton.addEventListener("click", function () {
                var legajo = boton.getAttribute("data-legajo");
                if (confirm("\u00BFSeguro de eliminar producto con c\u00F3digo ".concat(legajo, "?"))) {
                    var headers = [{ "key": "content-type", "value": "application/json" }];
                    var data_1 = "{\"legajo\": ".concat(legajo, "}");
                    AJAX.Post(URL_API + "alumnos_bd/eliminar", DeleteSuccess, data_1, Fail, headers);
                }
            });
        });
    }
    function DeleteSuccess(retorno) {
        console.log("Eliminar", retorno);
        MostrarListado();
    }
    function Fail(retorno) {
        console.error(retorno);
        alert("Ha ocurrido un ERROR!!!");
    }
    function LimpiarForm() {
        document.getElementById("img_foto").src = "";
        document.getElementById("div_foto").style.display = "none";
        document.getElementById("legajo").readOnly = false;
        document.getElementById("legajo").value = "";
        document.getElementById("apellido").value = "";
        document.getElementById("nombre").value = "";
        document.getElementById("foto").value = "";
    }
})(Main || (Main = {}));
//# sourceMappingURL=app.js.map