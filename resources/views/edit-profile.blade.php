@include('components.header')
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/templatemo-blue.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/component.css') }}">
<body data-spy="scroll" data-target=".navbar-collapse">

<!-- preloader section -->
<div class="preloader">
    <div class="sk-spinner sk-spinner-wordpress">
        <span class="sk-inner-circle"></span>
    </div>
</div>

<div class="page">
    @include('components.menu')

    <form action="{{ route('update', $user->id) }}" method="POST">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @csrf
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <img src="{{ asset($user->image) }}" class="img-responsive img-circle tm-border" style="width: 250px; height: 250px;" alt="templatemo easy profile">
                        <hr>
                    </div>
                    <div style="left: 43%;" class="input-group">
                        <input type="file" name="avatar" id="file" class="inputfile" />
                        <label for="file">Choose a file</label>
                    </div>
                    <div style="left: 40%;" class="input-group">
                        <input type="text" name="name" class="input-lg" value="{{ $user->profile->name }}" placeholder="{{ $user->profile->name ?? 'Guest' }}">
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
                        <label>Address <i class="fa fa-map-marker"></i>
                            <p><input class="input-lg" name="address" value="{{ $user->profile->address }}" placeholder="{{ $user->profile->address }}"></p>
                        </label>
                        <label>Phone <i class="fa fa-phone"></i>
                            <p><input class="input-lg" name="number" value="{{ $user->profile->number }}" placeholder="{{ $user->profile->number }}"></p>
                        </label>
                        <label>Telegram <i class="fa fa-linkedin"></i>
                            <p><input class="input-lg" name="telegram" value="{{ $user->profile->telegram }}" placeholder="{{ $user->profile->telegram }}"></p>
                        </label>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12">
                    <div class="education">
                        <h2 class="white">About this channel</h2>
                        <div class="education-content">
                            <div class="education-school">
                                <h5>Created date</h5><span></span>
                                <h5>{{ $user->created_at }}</h5>
                            </div>
                            <div class="form-group">
                                <label>Description
                                    <textarea class="form-control" rows="3" name="description" style="color: grey; width: 650px; height: 150px;">{{ $user->profile->description }}</textarea>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="submit" class="btn btn-primary btn-edit" value="Update Profile">
                <style>
                    .btn-edit {
                        background: black;
                        color: white;
                        border-radius: 1em;
                        padding: 1em;
                        position: absolute;
                        top: 85%;
                        left: 50%;
                        margin-right: -50%;
                        transform: translate(-50%, -50%)
                    }
                </style>
            </div>
        </section>
    </form>
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
