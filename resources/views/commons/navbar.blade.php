<header>
  
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                           @if (Auth::check())
                        
                             <a class="navbar-left" href="/user" id="toop">Medium-Rare </a>
                
                    @else
                         <a class="navbar-left" href="/" id="toop">Medium Rare </a>
             
                    @endif
               
              
                
            </div>
            
           
        
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                        <li>
                             <a href="{{ route('shops.create') }}">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                Search Restaurants
                              </a>
                        </li>
                        
                               
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="gravatar">
                                    <img src="{{ Gravatar::src(Auth::user()->email, 20) . '&d=mm' }}" alt="" class="img-circle">
                                </span>
                                {{ Auth::user()->name }}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                            
                                <li>
                                    <a href="{{ route('logout.get') }}">Log Out</a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <!--<li><a href="{{ route('signup.get') }}">Sign Up</a></li>-->
                        <!--<li><a href="{{ route('login') }}">Log In</a></li>-->
                    @endif
                </ul>
            </div>
        </div>
    </nav>
 
</header>