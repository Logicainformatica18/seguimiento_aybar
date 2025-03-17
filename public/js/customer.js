function CustomerStore() {
var formData = new FormData(document.getElementById("Customer"));
axios({
method: 'post',
url: '../CustomerStore',
data: formData,
headers: {
'Content-Type': 'multipart/form-data'
}
})
.then(function(response) {
//handle success
var contentdiv = document.getElementById("mycontent");
contentdiv.innerHTML = response.data;
//carga pdf- csv - excel
datatable_load();
alert('Registrado Correctamente');
})
.catch(function(response) {
//handle error
console.log(response);
});

}

function CustomerEdit(id) {
var formData = new FormData(document.getElementById("Customer"));
formData.append("id",id);
axios({
method: 'post',
url: '../CustomerEdit',
data: formData,
headers: {
'Content-Type': 'multipart/form-data'
}
})
.then(function(response) {
//handle success
// var contentdiv = document.getElementById("mycontent");
// contentdiv.innerHTML = response.data["description"];
Customer.id.value=response.data["id"];
Customer.cliente_1.value=response.data["cliente_1"];
Customer.dni_1.value=response.data["dni"];
Customer.cliente_2.value=response.data["cliente_2"];
Customer.dni_2.value=response.data["dni_2"];
Customer.cliente_3.value=response.data["cliente_3"];
Customer.dni_3.value=response.data["dni_3"];
Customer.cliente_4.value=response.data["cliente_4"];
Customer.dni_4.value=response.data["dni_4"];
Customer.cliente_5.value=response.data["cliente_5"];
Customer.dni_5.value=response.data["dni_5"];
// // Customer.detail.value=response.data["detail"];
Customer.lote.value=response.data["lote"];
Customer.aux.value=response.data["aux"];
Customer.business_partners_id.value=response.data["business_partners_id"];


//Customer.fecha_de_separacion.value=response.data["fecha_de_separacion"];
Customer.fecha_de_separacion.value = response.data["fecha_de_separacion"];



Customer.precio_de_lista_inventario.value=response.data["precio_de_lista_inventario"] || 0.00;
Customer.descuento_porcentaje.value=response.data["descuento_porcentaje"] || 0.00;
Customer.importe_de_venta.value=response.data["importe_de_venta"] || 0.00;
Customer.state_id.value=response.data["state_id"] || 0.00;

Customer.editors_id.value=response.data["editors_id"]  ;

//Customer.dias_1.value=  fecha_hoy - response.data["fecha_de_separacion"];

// Suponiendo que "Customer.dias_1" es tu input
calcularDiferenciaDias(response.data["fecha_de_separacion"], Customer.dias_1);
Customer.ingreso_a_operaciones.value = response.data["ingreso_a_operaciones"];
Customer.recogido_no_devuelto.value = response.data["recogido_no_devuelto"];
calcularDiferenciaDias(response.data["recogido_no_devuelto"], Customer.dias_2);
Customer.fecha_contrato_firmado_devuelto.value = response.data["fecha_contrato_firmado_devuelto"];
Customer.adenda_refinanciamiento.value = response.data["adenda_refinanciamiento"];
Customer.j2.value = response.data["j2"];
Customer.enviado_a_archivo.value = response.data["enviado_a_archivo"];
Customer.virtual.value = response.data["virtual"];
Customer.notaria.value = response.data["notaria"];
Customer.chincha.value = response.data["chincha"];
Customer.post_venta.value = response.data["post_venta"];
Customer.proceso_de_desistimiento.value = response.data["proceso_de_desistimiento"];
Customer.proceso_de_resolucion.value = response.data["proceso_de_resolucion"];
Customer.cambio_de_titular.value = response.data["cambio_de_titular"];
Customer.desistimiento.value = response.data["desistimiento"];
Customer.comisiones.value = response.data["comisiones"];
Customer.cantidad_de_letras.value = response.data["cantidad_de_letras"];
Customer.letras_verificadas.value = response.data["letras_verificadas"];
Customer.letras_verificadas_2.innerHTML = response.data["letras_verificadas"];



console.log(response.data);

})
.catch(function(response) {
//handle error
console.log(response);
});

}

function CustomerUpdate() {
var formData = new FormData(document.getElementById("Customer"));
axios({
method: 'post',
url: '../CustomerUpdate',
data: formData,
headers: {
'Content-Type': 'multipart/form-data'
}
})
.then(function(response) {
//handle success
var contentdiv = document.getElementById("mycontent");
contentdiv.innerHTML = response.data;
//carga pdf- csv - excel
datatable_load();
alert('Modificado Correctamente');

})
.catch(function(response) {
//handle error
console.log(response);
});

}

function CustomerDestroy(id) {

if(confirm("¿Quieres eliminar este registro?")){
var formData = new FormData(document.getElementById("Customer"));
formData.append("id",id)
axios({
method: 'post',
url: '../CustomerDestroy',
data: formData,
headers: {
'Content-Type': 'multipart/form-data'
}
})
.then(function(response) {
//handle success
var contentdiv = document.getElementById("mycontent");
contentdiv.innerHTML = response.data;
//carga pdf- csv - excel
datatable_load();
alert('Eliminado Correctamente');

})
.catch(function(response) {
//handle error
console.log(response);
});
}
}

function CustomerShow() {
var formData = new FormData(document.getElementById("show"));
axios({
method: 'post',
url: '../CustomerShow',
data: formData,
})
.then(function(response) {
//handle success
var contentdiv = document.getElementById("mycontent");
contentdiv.innerHTML = response.data;
//carga pdf- csv - excel
datatable_load();
})
.catch(function(response) {
//handle error
console.log(response);
});

}


function calcularDiferenciaDias(fechaSeparacionStr, inputDestino) {
    // Definir fecha actual
    let fecha_hoy = new Date();

    // Convertir la fecha de separación a formato ISO si es necesario
    let fechaSeparacion = new Date(fechaSeparacionStr.replace(" ", "T"));

    // Verificar si la fecha es válida
    if (!isNaN(fechaSeparacion.getTime())) {
        // Convertir ambas fechas a solo "YYYY-MM-DD" (sin hora)
        let fechaSeparacionUTC = new Date(fechaSeparacion.getFullYear(), fechaSeparacion.getMonth(), fechaSeparacion.getDate());
        let fechaHoyUTC = new Date(fecha_hoy.getFullYear(), fecha_hoy.getMonth(), fecha_hoy.getDate());

        // Calcular la diferencia en días
        let diferenciaMs = fechaHoyUTC - fechaSeparacionUTC;
        let dias = Math.floor(diferenciaMs / (1000 * 60 * 60 * 24));

        // Asignar el resultado al input
        inputDestino.value = dias;
    } else {
        console.error("Fecha inválida:", fechaSeparacionStr);
        inputDestino.value = 0;
    }
}
