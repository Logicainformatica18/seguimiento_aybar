function ProjectStore() {
  var formData = new FormData(document.getElementById("Project"));
  axios({
    method: "post",
    url: "../ProjectStore",
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

function ProjectEdit(id) {
  var formData = new FormData(document.getElementById("Project"));
  formData.append("id", id);

  axios({
    method: "post",
    url: "../ProjectEdit",
    data: formData,
    headers: {
      "Content-Type": "multipart/form-data"
    }
  })
    .then(function(response) {
      // Asignación de datos al formulario
      Project.id.value = response.data["id"];
      Project.title.value = response.data["title"];
      Project.description.value = response.data["description"];
      Project.detail.value = response.data["detail"];
      Project.location.value = response.data["location"];
      Project.land.value = response.data["land"];
      Project.land_count.value = response.data["land_count"];

      Project.country.value = response.data["country"];

      // Manejo de la imagen principal
      if (response.data["image_1"] != null) {
        Project.foto.src = "../resource/" + response.data["image_1"];
      } else {
        Project.foto.src = "https://placehold.co/150";
      }
      // Manejo de mapas (map_1 y map_2)
      for (let i = 1; i <= 2; i++) {
        let mapField = "mapPreview_" + i;
        let mapInput = document.getElementById(mapField);
        if (response.data["map_"+i] != null) {
          mapInput.src = "../resource/" + response.data["map_"+i] ;
        } else {
          mapInput.src = "https://placehold.co/150";
        }
      }
      // Manejo de fotos adicionales (photo_1 a photo_10)
      for (let i = 1; i <= 10; i++) {
        let photoField = "photoPreview_" + i;
        let photoInput = document.getElementById(photoField);
        if (response.data["photo_"+i] != null) {
          photoInput.src = "../resource/" + response.data["photo_"+i];
        } else {
          photoInput.src = "https://placehold.co/150";
        }
      }

      // Manejo de videos (video_1 a video_10)
      for (let i = 1; i <= 10; i++) {
        let videoField = "video_" + i;
        if (response.data[videoField] != null) {
          Project[videoField].value = response.data[videoField];
        } else {
          Project[videoField].value = "";
        }
      }

      // Manejo de subproyectos (subproject_1 a subproject_5)
      // for (let i = 1; i <= 6; i++) {
      //   let subprojectField = "subproject_" + i;
      //   if (response.data[subprojectField] != null) {
      //     Project[subprojectField].value = response.data[subprojectField];
      //   } else {
      //     Project[subprojectField].value = "";
      //   }
      // }

   // Manejo de turistas y sus imágenes (tourist_1 a tourist_6 y tourist_image_1 a tourist_image_6)
   for (let i = 1; i <= 6; i++) {
    let subProjectField = "subproject_" + i;subProjectImagePreview_1
    let subProjectImageField = "subProjectImagePreview_" + i;
    let subProjectImagePreview = document.getElementById(subProjectImageField);

    if (response.data[subProjectField] != null) {
      Project[subProjectField].value = response.data[subProjectField];
    } else {
      Project[subProjectField].value = "";
    }

    if (response.data["subproject_image_"+i] != null) {
      subProjectImagePreview.src = "../resource/" + response.data["subproject_image_"+i];
    } else {
      subProjectImagePreview.src = "https://placehold.co/150";
    }
  }











      // Manejo de turistas y sus imágenes (tourist_1 a tourist_6 y tourist_image_1 a tourist_image_6)
      for (let i = 1; i <= 6; i++) {
        let touristField = "tourist_" + i;touristImagePreview_1
        let touristImageField = "touristImagePreview_" + i;
        let touristImagePreview = document.getElementById(touristImageField);

        if (response.data[touristField] != null) {
          Project[touristField].value = response.data[touristField];
        } else {
          Project[touristField].value = "";
        }

        if (response.data["tourist_image_"+i] != null) {
          touristImagePreview.src = "../resource/" + response.data["tourist_image_"+i];
        } else {
          touristImagePreview.src = "https://placehold.co/150";
        }
      }
    })
    .catch(function(response) {
      // Manejo de errores
      console.log(response);
    });
}

function ProjectUpdate() {
  var formData = new FormData(document.getElementById("Project"));
  axios({
    method: "post",
    url: "../ProjectUpdate",
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

function ProjectDestroy(id) {
  if (confirm("¿Quieres eliminar este registro?")) {
    var formData = new FormData(document.getElementById("Project"));
    formData.append("id", id);
    axios({
      method: "post",
      url: "../ProjectDestroy",
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
