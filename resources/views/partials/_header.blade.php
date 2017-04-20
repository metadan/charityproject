<header>
	<div class="main-header">
        <!---<div class="container">-->
         <div class="row">
            <div class="col-md-5">
        	  <h1> <a href="{{ url('/') }}"><img src="/images/asandwhenlogo.png" alt="Logo"></a> As and When </h1>
        	  <h2> </a> Contribute to community in your convenient time!</h2>
          </div>
    	   <div class="login-header col-md-3 col-md-offset-4">
    	   @if (Auth::guest())
       			<a href="{{ url('/login') }}">Login | </a>
                <a href="{{ url('/register') }}">Sign up</a>
           @else

                <div class="btn-group">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                   	    {{ Auth::user()->name }}<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('home') }}">Contributions/Inquiries</a></li>
                        <li><a href="{{ url('account') }}">Account</a></li>
                        <li><a href="{{ url('settings') }}">Settings</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('logout') }}"
        					onclick="event.preventDefault();
                         	document.getElementById('logout-form').submit();">
                            Logout
                            </a>
                        </li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div> 
            @endif
            </div>
        </div> 
	   </div> 
    </div>
</header>
