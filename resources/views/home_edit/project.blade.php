@extends('home_edit.template')
@section('content')
<style>
    .shadowed-text {
        text-shadow: 1px 1px 1px #000000;
        /* Contorno sombreado */
    }

    .transparencia_cabecera_md {


        /* Ajuste opcional */
        mask-image: linear-gradient(to top, #000000 10%, transparent 100%);

        /* -webkit-mask-image: linear-gradient(to top, #000000 60%, transparent 100%); */
    }

    .transparencia_cabecera_xl {


        /* Ajuste opcional */
        mask-image: linear-gradient(to top, #000000 70%, transparent 100%);

        /* -webkit-mask-image: linear-gradient(to top, #000000 60%, transparent 100%); */
    }
</style>

<style>
    .card-hover {
        position: relative;
        width: 300px;
        height: 350px;
        overflow: hidden;
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-hover img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: opacity 0.3s ease;
    }

    .card-hover:hover img {
        opacity: 0;
    }

    .card-hover .hover-content {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: white;
        color: black;
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .card-hover:hover .hover-content {
        opacity: 1;
    }

    .card-hover .button {
        position: absolute;
        bottom: 20px;
        right: 20px;
        width: 50px;
        height: 50px;
        background-color: rgb(255, 255, 255);
        border: solid 3px #ffcc00;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .card-hover .button:hover {
        background-color: #ffffff;
    }

    .card-hover .button:hover .arrow {
        transform: rotate(45deg);
    }

    .arrow {
        display: block;

        width: 16px;
        height: 16px;
        border-right: 3px solid #ffcc00;
        border-top: 3px solid #ffcc00;
        transform: rotate(+0deg);
        transition: transform 0.3s ease;
    }
</style>
<style>
    .modal-backdrop {
        background-color: transparent !important;
        /* Fondo del overlay completamente transparente */
    }
</style>
@endsection
