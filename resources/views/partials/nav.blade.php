<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Lara!</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

          <ul class="nav navbar-nav">
            <li><a href="/articles">Articles</a></li>
            
          </ul>
          
          @if (Auth::check())
          
            <ul class="nav navbar-nav">
              <li><a href="/articles/create">New Article</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right ">
              <li><a href="/auth/logout">Logout</a></li>
            </ul>
            @else
            <ul class="nav navbar-nav navbar-right ">
              <li><a href="/auth/login">Login</a></li>
              <li><a href="/auth/register">Register</a></li>
            </ul>
          
          @endif


          
            
          </ul>
        </div>
        </div>
        </nav>       