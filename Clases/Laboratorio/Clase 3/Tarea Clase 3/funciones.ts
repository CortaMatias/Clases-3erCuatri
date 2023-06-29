/// <reference path="ajax.ts" />

export function MostrarProductos() : void { 
    EnviarJSON();   
}

 function EnviarJSON():void {

    //CREO UN OBJETO JSON
    const productos : any[]  = [{
        codBarra : "1212121",
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
    let productosJson = JSON.stringify(productos);
    console.log(productosJson);  
    let pagina = "./BACKEND/mostrarJSON.php";
    
    let ajax : Ajax = new Ajax();
    let params : string = "productos=" + productosJson;

    ajax.Post(pagina, 
        (resultado:string)=> {
            console.log(resultado);
        }
        , params, Fail);
    }

    function Fail(retorno:string):void {
        console.clear();
        console.log("ERROR!!!");
        console.log(retorno);
    }