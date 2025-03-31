function CustomerStore() {
  var formData = new FormData(document.getElementById("Customer"));
  axios({
    method: "post",
    url: "../CustomerStore",
    data: formData,
    headers: {
      "Content-Type": "multipart/form-data"
    }
  })
    .then(function(response) {
      //handle success
      var contentdiv = document.getElementById("mycontent");
      contentdiv.innerHTML = response.data;
      //carga pdf- csv - excel
      datatable_load();
      alert("Registrado Correctamente");
    })
    .catch(function(response) {
      //handle error
      console.log(response);
    });
}

// Tu tabla actual queda igual

function CustomerEdit(id) {
    var formData = new FormData(document.getElementById("Customer"));
    formData.append("id", id);

    axios({
      method: "post",
      url: "../CustomerEdit",
      data: formData,
      headers: {
        "Content-Type": "multipart/form-data"
      }
    })
    .then(function (response) {
      const c = response.data;
      document.getElementById("customer_id").innerHTML = "EX-" + c["id"];

      // Función auxiliar para asignar valor si existe el input
      const setValue = (field, value) => {
        if (Customer[field]) {
          Customer[field].value = value ?? '';
        }
      };

      // Asignaciones agrupadas
      setValue('id', c.id);
      setValue('project_id', c.project_id);
      setValue('client_1', c.client_1);
      setValue('dni_1', c.dni_1);
      setValue('client_2', c.client_2);
      setValue('dni_2', c.dni_2);
      setValue('client_3', c.client_3);
      setValue('dni_3', c.dni_3);
      setValue('client_4', c.client_4);
      setValue('dni_4', c.dni_4);
      setValue('client_5', c.client_5);
      setValue('dni_5', c.dni_5);
      setValue('mz_lt', c.mz_lt);
      setValue('business_partners_id', c.business_partners_id);
      setValue('separation_date', c.separation_date);
      setValue('separation_amount', c.separation_amount);
      setValue('assistant_id', c.assistant_id);
      setValue('initial_paid', c.initial_paid);
      setValue('initial_payment_date', c.initial_payment_date);
      setValue('initial_amount', c.initial_amount);
      setValue('operations_entry', c.operations_entry);
      setValue('editors_id', c.editors_id);
      setValue('days', c.days);
      setValue('issue_date', c.issue_date);
      setValue('redaction_observations', c.redaction_observations);
      setValue('contract_withdrawal_date', c.contract_withdrawal_date);
      setValue('elapsed_days', c.elapsed_days);
      setValue('returned_letters', c.returned_letters);
      setValue('return_date', c.return_date);
      setValue('contract_type', c.contract_type);
      setValue('regularization_observations', c.regularization_observations);
      setValue('correction_delivery_day', c.correction_delivery_day);
      setValue('estimated_delivery_day', c.estimated_delivery_day);
      setValue('actual_delivery_day', c.actual_delivery_day);
      setValue('regularized_contract_date', c.regularized_contract_date);
      setValue('regularization_return_time', c.regularization_return_time);
      setValue('reception_time', c.reception_time);
      setValue('report_time', c.report_time);
      setValue('elapsed_time', c.elapsed_time);
      setValue('indicator', c.indicator);
      setValue('delivered_to_operations_2', c.delivered_to_operations_2);
      setValue('observations', c.observations);
      setValue('commission_paid', c.commission_paid);
      setValue('contract_scanned', c.contract_scanned);
      setValue('cancellation_request_type', c.cancellation_request_type);
      setValue('cancellation_date', c.cancellation_date);
      setValue('cancelled_by', c.cancelled_by);
      setValue('physical_contract', c.physical_contract);
      setValue('phone', c.phone);
      setValue('email', c.email);
      setValue('signed_agreement', c.signed_agreement);
      setValue('receipts', c.receipts);
      setValue('operation_type', c.operation_type);
      setValue('observation', c.observation);
      setValue('lot_status', c.lot_status);
      setValue('state_id', c.state_id);


    })
    .catch(function (response) {
      console.log(response);
    });
  }


function CustomerUpdate() {
  var formData = new FormData(document.getElementById("Customer"));
  axios({
    method: "post",
    url: "../CustomerUpdate",
    data: formData,
    headers: {
      "Content-Type": "multipart/form-data"
    }
  })
    .then(function(response) {
      //handle success
      var contentdiv = document.getElementById("mycontent");
      contentdiv.innerHTML = response.data;
      //carga pdf- csv - excel
      datatable_load();
      alert("Modificado Correctamente");
    })
    .catch(function(response) {
      //handle error
      console.log(response);
    });
}

function CustomerDestroy(id) {
  if (confirm("¿Quieres eliminar este registro?")) {
    var formData = new FormData(document.getElementById("Customer"));
    formData.append("id", id);
    axios({
      method: "post",
      url: "../CustomerDestroy",
      data: formData,
      headers: {
        "Content-Type": "multipart/form-data"
      }
    })
      .then(function(response) {
        //handle success
        var contentdiv = document.getElementById("mycontent");
        contentdiv.innerHTML = response.data;
        //carga pdf- csv - excel
        datatable_load();
        alert("Eliminado Correctamente");
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
    method: "post",
    url: "../CustomerShow",
    data: formData
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
