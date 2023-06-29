/// <reference path="ajax.ts" />
 function MostrarProductos() {
    EnviarJSON();
}
function EnviarJSON() {
    //CREO UN OBJETO JSON
    var productos = [{
            codBarra: "1212121",
            nombre: "camiseta",
            precio: 30,
        },
        {
            codigoBarra: "987654321",
            nombre: "Pantalón",
            precio: 39.99,
        },
        {
            codigoBarra: "456789123",
            nombre: "Zapatos",
            precio: 59.99,
        }
    ];
    console.log(productos);
    console.log("ASDASD");
    var productosJson = JSON.stringify(productos);
    console.log(productosJson);
    var pagina = "./BACKEND/mostrarJSON.php";
    var ajax = new Ajax();
    var params = "productos=" + productosJson;
    ajax.Post(pagina, function (resultado) {
        console.log(resultado);
    }, params, Fail);
}
function Fail(retorno) {
    console.clear();
    console.log("ERROR!!!");
    console.log(retorno);
}
//# sourceMappingURL=funciones.js.map