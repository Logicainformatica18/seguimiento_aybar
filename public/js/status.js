function StatusStore() {
  var formData = new FormData(document.getElementById("Status"));
  axios({
    method: "post",
    url: "../StatusStore",
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

function StatusEdit(id) {
  var formData = new FormData(document.getElementById("Status"));
  formData.append("id", id);

  axios({
    method: "post",
    url: "../StatusEdit",
    data: formData,
    headers: {
      "Content-Type": "multipart/form-data"
    }
  })
    .then(function(response) {
      // Asignación de datos al formulario
      Status.id.value = response.data["id"];

      Status.description.value = response.data["description"];




    })
    .catch(function(response) {
      // Manejo de errores
      console.log(response);
    });
}

function StatusUpdate() {
  var formData = new FormData(document.getElementById("Status"));
  axios({
    method: "post",
    url: "../StatusUpdate",
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

function StatusDestroy(id) {
  if (confirm("¿Quieres eliminar este registro?")) {
    var formData = new FormData(document.getElementById("Status"));
    formData.append("id", id);
    axios({
      method: "post",
      url: "../StatusDestroy",
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
