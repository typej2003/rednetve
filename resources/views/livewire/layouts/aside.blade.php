<div id="aside-root">
    <style>
        .sidebar-rednet { background: #ffffff; height: 100%; width: 100%; white-space: nowrap; }
        .sidebar-link { display: flex; align-items: center; padding: 12px 24px; color: #444; text-decoration: none; border-left: 4px solid transparent; transition: 0.2s; }
        .sidebar-link:hover, .sidebar-link.active { background-color: #f1fbfc; color: #009b9f; border-left-color: #009b9f; }
        .sidebar-link i { font-size: 1.3rem; min-width: 30px; margin-right: 12px; }

        /* Estado minimizado (Sincronizado con el layout) */
        .minimized .menu-text, .minimized .badge { display: none; }
        .minimized .sidebar-link { justify-content: center; padding: 12px 0; }
        .minimized .sidebar-link i { margin-right: 0; }
        .minimized .header-sidebar { justify-content: center; }
    </style>

    <div class="sidebar-rednet" id="sidebar-inner">
        <div class="header-sidebar d-flex align-items-center justify-content-between p-3">
            <p class="text-muted small fw-bold text-uppercase m-0 menu-text" style="font-size: 0.7rem;">Navegación</p>
            <button id="toggle-sidebar-pc" class="btn btn-sm d-none d-lg-block">
                <i class="bi bi-list" style="font-size: 1.5rem; color: #009b9f;"></i>
            </button>
        </div>

        <div class="py-2">
            <a href="{{ route('home') }}" class="sidebar-link {{ request()->routeIs('home') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> <span class="menu-text">Inicio</span>
            </a>

            @if(auth()->user()->role === 'admin' || auth()->user()->role === 'root')
                <a href="{{ route('admin.index') }}" class="sidebar-link {{ request()->routeIs('admin.index') ? 'active' : '' }}">
                    <i class="bi bi-shield-lock"></i> <span class="menu-text">Panel Admin</span>
                </a>
                <a href="{{ route('admin.listUsers') }}" class="sidebar-link {{ request()->routeIs('admin.listUsers') ? 'active' : '' }}">
                    <i class="bi bi-people"></i> <span class="menu-text">Usuarios</span>
                    <span class="badge rounded-pill bg-info text-dark ms-auto menu-text">{{ $totalUsuarios ?? '0' }}</span>
                </a>
            @endif

            @if(auth()->user()->role === 'cliente')
                <a href="{{ route('cliente.index') }}" class="sidebar-link {{ request()->routeIs('cliente.index') ? 'active' : '' }}">
                    <i class="bi bi-person-badge"></i> <span class="menu-text">Mi Perfil</span>
                </a>
            @endif

            <hr class="mx-3 opacity-25">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="sidebar-link border-0 bg-transparent w-100 text-start">
                    <i class="bi bi-box-arrow-left text-danger"></i> <span class="menu-text">Cerrar Sesión</span>
                </button>
            </form>
        </div>
    </div>

    <script>
        function initAsideLogic() {
            const btn = document.getElementById('toggle-sidebar-pc');
            const sidebarOuter = document.getElementById('sidebarMenu');
            const sidebarInner = document.getElementById('sidebar-inner');

            // 1. Resetear siempre en móvil para que se lea
            if (window.innerWidth < 992) {
                sidebarOuter.classList.remove('is-minimized');
                sidebarInner.classList.remove('minimized');
            } else {
                // 2. Aplicar preferencia en escritorio
                if (localStorage.getItem('sidebar-minimized') === 'true') {
                    sidebarOuter.classList.add('is-minimized');
                    sidebarInner.classList.add('minimized');
                }
            }

            if(btn) {
                btn.onclick = () => {
                    sidebarOuter.classList.toggle('is-minimized');
                    sidebarInner.classList.toggle('minimized');
                    localStorage.setItem('sidebar-minimized', sidebarInner.classList.contains('minimized'));
                };
            }
        }
        document.addEventListener('DOMContentLoaded', initAsideLogic);
        document.addEventListener('livewire:load', initAsideLogic);
    </script>
</div>