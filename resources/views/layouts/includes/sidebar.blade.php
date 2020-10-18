<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
  <div class="container-fluid">
    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Brand -->
    <a class="navbar-brand pt-0" href="">
      <img src="{{asset('admin/assets/img/brand/logo_amn.png')}}">
    </a>      
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
    <!-- Collapse header -->        
    <!-- Navigation -->
    <ul class="navbar-nav">
      <li class="nav-item  class=" active>
        <a class=" nav-link active " href="{{ route('cuties.index')}}">
           <i class="ni ni-tv-2 text-orange"> </i> List Cuti
        </a>
      </li>       
      @if (Auth::user()->role == 'admin')
      <a class=" nav-link active " href="{{ route('account.index')}}"> 
        <i class="ni ni-single-02 text-orange"> </i> Data User
      </a>          
      @endif           
        </a>
      </li>                  
    </ul>       
    </div>
  </div>
</nav>