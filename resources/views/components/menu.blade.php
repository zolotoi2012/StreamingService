@section('menu')
      <span class="menu_toggle">
        <i class="menu_open fa fa-bars fa-lg"></i>
        <i class="menu_close fa fa-times fa-lg"></i>
      </span>
        <ul class="menu_items">
            @if (\Illuminate\Support\Facades\Auth::id() === null)
                <li><a href="/login"><i class="icon fa fa-sign-in fa-2x"></i> Sign In</a></li>
            @else
                <li><a href="{{ route('profile', \Illuminate\Support\Facades\Auth::id()) }}"><i class="icon fa fa-sign-in fa-2x"></i> My Profile</a></li>
                <li><a href="{{ route('edit-profile', \Illuminate\Support\Facades\Auth::id()) }}"><i class="icon fa fa-edit fa-2x"></i> Edit Profile</a></li>
                <li><a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="icon fa fa-sign-out fa-2x"></i>Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endif
        </ul>
@endsection

@yield('menu')
