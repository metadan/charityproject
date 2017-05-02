<header>
	<div class="main-header">
        <!---<div class="container">-->
         <div class="row">
            <div class="col-md-5 logo-header">
        	       <h1> <a href="{{ url('/') }}"><img src="/images/asandwhenlogo.png" alt="Logo"></a> As and When </h1>
        	  <h2> </a> Contribute to community in your convenient time!</h2>
          </div>
    	   <div class="login-header col-md-3 col-md-offset-3">
    	   @if (Auth::guest())
       			<a href="{{ url('/login') }}">Login | </a>
                <a href="{{ url('/register') }}">Sign up</a>
           @else

                <div class="btn-group">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                   	    {{ Auth::user()->name }}<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('home') }}">Home</a></li>
                        <li><a href="{{ url('myprofile') }}">Profile</a></li>
                        <li><a href="{{ url('home/contributions') }}">My Contributions</a></li>
                        <li><a href="{{ url('home/inquiries') }}">My Inquiries</a></li>
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
