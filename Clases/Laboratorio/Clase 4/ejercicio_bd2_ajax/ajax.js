"use strict";
class Ajax {
    constructor() {
        this.Get = (ruta, success, params = "", error) => {
            let parametros = params.length > 0 ? params : "";
            ruta = params.length > 0 ? ruta + "?" + parametros : ruta;
            this._xhr.open('GET', ruta);
            this._xhr.send();
            this._xhr.onreadystatechange = () => {
                if (this._xhr.readyState === Ajax.DONE) {
                    if (this._xhr.status === Ajax.OK) {
                        success(this._xhr.responseText);
                    }
                    else {
                        if (error !== undefined) {
                            error(this._xhr.status);
                        }
                    }
                }
            };
        };
        this.Post = (ruta, success, params = "", error) => {
            let parametros = params.length > 0 ? params : "";
            this._xhr.open('POST', ruta, true);
            this._xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            this._xhr.send(parametros);
            this._xhr.onreadystatechange = () => {
                if (this._xhr.readyState === Ajax.DONE) {
                    if (this._xhr.status === Ajax.OK) {
                        success(this._xhr.responseText);
                    }
                    else {
                        if (error !== undefined) {
                            error(this._xhr.status);
                        }
                    }
                }
            };
        };
        this.PostImage = (ruta, success, params = "", error) => {
            let parametros = params.length > 0 ? params : "";
            this._xhr.open('POST', ruta, true);
            this._xhr.setRequestHeader("enctype", "multipart/form-data");
            this._xhr.send(parametros);
            this._xhr.onreadystatechange = () => {
                if (this._xhr.readyState === Ajax.DONE) {
                    if (this._xhr.status === Ajax.OK) {
                        success(this._xhr.responseText);
                    }
                    else {
                        if (error !== undefined) {
                            error(this._xhr.status);
                        }
                    }
                }
            };
        };
        this.PostForm = (ruta, success, params, error) => {
            this._xhr.open('POST', ruta, true);
            // this._xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
            //this._xhr.setRequestHeader("Content-Type", "multipart/form-data");
            console.log(params);
            this._xhr.send(params);
            this._xhr.onreadystatechange = () => {
                if (this._xhr.readyState === Ajax.DONE) {
                    if (this._xhr.status === Ajax.OK) {
                        success(this._xhr.responseText);
                    }
                    else {
                        if (error !== undefined) {
                            error(this._xhr.status);
                        }
                    }
                }
            };
        };
        this.PostImageForm = (ruta, success, params, error) => {
            this._xhr.open('POST', ruta, true);
            this._xhr.setRequestHeader("enctype", "multipart/form-data");
            this._xhr.send(params);
            this._xhr.onreadystatechange = () => {
                if (this._xhr.readyState === Ajax.DONE) {
                    if (this._xhr.status === Ajax.OK) {
                        success(this._xhr.responseText);
                    }
                    else {
                        if (error !== undefined) {
                            error(this._xhr.status);
                        }
                    }
                }
            };
        };
        this._xhr = new XMLHttpRequest();
        Ajax.DONE = 4;
        Ajax.OK = 200;
    }
}
//# sourceMappingURL=ajax.js.map