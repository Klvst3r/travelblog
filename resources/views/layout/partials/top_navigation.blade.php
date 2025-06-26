        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{  asset('img/user-profile.png') }} " alt="">{{ auth()->user()->name }}
                  </a>
                   <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        {{-- <a class="dropdown-item" href="javascript:;"> Perfil </a> --}}
                        {{-- <a class="dropdown-item" href="javascript:;"> Configuración </a> --}}
                    
                    <form action="/logout " method="POST">
                      @csrf
                      <a class="dropdown-item"  href="#" onclick="this.closest('form').submit()">
                        <i class="fa fa-sign-out pull-right"></i> Cerrar Sesión
                      </a>
                      
                    </form>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">{{ $notificaciones = 3; }}</span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    {{-- <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="../dashboard/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="../dashboard/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="../dashboard/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="../dashboard/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li> --}}
                    @for ($i = 1; $i <= $notificaciones; $i++)
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image">
                            <img src="{{  asset('img/user-profile.png') }}" alt="Profile Image" />
                          </span>
                          <span>
                            <span>{{ auth()->user()->name }}</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Notificacion  {{ $i }}...
                          </span>
                        </a>
                      </li>
                    @endfor
{{-- TODO: Notificaciones del dashboard --}}
{{-- En un fututo estas notificaciones seran dinamicas :

Por lo que proveendran de  de una colección de notificaciones o mensajes, digamos $notificaciones desde un controlador, podremos usar @foreach así:

@foreach ($notificaciones as $notificacion)
  <li class="nav-item">
    <a class="dropdown-item">
      <span class="image">
        <img src="{{ $notificacion->imagen ?? '../dashboard/images/img.jpg' }}" alt="Profile Image" />
      </span>
      <span>
        <span>{{ $notificacion->nombre ?? 'John Smith' }}</span>
        <span class="time">{{ $notificacion->tiempo ?? '3 mins ago' }}</span>
      </span>
      <span class="message">
        {{ $notificacion->mensaje ?? 'Film festivals used to be do-or-die moments for movie makers. They were where...' }}
      </span>
    </a>
  </li>
@endforeach --}}
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>Ver todas las alertas</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->