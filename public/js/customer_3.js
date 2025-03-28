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
        document.getElementById("customer_id").innerHTML = "EX-" + response.data["id"];
        const c = response.data;
        Customer.project_id.value = c.project_id;
  Customer.project_id.value = c.project_id;

        Customer.id.value = c.id;
        Customer.client_1.value = c.client_1;
        Customer.dni_1.value = c.dni_1;
        Customer.client_2.value = c.client_2;
        Customer.dni_2.value = c.dni_2;
        Customer.client_3.value = c.client_3;
        Customer.dni_3.value = c.dni_3;
        Customer.client_4.value = c.client_4;
        Customer.dni_4.value = c.dni_4;
        Customer.client_5.value = c.client_5;
        Customer.dni_5.value = c.dni_5;
        alert(c.mz_lt);
        Customer.mz_lt.value = c.mz_lt;

        Customer.business_partners_id.value = c.business_partners_id;
        Customer.separation_date.value = c.separation_date;
        Customer.separation_amount.value = c.separation_amount;
        Customer.assistant_id.value = c.assistant_id;
        Customer.initial_paid.value = c.initial_paid;
        Customer.initial_payment_date.value = c.initial_payment_date;
        Customer.initial_amount.value = c.initial_amount;
        Customer.statuses_id.value = c.statuses_id;

       // Customer.editor_id.value = c.editors_id;




        Customer.operations_entry.value = c.operations_entry;
        Customer.days.value = c.days;
        Customer.drafted_by.value = c.drafted_by;
        Customer.issue_date.value = c.issue_date;
        Customer.redaction_observations.value = c.redaction_observations;

        Customer.contract_withdrawal_date.value = c.contract_withdrawal_date;
        Customer.elapsed_days.value = c.elapsed_days;
        Customer.returned_letters.value = c.returned_letters;
        Customer.return_date.value = c.return_date;
        Customer.contract_type.value = c.contract_type;
        Customer.regularization_observations.value = c.regularization_observations;
        Customer.correction_delivery_day.value = c.correction_delivery_day;
        Customer.estimated_delivery_day.value = c.estimated_delivery_day;
        Customer.actual_delivery_day.value = c.actual_delivery_day;
        Customer.regularized_contract_date.value = c.regularized_contract_date;
        Customer.regularization_return_time.value = c.regularization_return_time;
        Customer.reception_time.value = c.reception_time;
        Customer.report_time.value = c.report_time;
        Customer.elapsed_time.value = c.elapsed_time;
        Customer.indicator.value = c.indicator;
        Customer.delivered_to_operations_2.checked = c.delivered_to_operations_2;
        Customer.observations.value = c.observations;

        Customer.commission_paid.checked = c.commission_paid;
        Customer.contract_scanned.checked = c.contract_scanned;

        Customer.cancellation_request_type.value = c.cancellation_request_type;
        Customer.cancellation_date.value = c.cancellation_date;
        Customer.cancelled_by.value = c.cancelled_by;
        Customer.physical_contract.checked = c.physical_contract;
        Customer.phone.value = c.phone;
        Customer.email.value = c.email;
        Customer.signed_agreement.checked = c.signed_agreement;
        Customer.receipts.checked = c.receipts;
        Customer.operation_type.value = c.operation_type;
        Customer.observation.value = c.observation;
        Customer.lot_status.value = c.lot_status;

        console.log(response.data);
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
