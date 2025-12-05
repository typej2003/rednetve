<aside class="main-sidebar sidebar-dark-primary elevation-4 overflowul">
  <!-- Brand Logo -->
  <a href="/" class="brand-link bg-white">
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

        <li class="nav-item">
          <a href="{{ route('timeOut') }}" class="nav-link {{ request()->is('timeOut') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Tiempo de sesión
            </p>
          </a>
        </li>

        @auth
          @if(auth()->user()->role == 'admin')

            <li class="nav-item">
                <a href="/listPagomovil" class="nav-link {{ request()->is('listPagomovil') ? 'active' : '' }}">
                <i class="nav-icon fas fa-comments"></i>
                <p>
                    Pago Móvil
                </p>
                </a>
            </li>
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

                <li class="nav-item">
                  <a href="{{ route('admin.users') }}" class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                      Usuarios
                    </p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- fin arbol -->

            
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
