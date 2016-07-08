
<nav class="navbar navbar-inverse">
        <div class="container">
           <div class="row">
                
            <div class="nav navbar-left">
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/tasks') }}">
                    <img src="{{ url('img/k.png')}}" alt="">
                </a>
            </div>
                
            

            @if (!Auth::guest())

            @include('layouts.search')

            @endif

                
   

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li>
                    <a href="{{ url('/login') }}">Sign in</a>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>

            
        </div>
    </div>
</nav>
