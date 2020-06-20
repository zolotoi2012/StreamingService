@include('components.header')
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/templatemo-blue.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
<body data-spy="scroll" data-target=".navbar-collapse">

<!-- preloader section -->
<div class="preloader">
    <div class="sk-spinner sk-spinner-wordpress">
        <span class="sk-inner-circle"></span>
    </div>
</div>

<div class="page">
    @include('components.menu')

    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <img src="{{ asset($profile->users->image) }}" class="img-responsive img-circle tm-border" style="width: 250px; height: 250px;" alt="templatemo easy profile">
                    <hr>
                    <h1 class="tm-title bold shadow">Hi, I am {{ $profile->name }}</h1>
                    <a href="/" style="text-decoration: none; color: white;">Back to Homepage</a>
                </div>
            </div>
        </div>
    </header>

    <!-- contact and experience -->
    <section class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="contact">
                    <h2>Contact</h2>
                    <p><i class="fa fa-map-marker"></i> {{ $profile->address }}</p>
                    <p><i class="fa fa-phone"></i> {{ $profile->number }}</p>
                    <p><i class="fa fa-envelope"></i> {{ $profile->telegram }}</p>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="education">
                    <h2 class="white">About this channel</h2>
                    <div class="education-content">
                        <div class="education-school">
                            <h5>Created date</h5><span></span>
                            <h5>{{ $profile->users->created_at }}</h5>
                        </div>
                        <h4 class="education-title accent">{{ $profile->description }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="row">
            <div class="container-video">
                @foreach ($profile->users->videos as $video)
                    <div class="box">
                        <video controls="controls"><source src="{{ asset($video->src) }}" type="video/mp4"></video>
                        <h2>{{ $video->name }}</h2>
                        <p>{{ $video->desc ?? 'Description' }}</p>
                        @if ($profile->user_id === \Illuminate\Support\Facades\Auth::id())
                            <form id="delete-form" action="{{ route('video-delete', $video) }}" method="POST">
                                @csrf
                                <input class="btn btn-danger form-group" type="submit" value="Delete">
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif

    @if ($profile->user_id === \Illuminate\Support\Facades\Auth::id())
        @include('components.modal')
    @endif

    <!-- footer section -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <p>Copyright &copy; 2020 Maxim Mamitko </p>
                    <ul class="social-icons">
                        <li><a href="#" class="fa fa-facebook"></a></li>
                        <li><a href="#" class="fa fa-google-plus"></a></li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-dribbble"></a></li>
                        <li><a href="#" class="fa fa-github"></a></li>
                        <li><a href="#" class="fa fa-behance"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- javascript js -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.backstretch.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
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
