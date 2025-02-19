@extends("home_edit.template")
@section("content")
    



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

 



@endsection