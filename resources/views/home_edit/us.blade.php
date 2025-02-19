@extends('home_edit.template')
@section('content')








   






<p></p>
<style>
    .bg-responsive {
        background-image: url('../../resource/1738348658_679d1872b2f44portada-nosotros-escritorio.jpg');
        height:82vh;
        background-size: cover;
        /* height: 85vh; */
    }

    /* Para pantallas medianas (tablets) */
    @media (max-width: 987px) {
        .bg-responsive {
            height:82vh;
            background-size: cover;
            background-image: url('../../resource/1738431952_679e5dd0a6af6portada-nosotros-tablet.jpg');
        }
    }

    /* Para pantallas pequeñas (móviles) */
    @media (max-width: 575px) {
        .bg-responsive {
            height:52vh;
            width: 100%;
            background-size: cover;
            background-image: url('../../resource/1738431887_679e5d8fb6295portada-nosotros-celular.jpg');
        }
    }
</style>

    <script>
        document.querySelectorAll('.accordion-collapse').forEach(collapse => {
            collapse.addEventListener('show.bs.collapse', function() {
                const content = collapse.getAttribute('data-content');
                document.getElementById('dynamicContent').innerText = ` ${content}`;
            });
        });
    </script>
@endsection
