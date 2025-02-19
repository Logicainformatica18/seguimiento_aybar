@extends("home_edit.template")
@section("content")
    


<style>
    /* Personalización de las tarjetas */
    .custom-card {
      border: none;
      border-radius: 15px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Sombra inicial */
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .custom-card:hover {
      transform: translateY(-5px); /* Elevar la tarjeta en hover */
      box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2); /* Incrementar sombra */
    }

    .custom-btn {
      background-color: #FFA500; /* Botón naranja */
      border: none;
      border-radius: 25px;
      color: white;
      padding: 8px 20px;
      font-weight: bold;
      text-transform: uppercase;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    }

    .custom-btn:hover {
      background-color: #FF8C00; /* Naranja más oscuro en hover */
    }
  </style>



@endsection