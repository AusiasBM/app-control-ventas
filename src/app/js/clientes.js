
let ModeloClientes = {
    controlador: {},
    datos: [],
    cargar : function () {
        fetch('../api/v1.0/clientes').then(function (respuesta) {
            return respuesta.json();
        }).then((datosJson) => {
            this.datos = datosJson;
            this.controlador.representar(this.datos);
        })
    }
};

let VistaSelectorClientes = {
    selector : '',
    preparar: function(selectId) {
        this.selector = document.getElementById(selectId);
        this.selector.innerHTML = "<option value='0'>Todos</option>";
    },
    representar : function (datos) {
        datos.forEach((cliente) => {
            this.selector.innerHTML += `<option value="${cliente.id}">
            ${cliente.nombre}
            </option>`;
        })
    }
};

let ControladorClientes = {
    modelo : ModeloClientes,
    vista: VistaSelectorClientes,
    iniciar : function() {
        this.modelo.controlador = this;
        this.modelo.cargar();
    },
    representar: function (datos) {
        this.vista.representar(datos);
    }
};