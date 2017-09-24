  
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  @if(Auth::guest())
  <a class="navbar-brand" href="{{ ('/') }}">Inicio</a>
  @endif
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      @if(!Auth::guest())
        <li class="nav-item active">
          <a class="nav-link" href="{{route('accounts.index')}}">Mis cuentas<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{route('myprofile.index')}}">Mi perfil<span class="sr-only">(current)</span></a>
        </li>
      @endif
    </ul>

    @if(Auth::guest())
    <ul class="navbar-nav ml-auto">
     <li class="nav-item active">
        <a class="nav-link" href="{{ '/login' }}">Ingresar<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ '/register' }}">Regístrate<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    @else
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a  class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ Auth::user()->name }} <span class="caret"></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-right myDrop" role="menu">
          <li>
            <a class="myA" href="{{ url('/logout') }}">Salir</a>
          </li>
        </ul>
      </li>
    </ul>
    @endif
  </div>
</nav>
