@extends("home.template")
@section("content")
    
 <!-- Sección completa -->
 <section class=" bg-dark text-white">
    <!-- Barra lateral -->
  
    <!-- Contenido central -->
    <div class="container-fluid py-5">
      <div class="row justify-content-center align-items-center text-center" style="height: 300px;">
        <h1 class="fw-bold">PORTADA</h1>
      </div>
    </div>
   
  </section>

  <section class="  text-white" style="background-color: #F6A42C">
  <div class="container BG-WA ">
    <div class="row justify-content-center align-items-center text-center" style="height: 100px;">
      <h2 style="word-spacing: 8px;letter-spacing:2px">NOTICIAS RELACIONADAS</h2>
    </div>
  </div>
</section>


<style>
    /* Estilos personalizados */
    .left-panel {
      background-color: #FFA500; /* Fondo naranja */
      color: #003b47; /* Texto azul oscuro */
      border-radius: 15px;
      padding: 30px;
    }
    .left-panel img {
      width: 100%;
      border-radius: 10px;
    }
    .form-container {
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Sombra ligera */
      padding: 30px;
      border-radius: 15px;
      background-color: white;
    }
    .form-control:focus {
      box-shadow: 0 0 5px rgba(255, 165, 0, 0.5); /* Enfoque en campos */
      border-color: #FFA500;
    }
    .btn-custom {
      background-color: #FFA500;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
    }
    .btn-custom:hover {
      background-color: #FF8C00; /* Naranja más oscuro en hover */
    }
  </style>

  <div class="container py-5">
    <div class="row g-4">
      <!-- Panel izquierdo -->
      <div class="col-md-5">
        <div class="left-panel text-center">
          <h4 class="fw-bold">CONTÁCTANOS A UN PASO DE OBTENER TU LOTE IDEAL</h4>
          <p>
            Selecciona la opción por la que quieres comunicarte con nosotros y muy pronto nos pondremos en contacto contigo.
          </p>
          <img src="https://via.placeholder.com/300x200" alt="Imagen de contacto">
        </div>
      </div>
      <!-- Formulario -->
      <div class="col-md-7">
        <div class="form-container">
          <form>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" id="username" class="form-control" placeholder="Enter email or username">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" id="email" class="form-control" placeholder="Enter your email">
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone</label>
              <div class="input-group">
                <input type="tel" id="phone" class="form-control" placeholder="Enter phone number">
                <button class="btn btn-outline-warning" type="button">Verify</button>
              </div>
            </div>
            <div class="mb-3">
              <label for="personal-id" class="form-label">Personal ID Number</label>
              <div class="input-group">
                <input type="text" id="personal-id" class="form-control" placeholder="Enter your ID">
                <button class="btn btn-outline-warning" type="button"><i class="bi bi-gear"></i></button>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Gender</label>
              <div class="d-flex align-items-center">
                <div class="form-check me-3">
                  <input type="radio" id="male" name="gender" class="form-check-input">
                  <label for="male" class="form-check-label">Male</label>
                </div>
                <div class="form-check">
                  <input type="radio" id="female" name="gender" class="form-check-input">
                  <label for="female" class="form-check-label">Female</label>
                </div>
                <div class="form-check form-switch ms-3">
                  <input class="form-check-input" type="checkbox" id="switchCheck">
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Write Anything</label>
              <textarea id="message" class="form-control" rows="3" placeholder="Enter your text here"></textarea>
            </div>
            <div class="mb-3">
              <label for="options" class="form-label">Select an option below</label>
              <select id="options" class="form-select">
                <option value="">Select Options</option>
                <option value="option1">Option 1</option>
                <option value="option2">Option 2</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="date" class="form-label">Choose a Date</label>
              <input type="date" id="date" class="form-control">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" id="terms" class="form-check-input">
              <label for="terms" class="form-check-label">
                In publishing and graphic design, Lorem ipsum is a placeholder text.
              </label>
            </div>
            <button type="submit" class="btn btn-custom w-100">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5517.423605390836!2d-76.96942789923634!3d-12.084221111291818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c7ab490a4b17%3A0x50acc369406d2e3f!2sPatio%20Panorama!5e0!3m2!1ses-419!2spe!4v1733250273914!5m2!1ses-419!2spe" 
  width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
   referrerpolicy="no-referrer-when-downgrade"></iframe>


@endsection