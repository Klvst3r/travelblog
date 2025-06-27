        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="mb-4" style="border: 0;">
              
            </div>

            <div class="clearfix"></div>

            <!-- Perfil institucinal  -->
            <div style="display: flex; justify-content: center; align-items: center; flex-direction: column;" class="profile clearfix">
                <a href="#" >
                        <img src="{{ asset('img/logo.png') }}" width="200px;" alt="{{ config('app.title') }}" style="max-height: 4rem;">
                </a>
                    </div>

            <div class="profile clearfix">
              <h2 class="tsj-text" style="padding: 0.1rem; text-align: center;">{{ config('app.title') }}</h2>
              <div class="profile_pic">
                <img src="{{ asset('img/user-profile.png') }}" alt="Usuario en linea" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>{{ auth()->user()->email }}</h2>
              </div>
            </div>
            <!-- /Perfil institucional -->

            <br />

            <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                  <ul class="nav side-menu">
                      <li><a><i class="fa fa-home"></i> Inicio <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                              <li><a href="home">Dashboard</a></li>
                          </ul>
                      </li>
                      <li><a><i class="fa fa-edit"></i> Blog <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                              <li><a href="{{ route('home') }}">Ver todos los Post</a></li>
                              <li><a href="form_advanced.html"> Concepto </a></li>
                              <li><a href="form_validation.html"> Pertenece </a></li>
                              <li><a href="form_wizards.html"> Estado </a></li>
                              <li><a href="form_upload.html"> Áreas </a></li>
                              <li><a href="form_buttons.html"> Personal </a></li>
                              <li><a href="form_buttons.html"> Categoría </a></li>
                              <li><a href="form_buttons.html"> Ubicaciones </a></li>
                              <li><a href="form_buttons.html"> Unidad de Medida </a></li>
                          </ul>
                      </li>
                      <li><a><i class="fa fa-desktop"></i> Inventario <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                              <li><a href="general_elements.html">Padrón de Bienes</a></li>
                              <li><a href="media_gallery.html">Etiquetar</a></li>
                              <li><a href="typography.html">Bienes asignados</a></li>
                              <li><a href="icons.html">Bienes no asignados</a></li>
                              <li><a href="glyphicons.html">Historial de baja</a></li>
                          </ul>
                      </li>
                      <li><a><i class="fa fa-map"></i> Terrenos <span class="fa fa-chevron-down"></span></a>
                      </li>

                      <li><a><i class="fa fa-exclamation-circle"></i>Bienes Extraviados <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                              <li><a href="fixed_sidebar.html">Padrón de bienes</a></li>
                          </ul>
                      </li>

                      <li><a><i class="fa fa-bar-chart"></i> Depreciación <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                              <!-- Falta por definir menú, modulo no contemplado inicialmente -->
                          </ul>
                      </li>
                      <li><a><i class="fa fa-search"></i> Transparencia <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                              <!-- Falta por definir menú, modulo no contemplado inicialmente -->
                          </ul>
                      </li>
                      <li><a><i class="fa fa-users"></i> Usuarios<span class="fa fa-chevron-down"></span></a>
                      </li>
                  </ul>
              </div>

          </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              
              
              <a href="#" id="btnDarkMode" data-toggle="tooltip" data-placement="top" title="Dark Mode">
                <span class="glyphicon glyphicon-adjust" aria-hidden="true"></span>
              </a>


              <a href="#" id="btnFullscreen" data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span id="fullscreenIcon" class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
            

              <a href="{{ url('/lockscreen') }}" data-toggle="tooltip" data-placement="top" 
                title="Bloquear pantalla">  <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>


              <form id="logout-form-bottom" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="#" onclick="event.preventDefault(); document.getElementById('logout-form-bottom').submit();">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        {{-- -------------------- --}}