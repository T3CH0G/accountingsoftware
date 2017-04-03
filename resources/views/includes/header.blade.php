	<!-- Navigation Bar -->
	<nav class="navbar navbar-default">
		<div class="text-center navdiv">
			<div class="navdiv2"><a href=""><img src="images/logo.png" class="navlogo"></a></div> 

	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>                   
	      </button>
			</div>

			<div class="container-fluid navlink">
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav" >
				  	<li><a href="/">HOME</a></li>
					  <li><a href="works">WORKS</a></li>
					 	<li><a href="services">SERVICES</a></li>
					  <li><a href="lms">LEARN MORE</a></li>
					  <li><a href="contacts">CONTACT US</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
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
                    </ul>
		   	</div>
	   	</div>	
	  </div>
	</nav>