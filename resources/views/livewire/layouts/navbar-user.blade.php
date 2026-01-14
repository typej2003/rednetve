<nav class="navbar fixed-top bg-white border-bottom shadow-sm px-3 px-md-4" style="height: var(--navbar-height); z-index: 1040;">
    <div class="container-fluid d-flex align-items-center justify-content-between p-0">
        
        <div class="d-flex align-items-center">
            <button class="btn btn-light d-lg-none me-2 btn-hamburguesa-movil" 
                    onclick="window.dispatchEvent(new CustomEvent('toggleSidebar'))">
                <i class="bi bi-list fs-3"></i>
            </button>
            
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/logo_rednet.png') }}" style="max-height: 40px;" alt="Logo">
            </a>
        </div>

        <div class="d-flex align-items-center pe-2">
            <div class="dropdown">
                @auth
                    <a class="nav-link dropdown-toggle d-flex align-items-center p-0 text-dark" href="#" id="userDropBtn">
                        <img src="{{ auth()->user()->avatar_url }}" class="rounded-circle me-2" style="width: 32px; height: 32px; object-fit: cover; border: 1px solid #ddd;">
                        <span class="d-none d-sm-inline">{{ auth()->user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end shadow border-0" id="userDropMenu" style="display: none; position: absolute; right: 0; margin-top: 10px;">
                        <li><a class="dropdown-item py-2" href="/admin/panel"><i class="bi bi-speedometer2 me-2"></i> Escritorio</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" id="logout-nav">
                                @csrf 
                                <button type="submit" class="dropdown-item text-danger py-2"><i class="bi bi-box-arrow-right me-2"></i> Salir</button>
                            </form>
                        </li>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('userDropBtn');
            const menu = document.getElementById('userDropMenu');
            if(btn && menu) {
                btn.onclick = (e) => { e.preventDefault(); e.stopPropagation(); menu.style.display = menu.style.display === 'none' ? 'block' : 'none'; };
                document.addEventListener('click', () => menu.style.display = 'none');
            }
        });
    </script>
</nav>