@include('components.header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

<div class="page">
  @include('components.menu')
    <main class="content">
        <div class="content_inner">
            <h1>Streaming Cone</h1>
            <br><br><br>
            <div class="social">
                <i class="fa fa-facebook"></i>
                <i class="fa fa-twitter"></i>
                <i class="fa fa-linkedin"></i>
                <i class="fa fa-youtube"></i>
            </div>
            <br><br>
            <div class="container">
                @foreach($videos as $video)
                    <div class="box">
                        <video controls="controls"><source src="{{ asset($video->src) }}" type="video/mp4"></video>
                        <h2>
                            <img style="align-items:center; height: 25px; width: 25px;" src="{{ asset($video->users['image']) }}">
                            <a style="text-decoration: none; color: #584e4a" href="{{ route('profile', $video->users['id'] ?? 1) }}">
                                {{ $video->users->profile['name'] ?? 'Guest' }}
                            </a>
                        </h2>
                        <h2>{{ $video->name }}</h2>
                        <p>{{ $video->desc }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script>
    // elements
    var $page = $('.page');

    $('.menu_toggle').on('click', function(){
        $page.toggleClass('shazam');
    });
    $('.content').on('click', function(){
        $page.removeClass('shazam');
    });

</script>
</body>
</html>
