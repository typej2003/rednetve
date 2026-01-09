    <style>
        /* Contenedor Principal del Sidebar */
        .sidebar-rednet {
            background: #ffffff;
            height: 100vh;
            width: 260px; /* Ancho original */
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-right: 1px solid #eee;
            overflow-x: hidden;
            white-space: nowrap;
            position: sticky;
            top: 0;
        }

        /* ESTADO MINIMIZADO */
        .sidebar-rednet.minimized {
            width: 80px;
        }

        /* Estilo de los Enlaces */
        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 12px 24px;
            color: #444;
            text-decoration: none;
            font-weight: 500;
            transition: 0.2s;
            border-left: 4px solid transparent;
            cursor: pointer;
        }

        .sidebar-link:hover {
            background-color: #f1fbfc;
            color: #009b9f;
        }

        .sidebar-link.active {
            background-color: #f1fbfc;
            color: #009b9f;
            border-left-color: #009b9f;
            font-weight: 600;
        }

        .sidebar-link i { 
            font-size: 1.3rem; 
            min-width: 30px; /* Asegura que el icono no se mueva */
            margin-right: 12px; 
            transition: margin 0.3s;
        }

        /* Ajustes cuando está Minimizado */
        .sidebar-rednet.minimized .sidebar-link {
            padding: 12px 0;
            justify-content: center;
        }

        .sidebar-rednet.minimized .sidebar-link i {
            margin-right: 0;
            font-size: 1.5rem;
        }

        .sidebar-rednet.minimized .menu-text,
        .sidebar-rednet.minimized .badge {
            display: none;
        }

        /* Cabecera del Sidebar */
        .header-sidebar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 24px;
            min-height: 60px;
        }

        .sidebar-rednet.minimized .header-sidebar {
            justify-content: center;
            padding: 20px 0;
        }

        #toggle-sidebar {
            background: none;
            border: none;
            color: #009b9f;
            cursor: pointer;
            padding: 5px;
            border-radius: 5px;
            transition: background 0.2s;
        }

        #toggle-sidebar:hover {
            background: #f1fbfc;
        }
    </style>

    <div class="sidebar-rednet" id="sidebar">
        <div class="header-sidebar">
            <p class="text-muted small fw-bold text-uppercase m-0 menu-text" style="font-size: 0.7rem; letter-spacing: 1px;">
                Navegación
            </p>
            <button id="toggle-sidebar" title="Expandir/Contraer">
                <i class="bi bi-list" style="font-size: 1.5rem;"></i>
            </button>
        </div>

        <div class="py-2">
            <a href="{{ route('home') }}" class="sidebar-link {{ request()->routeIs('home') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> 
                <span class="menu-text">Inicio</span>
            </a>

            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.index') }}" class="sidebar-link {{ request()->routeIs('admin.index') ? 'active' : '' }}">
                    <i class="bi bi-shield-lock"></i> 
                    <span class="menu-text">Panel Admin</span>
                </a>
                
                <a href="{{ route('admin.listUsers') }}" class="sidebar-link {{ request()->routeIs('admin.listUsers') ? 'active' : '' }}">
                    <i class="bi bi-people"></i> 
                    <span class="menu-text">Usuarios</span>
                    <span class="badge rounded-pill bg-info text-dark menu-text">{{ $totalUsuarios ?? '0' }}</span>
                </a>

                <a href="{{ route('listacitas') }}" class="sidebar-link {{ request()->routeIs('listacitas') ? 'active' : '' }}">
                    <i class="bi bi-people"></i> 
                    <span class="menu-text">Listar Citas</span>
                    <span class="badge rounded-pill bg-info text-dark menu-text">{{ $totalCitas ?? '0' }}</span>
                </a>
            @endif

            @if(auth()->user()->role === 'cliente')
                <a href="{{ route('cliente.index') }}" class="sidebar-link {{ request()->routeIs('cliente.index') ? 'active' : '' }}">
                    <i class="bi bi-person-badge"></i> 
                    <span class="menu-text">Mi Perfil</span>
                </a>
                <a href="/consultafacturas" class="sidebar-link">
                    <i class="bi bi-receipt"></i> 
                    <span class="menu-text">Mis Facturas</span>
                </a>
            @endif

            <hr class="mx-3 text-muted opacity-25">
            
            <form method="POST" action="{{ route('logout') }}" id="logout-sidebar">
                @csrf
                <button type="submit" class="sidebar-link border-0 bg-transparent w-100 text-start">
                    <i class="bi bi-box-arrow-left"></i> 
                    <span class="menu-text">Cerrar Sesión</span>
                </button>
            </form>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const btnToggle = document.getElementById('toggle-sidebar');
        const wrapper = document.getElementById('wrapper');
        const sidebar = document.getElementById('sidebar'); // El div del Aside

        // Cargar estado guardado
        if (localStorage.getItem('sidebar-minimized') === 'true') {
            wrapper.classList.add('sidebar-minimized');
            sidebar.classList.add('minimized');
        }

        btnToggle.addEventListener('click', function () {
            // Cambiamos la clase en ambos para que el layout reaccione
            wrapper.classList.toggle('sidebar-minimized');
            sidebar.classList.toggle('minimized');
            
            // Guardar preferencia
            const isMinimized = wrapper.classList.contains('sidebar-minimized');
            localStorage.setItem('sidebar-minimized', isMinimized);
        });
    });
</script>