@extends('home_demo.template')
@section('content')
    @php
        $i = 0;
    @endphp
    @foreach ($section as $sections)
        @php
            $i = $i + 1;
            echo $sections->code;
        @endphp
    @endforeach


















    <style>
        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }

        .card img {
            height: 100%;
            object-fit: cover;
        }

        .card-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 20px;
            transition: background 0.3s;
        }

        .card:hover .card-overlay {
            background: rgba(0, 0, 0, 0.8);
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 1rem;
        }
    </style>
    <style>
        .card {
            position: relative;
            overflow: hidden;
            /* Asegura que los elementos no desborden */
            mask-image: linear-gradient(to bottom, #ffffff 70%, transparent 100%);
            -webkit-mask-image: linear-gradient(to bottom, #ffffff 70%, transparent 100%);
            height: 500px;

        }

        /* Asegura que el degradado no cambie en hover */
        .card:hover {
            mask-image: linear-gradient(to bottom, #000000 90%, transparent 100%);
            -webkit-mask-image: linear-gradient(to bottom, #000000 90%, transparent 100%);

        }

        /* Si quieres que las imágenes se mantengan constantes en hover */
        .card-img {
            transition: transform 0.3s ease;
            /* Agrega transición a la imagen */
        }

        .card:hover .card-img {
            transform: scale(1.1);
            /* Opcional: ligero zoom de la imagen */
        }
    </style>





    <p></p>




    <script>
        document.querySelectorAll('.accordion-collapse').forEach(collapse => {
            collapse.addEventListener('show.bs.collapse', function() {
                const content = collapse.getAttribute('data-content');
                document.getElementById('dynamicContent').innerText = ` ${content}`;
            });
        });
    </script>
@endsection
