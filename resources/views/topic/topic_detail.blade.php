@extends("production.1")
@section("content")


<section class="  text-white" style="background-color: #F6A42C">
  <div class="container BG-WA ">
      <div class="row justify-content-center pt-1 align-items-center text-center" style="height: 80px;">
          <h3 style="word-spacing: 8px;letter-spacing:2px">
            {{ strtoupper($topic->description)}}</h3>
      </div>
  </div>
</section>

    <div class="py-y container">
    <p></p>
    @foreach ($topic->categoryDetail as $item)
    <span class="mb-1 badge text-bg-success">{{$item->category->description}}</span>
    @endforeach
      @php
      echo $topic->post;
    @endphp

<script>
  topicPublic()
</script>
<div class="container row py-5" id="mycontent">

</div>


<div id="disqus_thread"></div>
<script>
    /**
     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document,
            s = d.createElement('script');
        s.src = 'https://ayba-corp.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a
        href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    </div>



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