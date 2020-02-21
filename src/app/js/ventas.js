
let ModeloVentas = {
    controlador : {},
    datos : [],
    cargar : function () {
        fetch('../api/v1.0/ventas').then(function (respuesta) {
            return respuesta.json();
        }).then((datosJson) => {
            //console.log(datosJson);
            this.datos = datosJson;
            this.controlador.representar();
        });
    }

};

let VistaTablaVentas = {
    tabla : {},
    preparar : function(selectId){
        this.tabla = document.getElementById(selectId);
        this.tabla.innerHTML = '';
    },
    representar : function (datos) {
        let contador = 25;

        datos.forEach((venta) => {
            contador--;
            if (contador > 0){
                this.tabla.innerHTML += `<tr>
                                            <td>${venta.vendedor.apellidos}, ${venta.vendedor.nombre}</td>
                                            <td>${venta.cliente.nombre}</td>
                                            <td>${venta.fecha}</td>
                                            <td>${venta.importe}</td>
                                        </tr>`;
            }
        })
    }
};

let ControladorVentas = {
    modelo : ModeloVentas,
    vista : VistaTablaVentas,
    iniciar : function () {
        ModeloVentas.controlador = this;
        ModeloVentas.cargar();
    },
    representar : function () {
        this.vista.representar(this.modelo.datos);
    }
};