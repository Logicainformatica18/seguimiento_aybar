function topicDetail(id, registry_detail_id) {
  var formData = new FormData(document.getElementById("topic"));
  formData.append("id", id);
  formData.append("registry_detail_id", registry_detail_id);
  axios({
    method: "post",
    url: "../topic_detail",
    data: formData,
    headers: {
      "Content-Type": "multipart/form-data"
    }
  })
    .then(function(response) {
      //handle success
      window.location.href = "certificados_mantenimiento";
      // var contentdiv = document.getElementById("mycontent");
      // contentdiv.innerHTML = response.data;
      //  alert("hola");
    })
    .catch(function(response) {
      //handle error
      console.log(response);
    });
}

function topicDetailStudent(id, registry_detail_id) {
  var formData = new FormData(document.getElementById("topic"));
  formData.append("id", id);
  formData.append("registry_detail_id", registry_detail_id);
  axios({
    method: "post",
    url: "../topic_detail",
    data: formData,
    headers: {
      "Content-Type": "multipart/form-data"
    }
  })
    .then(function(response) {
      //handle success
      window.location.href = "Socio Comercial-certificados";
      // var contentdiv = document.getElementById("mycontent");
      // contentdiv.innerHTML = response.data;
      //  alert("hola");
    })
    .catch(function(response) {
      //handle error
      console.log(response);
    });
}
function topicStore() {
  var formData = new FormData(document.getElementById("topic"));

  // Mostrar la barra de progreso y el mensaje de "Cargando..."
  // document.getElementById("progress-container").style.display = 'block'; // Asegura que la barra y el mensaje estén visibles
  // document.getElementById("progress-message").innerText = "Cargando...";

  axios({
    method: "post",
    url: "../topicStore",
    data: formData,
    headers: {
      "Content-Type": "multipart/form-data"
    }

  })
    .then(function(response) {
     

      // Handle success
      var contentdiv = document.getElementById("mycontent");
      contentdiv.innerHTML = response.data;
      // Carga PDF, CSV, Excel, etc.
      datatable_load();
      alert("Registrado Correctamente");
   
    })
    .catch(function(response) {
      // En caso de error
      console.log(response);
    });
}


function topicEdit(id) {
  var formData = new FormData(document.getElementById("topic"));
  formData.append("id", id);
  axios({
    method: "post",
    url: "../topicEdit",
    data: formData,
    headers: {
      "Content-Type": "multipart/form-data"
    }
  })
    .then(function(response) {
      //handle success
      var contentdiv = document.getElementById("mycontent");
      // contentdiv.innerHTML = response.data["description"];
      topic.id.value = response.data["id"];
      topic.description.value = response.data["description"];
      topic.detail.value = response.data["detail"];
      topic.instruction.value = response.data["instruction"];
       topic.video.value = response.data["video"];
       topic.type.value = response.data["type"];
       topic.url.value = response.data["url"];

      // JavaScript para establecer el contenido del textarea
      document.getElementsByClassName("note-editable")[0].innerHTML = response.data["post"];
    })
    .catch(function(response) {
      //handle error
      console.log(response);
    });
}

function topicPublic() {
  axios({
    method: "get",
    url:  "../blog/topicPublic",
  })
    .then(function (response) {
     
      var contentdiv = document.getElementById("mycontent");

      // Verifica que el contenedor exista
      if (contentdiv) {
        contentdiv.innerHTML = ""; // Limpia el contenido anterior

        // Accede al array correcto y verifica que exista
        const topics = response.data.data || response.data; // Ajusta según tu estructura
        if (Array.isArray(topics)) {
          topics.forEach(function (item) {
            if (item.image_1 === null) {
              item.image_1 = "1734977972_+%20de%201,000.png";
            }
            
            let card = `
              <div class="col-md-4">
                <div class="card custom-card text-center">
                  <div class="card-body"style="height:340px">
                    <img src="../resource/${item.image_1}"style="width:100%"  class="img-fluid mb-3" alt="Icono">
                    <h5 class="card-title fw-bold">${item.description}</h5>
                    <p class=""style="text-align:justify" >${item.detail}</p>
                    <a target="_blank" href="http://${window.location.hostname +"/blog/"+ item.url}" class="btn custom-btn">Conocer más</a>
                  </div>
                </div>
              </div>
            `;
            contentdiv.innerHTML += card;
          });
        } else {
          console.error("El formato de datos no es un array:", topics);
        }
      } else {
        console.error("Elemento con ID 'mycontent' no encontrado.");
      }
    })
    .catch(function (error) {
      console.error("Error en la solicitud:", error.response || error.message);
    });
}




function topicUpdate() {
  var formData = new FormData(document.getElementById("topic"));
  axios({
    method: "post",
    url: "../topicUpdate",
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

function topicDestroy(id) {
  if (confirm("¿Quieres eliminar este registro?")) {
    var formData = new FormData(document.getElementById("topic"));
    formData.append("id", id);
    axios({
      method: "post",
      url: "../topicDestroy",
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

function topicShow() {
  var formData = new FormData(document.getElementById("show"));
  axios({
    method: "post",
    url: "../topicShow",
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
