function EditorStore() {
  var formData = new FormData(document.getElementById("Editor"));
  axios({
    method: "post",
    url: "../EditorStore",
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

function EditorEdit(id) {
  var formData = new FormData(document.getElementById("Editor"));
  formData.append("id", id);

  axios({
    method: "post",
    url: "../EditorEdit",
    data: formData,
    headers: {
      "Content-Type": "multipart/form-data"
    }
  })
    .then(function(response) {
      // Asignación de datos al formulario
      Editor.id.value = response.data["id"];

      Editor.description.value = response.data["description"];




    })
    .catch(function(response) {
      // Manejo de errores
      console.log(response);
    });
}

function EditorUpdate() {
  var formData = new FormData(document.getElementById("Editor"));
  axios({
    method: "post",
    url: "../EditorUpdate",
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

function EditorDestroy(id) {
  if (confirm("¿Quieres eliminar este registro?")) {
    var formData = new FormData(document.getElementById("Editor"));
    formData.append("id", id);
    axios({
      method: "post",
      url: "../EditorDestroy",
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
