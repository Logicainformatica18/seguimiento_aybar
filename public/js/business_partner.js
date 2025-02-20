function Business_partnerStore() {
  var formData = new FormData(document.getElementById("Business_partner"));
  axios({
    method: "post",
    url: "../Business_partnerStore",
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

function Business_partnerEdit(id) {
  var formData = new FormData(document.getElementById("Business_partner"));
  formData.append("id", id);

  axios({
    method: "post",
    url: "../Business_partnerEdit",
    data: formData,
    headers: {
      "Content-Type": "multipart/form-data"
    }
  })
    .then(function(response) {
      // Asignación de datos al formulario
      Business_partner.id.value = response.data["id"];

      Business_partner.description.value = response.data["description"];




    })
    .catch(function(response) {
      // Manejo de errores
      console.log(response);
    });
}

function Business_partnerUpdate() {
  var formData = new FormData(document.getElementById("Business_partner"));
  axios({
    method: "post",
    url: "../Business_partnerUpdate",
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

function Business_partnerDestroy(id) {
  if (confirm("¿Quieres eliminar este registro?")) {
    var formData = new FormData(document.getElementById("Business_partner"));
    formData.append("id", id);
    axios({
      method: "post",
      url: "../Business_partnerDestroy",
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
