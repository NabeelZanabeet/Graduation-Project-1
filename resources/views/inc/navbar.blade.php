<nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <img src="Images/LogoIconInv.png"  width="3%" hight="3%">
        <pre> </pre>
        <a class="navbar-brand" href="/"> PLAP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
       
        <div class="collapse navbar-collapse" id="navbarsExampleDefault"align="center">
             
          <ul class="navbar-nav mr-auto " >
              <!--LINKS-->
             <pre>                                                      </pre>
            
            <li class="nav-item white">
              <a class="nav-link" href="/">
                 <div class="white">
                     <i class="fa fa-home fa-lg" aria-hidden="true"></i> Home
                 </div>
              </a>
            </li>
      
            <li class="nav-item white">
                <a class="nav-link " href="/post">
                    <div class="white">
                      <i class="fa fa-sliders fa-lg" aria-hidden="true"></i> Posts
                    </div>
                </a>
            </li>

            <li class="nav-item white">
                <a class="nav-link " href="/about">
                    <div class="white">
                      <i class="fa fa-info fa-lg" aria-hidden="true"></i> About
                    </div>
                </a>
            </li>
            <!--
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
            -->
             <!--Dropdown-->
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
          </ul>
        
        
          <ul class="nav navbar-nav navbar-right">
              <!-- Authentication Links/ check if a guest -->
              @guest
                  <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
              @else
                  <li class="nav-item dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <ul class="dropdown-menu">
                          <li> <a href="/dashboard">Dashboard</a></li>
                          <li>
                              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                  Logout
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                          </li>
                      </ul>
                  </li>
              @endguest
          </ul>
         <!-- 
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form> 
          -->
        </div>
      </nav>
  