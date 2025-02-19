function certificationDetail(id) {
    var formData = new FormData(document.getElementById("certification"));
    formData.append("id", id);
    axios({
      method: "post",
      url: "certification_detail",
      data: formData,
      headers: {
        "Content-Type": "multipart/form-data"
      }
    })
      .then(function(response) {
        //handle success
        window.location.href = "examenes";
        // var contentdiv = document.getElementById("mycontent");
        // contentdiv.innerHTML = response.data;
        //  alert("hola");
      })
      .catch(function(response) {
        //handle error
        console.log(response);
      });
  }
  function certificationStore() {
      var formData = new FormData(document.getElementById("certification"));
      axios({
              method: 'post',
              url: 'certificationStore',
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
  
  
  function certificationEdit(id) {
      var formData = new FormData(document.getElementById("certification"));
      formData.append("id",id);
      axios({
              method: 'post',
              url: 'certificationEdit',
              data: formData,
              headers: {
                  'Content-Type': 'multipart/form-data'
              }
          })
          .then(function(response) {
              //handle success
              var contentdiv = document.getElementById("mycontent");
             // contentdiv.innerHTML = response.data["description"];
              certification.id.value=          response.data["id"];
              certification.description.value= response.data["description"];
              certification.detail.value = response.data["detail"];
              certification.course_id.value = response.data["course_id"];
              certification.note.value=    response.data["note"];
  
          })
          .catch(function(response) {
              //handle error
              console.log(response);
          });
  
  }
  
  
  function certificationOpen(id) {
      var formData = new FormData(document.getElementById("qualification"));
      formData.append("id",id);
      axios({
              method: 'post',
              url: 'certificationGenerate',
              data: formData,
              headers: {
                  'Content-Type': 'multipart/form-data'
              }
          })
          .then(function(response) {
              //handle success
              //abrin nueva pestaña el cerficado generato
            let url = "certificaciones-mantenimiento";
             window.open(url, "_blank");
  
  
  
  
  
  
          })
          .catch(function (response) {
  
              //handle error
              console.log(response);
          });
  
  }
  
  
  
  
  
  function certificationGenerate(id, type, code_certification, cert) {
      
      var formData = new FormData(document.getElementById("qualification"));
      formData.append("id",id);
      axios({
              method: 'post',
              url: 'certificationGenerate',
              data: formData,
              headers: {
                  'Content-Type': 'multipart/form-data'
              }
          })
          .then(function(response) {
              //handle success
              //abrin nueva pestaña el cerficado generato
               let url = "certificaciones/id=" + id + "/type=" + type +"/cid="+code_certification +"/cert="+cert;
           //    window.open(url2, "_blank");
              window.open(url, "_blank");
              
          })
          .catch(function (response) {
  
              //handle error
              console.log(response);
          });
  
  }
  
  
  
  
  

  
  
  
  function generateCertication(image_src, student, canvas_id, qr_url, id, cert,text,hour,type,day,mesCorto,anio,note) {
  
  
  
        var c = document.getElementById(canvas_id);
    //  var c = document.getElementById("canvas");
    var ctx = c.getContext("2d");
  
    var image = new Image();
  
  
  
        image.src =image_src;
   image.onload = function() {
              ctx.drawImage(image, 0, 0, canvas1.width, canvas1.height);
                     /* Definimos tamaño de la fuente */
           //   ctx.font = '35px Relaway';
          //   ctx.font = "bold 10pt Courier";
          ctx.font = "italic 54px Montserrat-bold";
  
              ctx.textAlign = "center";
              ctx.textBaseline = 'middle';
          ctx.fillStyle ="#0a2262";
         // ctx.
  
             // student = student.toUpperCase();
          let x = canvas1.width / 2  ;
  
          ctx.fillText(student, x, 605);
       
          ctx.font = "34px Montserrat-Regular";
          ctx.fillStyle = "#0a2262";
       /////////////////////////////////
  
  if (hour <= 9) {
      hour = "0" + hour;
  }
  
  
  
       /////////////////////////////
       
       ctx.fillText(hour, x+411, 730);
       
       ctx.font = "bold 45px Montserrat-Bold";
       ctx.fillStyle = "#0a2262";
       
  
       ctx.fillText('"'+text+'"', x, 800);
       /////////type /////////
  
       ctx.font = "37px Montserrat-Regular";
       ctx.fillStyle = "#0a2262";
   
  
       ctx.fillText(type, x-76, 730);
  
       /////////////////
       ctx.font = "italic 27px Montserrat-Regular";
       ctx.fillStyle ="#0a2262";
            ctx.textAlign = "center";
  
       
  
  var fechaActual = new Date();
  //fechaActual.setMonth(fechaActual.getMonth());
  //fechaActual.setDate(fechaActual.getDate());
  //var dia = fechaActual.getDate();
  //var mesCorto = fechaActual.toLocaleDateString('en-US', { month: 'long' });
  //var anio = fechaActual.getFullYear();
  
  let text_th ="th";
  
  
  
  let orientacion_th = x ;
  let = orientacion_anio=x;
     if(mesCorto== "1") {
      mesCorto="Enero";
        x= x+5;
          orientacion_th= orientacion_th +17;
          orientacion_anio = orientacion_anio +5;
  
      }
      if(mesCorto== "2") {
          mesCorto="Febrero";
          x= x+5;
          orientacion_th= orientacion_th +22;
          orientacion_anio = orientacion_anio +13;
      }
  
      if(mesCorto== "3") {
          mesCorto="Marzo";
          x=x+3;
          orientacion_th= orientacion_th +8;
          orientacion_anio = orientacion_anio;
      }
      if(mesCorto== "4") {
          mesCorto="Abril";
          orientacion_th= orientacion_th ;
          orientacion_anio = orientacion_anio -10;
      }
      if(mesCorto== "5") {
          mesCorto="Mayo";
          orientacion_th= orientacion_th ;
          orientacion_anio = orientacion_anio -10;
      }
      if(mesCorto== "6") {
          mesCorto="Junio";
          orientacion_th= orientacion_th +1 ;
          orientacion_anio = orientacion_anio -9;
      }
      if(mesCorto== "7") {
          mesCorto="Julio";
          orientacion_th= orientacion_th ;
          orientacion_anio = orientacion_anio -10;
      }
      if(mesCorto== "8") {
          mesCorto="Agosto";
          orientacion_th= orientacion_th +15;
          orientacion_anio = orientacion_anio +10;
      }
      if(mesCorto== "9") {
          mesCorto="Septiembre";
          x= x+3;
          orientacion_th= orientacion_th +36
          orientacion_anio = orientacion_anio  +27;
      }
      if(mesCorto== "10") {
          mesCorto="Obtubre";
          x= x+2;
          orientacion_th= orientacion_th +21;
          orientacion_anio = orientacion_anio  +12;
      }
      if(mesCorto== "11") {
          mesCorto="Noviembre";
          x= x+1;
          orientacion_th= orientacion_th +33;
          orientacion_anio = orientacion_anio  +24;
      }
      if(mesCorto== "12") {
          mesCorto="Diciembre";
          x= x+1;
          orientacion_th= orientacion_th +29;
          orientacion_anio = orientacion_anio  +20;
      }
      if(day > 9) {
        x= x;
          orientacion_th= orientacion_th +5;
          orientacion_anio = orientacion_anio +5;
      }
  
  
      if (day <= 9) {
          day = "0" + day;
      }
      
  
      ctx.fillText("Lima, "+ day + " "+mesCorto + " de "+anio  , x +500,  1372);
  
            //  ctx.fillText(text_th  , orientacion_th +9, 490);
      //         ctx.font = "bold 20px Open Sans";
      //  ctx.fillText(anio, orientacion_anio + 359, 672);
      ctx.font = "bold 27px Montserrat-bold";
   ctx.fillStyle ="#0a2262";
   ctx.textAlign = "center";
   ctx.fillText("ID: "+id, 530, 1400);
  
   ctx.font = "bold 40px Montserrat-bold";
   ctx.fillStyle ="#0a2262";
   ctx.textAlign = "center";
   ctx.fillText(note, 1145,936);
  
  
  
  
   //agregar qr encima de certificado
       let image1 = new Image();
         image1.src =qr_url;
    image1.onload = function() {
        ctx.drawImage(image1, 85, 1210, 200, 200);
    }
  
  
  
       image1.addEventListener("load", function() {
    // Aquí puedes realizar acciones una vez que la imagen haya terminado de cargar
     // alert("El canvas ha terminado de cargar");
  
        let imagen = document.getElementById("imagen");
      imagen.value=canvas1.toDataURL('image/jpeg');
  
  //   let oimage = document.getElementById("oimage");
  //        oimage.content=canvas1.toDataURL('image/jpeg');
  
  //  GUARDAR IMAGEN EN INPUT
  
               certificationSavePhoto(imagen.value, id,cert);
  
  
       });
  
   }
  }
  function certificationSavePhoto(id,code_certification,cert) {
      var formData = new FormData(document.getElementById("certification"));
      formData.append("id", id);
        formData.append("cert",cert);
           formData.append("code_certification",code_certification);
      axios({
              method: 'post',
              url:  "../../../certificationSavePhoto",
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
  
           //   alert('Actualiza una vez más la página para compartir');
            
          })
          .catch(function(response) {
              //handle error
              console.log(response);
          });
  
  }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  function buttons_png() {
           //gnerar png
      $(document).on("click", "#btnpng", function () {
  
      let lblpng = document.createElement('a');
              lblpng.download = "Certificado.png";
  
          lblpng.href = canvas1.toDataURL('image/jpeg');
  
  
  
  
      // var img = document.getElementById("img_certification");
      //  img.src = canvas1.toDataURL('image/jpeg');
   //   var headTag = document.getElementsByTagName('head')[0];
  
  // // Crear el elemento meta
  // var metaTag = document.createElement('meta');
  
  // // Establecer los atributos del meta tag
  // metaTag.setAttribute('property', 'og:image');
  // metaTag.setAttribute('content',  canvas1.toDataURL('image/jpeg'));
  
  // // Añadir el meta tag al elemento head
  //         headTag.appendChild(metaTag);
  
  
  
          lblpng.click();
      });
  
  
  }
  
  
  
  
  
  function buttons_pdf(canvas_id) {
  
        var canvas_id = document.getElementById(canvas_id);
  
  
  //generar pdf
  $(document).on("click","#btnpdf", function(){
      var imgData1 = canvas1.toDataURL('image/png');
      // var imgData2 = canvas2.toDataURL('image/png');
      // var imgData3 = canvas3.toDataURL('image/png');
      // var imgData4 = canvas4.toDataURL('image/png');
      // var imgData5 = canvas5.toDataURL('image/png');
      // var imgData6 = canvas6.toDataURL('image/png');
      // var imgData7 = canvas7.toDataURL('image/png');
      // var imgData8 = canvas8.toDataURL('image/png');
  
  
      var doc = new jsPDF('l', 'mm');
      doc.addImage(imgData1, 'PNG', 15, 5);
      // doc.addPage();
      // doc.addImage(imgData2, 'PNG', 15, 5);
      //  doc.addPage();
      // doc.addImage(imgData3, 'PNG', 15, 5);
      //  doc.addPage();
      // doc.addImage(imgData4, 'PNG', 15, 5);
      //  doc.addPage();
      // doc.addImage(imgData5, 'PNG', 15, 5);
      //  doc.addPage();
      // doc.addImage(imgData6, 'PNG', 15, 5);
      //  doc.addPage();
      // doc.addImage(imgData7, 'PNG', 15, 5);
      //  doc.addPage();
      // doc.addImage(imgData8, 'PNG', 15, 5);
  
      doc.save('Certificado.pdf');
  });
  }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  function certificationUpdate() {
      var formData = new FormData(document.getElementById("certification"));
      axios({
              method: 'post',
              url: 'certificationUpdate',
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
  
  
  
  
  
  function qrGenerate(id) {
  
  }
  
  function certificationOne() {
      var formData = new FormData(document.getElementById("certification"));
      axios({
              method: 'post',
              url: 'certificationOne',
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
                //datatable_load();
              let url = "certificaciones/registry_detail_id=" + id ;
              window.open(url, "_blank");
  
          })
          .catch(function(response) {
              //handle error
              console.log(response);
          });
  
  }
  
  
  
  
  
  
  
  
  function certificationDestroy(id) {
  
  if(confirm("¿Quieres eliminar este registro?")){
    var formData = new FormData(document.getElementById("certification"));
      formData.append("id",id)
      axios({
              method: 'post',
              url: 'certificationDestroy',
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
  
  function certificationShow() {
      var formData = new FormData(document.getElementById("show"));
      axios({
              method: 'post',
              url: 'certificationShow',
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
  