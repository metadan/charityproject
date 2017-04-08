<header>
	<div class="main-header">
	  <h1> <a href="{{ url('/') }}"><img src="/images/asandwhenlogo.png" alt="Logo"></a> As and When </h1>
	  <h2> </a> Contribute to community in your convenient time!</h2>
	</div>
	<div class="login-header">
	   @if (Auth::guest())
	   			<a href="{{ url('/login') }}">Login | </a>
                <a href="{{ url('/register') }}">Sign up</a>
       @else
                <li class="dropdown">
                	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                   	{{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('logout') }}"
        					onclick="event.preventDefault();
                         	document.getElementById('logout-form').submit();">
                            Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                        
       @endif
	</div> 
</header>
