<aside class="main-sidebar sidebar-dark-primary elevation-4 overflowul">
  <!-- Brand Logo -->
  <a href="/" class="brand-link">
    <img class="main-sidebar-img" src="/img/logo_rednet.png" alt="">
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @auth
        <img src="{{ auth()->user()->avatar_url }}" id="profileImage" class="img-circle elevation-2" alt="User Image">
        @endauth
      </div>
      <div class="info">
        @auth
        <a href="#" class="d-block" x-ref="username">{{ auth()->user()->name }}</a>
        {{ auth()->user()->role }}
        @endauth
      </div>
    </div>

    <!-- Sidebar Menu -->
     
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Escritorio
            </p>
          </a>
        </li>        

        @auth
          @if(auth()->user()->role == 'admin')

            <li class="nav-item">
                <a href="/uploadfile" class="nav-link {{ request()->is('uploadfile') ? 'active' : '' }}">
                <i class="nav-icon fa fa-solid fa-upload"></i>
                <p>
                    Cargar Archivo Plano
                </p>
                </a>
            </li>

            <li class="nav-item">              
                <a href="/listoperations" class="nav-link nav-link d-flex align-items-center justify-content-start {{ request()->is('listoperacions') ? 'active' : '' }}">
                <i class="nav-icon fa fa-solid fa-money-bill-wave"></i>
                <p>
                    Movimientos 
                </p>
                </a>
            </li>

            <li class="nav-item">              
                <a href="/listpagos" class="nav-link nav-link d-flex align-items-center justify-content-start {{ request()->is('listpagos') ? 'active' : '' }}">
                <i class="nav-icon fa fa-solid fa-money-bill-wave"></i>
                <p>
                    Listar Pagos 
                </p>
                </a>
            </li>
            <li class="nav-item">              
                <a href="/listreportespagos" class="nav-link nav-link d-flex align-items-center justify-content-start {{ request()->is('listreportespagos') ? 'active' : '' }}">
                <i class="nav-icon fa fa-solid fa-money-bill-wave"></i>
                <p>
                    Reportes de pagos
                </p>
                </a>
            </li>

            <li class="nav-item">
              <a href="/listTasas/1" class="nav-link {{ request()->is('listTasas') ? 'active' : '' }}">
                <i class="nav-icon fas fa-comments"></i>
                <p>
                  Tasa de cambio
                </p>
              </a>
            </li>

            <!-- Hotspot -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Arbol
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/ListHotspot" class="nav-link {{ request()->is('listHotspot') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Rama 1</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/crearTicket" class="nav-link {{ request()->is('crearTicket') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Rama 2</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- fin arbol -->
            
            <li class="nav-item">
              <a x-ref="profileLink" href="{{ route('admin.profile.edit') }}" class="nav-link {{ request()->is('admin/profile') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Perfil
                </p>
              </a>
            </li>
            <!-- arbol -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Configurar Sitio
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview nav-link-sub">
                <li class="nav-item">
                  <a href="/listTasas/1" class="nav-link {{ request()->is('listTasas') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-comments"></i>
                    <p>
                      Tasa de cambio
                    </p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ route('file-import') }}" class="nav-link {{ request()->is('file-import') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-comments"></i>
                    <p>
                        Importar Usuarios
                    </p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- fin arbol -->

            <li class="nav-item">
              <a href="{{ route('admin.settings') }}" class="nav-link {{ request()->is('admin/settings') ? 'active' : '' }}">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  Configuraciones
                </p>
              </a>
            </li>
          @endif

          @if(auth()->user()->role == 'cliente')
            <li class="nav-item">
                <a href="/consultafacturas" class="nav-link {{ request()->is('consultafacturas') ? 'active' : '' }}">
                <i class="nav-icon fa fa-solid fa-upload"></i>
                <p>
                    Consulta
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/mispagos" class="nav-link {{ request()->is('mispagos') ? 'active' : '' }}">
                <i class="nav-icon fa fa-solid fa-upload"></i>
                <p>
                    Mis Pagos
                </p>
                </a>
            </li>
          @endif          
        @endauth


        <!-- <li class="nav-item">
          <a href="{{ route('admin.messages') }}" class="nav-link {{ request()->is('admin/messages') ? 'active' : '' }}">
            <i class="nav-icon fas fa-comments"></i>
            <p>
              Messages
            </p>
          </a>
        </li> -->

        <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Salir
              </p>
            </a>
          </form>
        </li>

        <!-- arbol -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Tables
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="../tables/simple.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Simple Tables</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../tables/data.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>DataTables</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../tables/jsgrid.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>jsGrid</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- fin arbol -->
          
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
