<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
          @foreach($pages as $row)                            
            
              @if(count($row->subpage) == 0)
                  <li class="nav-item active">
                    <a class="nav-link" href="{{ $row->url?url($row->url) :$row->slug }}" target="_blank">{{ $row->title }}</a>
                  </li>
              @else
                  @php $parent_title = $row->title @endphp                 
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      {{ $parent_title }}
                    </a>
                    <div class="dropdown-menu bg-nav-red" aria-labelledby="navbarDropdown">
                        @foreach($row->subpage as $row)   
                          <a class="dropdown-item" href="{{ $row->url? url($row->url) :$row->slug }}">{{ $row->title }}</a>
                        @endforeach
                    </div>
                  </li>                 
              @endif

          @endforeach     
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="form-inline navbar-nav">
          <!-- Authentication Links -->
          @guest
              {{-- <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="/admin/user/create">{{ __('Register') }}</a>
                  </li>
              @endif --}}
          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link" href="/admin" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fa fa-tachometer" aria-hidden="true"></i> {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div> --}}
              </li>
          @endguest
      </ul>
    </div>
  </nav>