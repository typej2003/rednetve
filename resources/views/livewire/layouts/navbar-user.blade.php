<div style="z-index: 20000;">
    <nav class="navbar fixed-top bg-white border-bottom shadow-sm" style="height: var(--navbar-height);">
        <div class="container-fluid px-3 d-flex align-items-center justify-content-between">
            
            <div class="d-flex align-items-center">
                <button class="btn btn-light d-lg-none me-2 btn-hamburguesa" 
                        onclick="window.dispatchEvent(new CustomEvent('toggleSidebar'))">
                    <i class="bi bi-list fs-3"></i>
                </button>
                
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('img/logo_rednet.png') }}" style="max-height: 40px;" alt="Logo">
                </a>
            </div>

            <div class="d-flex align-items-center">
                <div class="dropdown">
                    @auth
                        <a class="nav-link dropdown-toggle d-flex align-items-center p-0 text-dark" href="#" id="miRednetDropdownLeft" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ auth()->user()->avatar_url }}" id="profileImage" class="rounded-circle me-2" alt="User Image" style="width: 32px; height: 32px; object-fit: cover; border: 1px solid #ddd;">
                            <span class="d-none d-sm-inline">{{ auth()->user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="miRednetDropdownLeft">
                            <div class="px-3 py-2 d-sm-none border-bottom">
                                <strong>{{ auth()->user()->name }}</strong>
                            </div>
                            @if(auth()->user()->role == 'root' || auth()->user()->role == 'admin')
                                <a class="dropdown-item" href="/admin/panel">
                                    <i class="bi bi-speedometer2 me-2"></i> Escritorio
                                </a>
                            @endif
                            
                            <div class="dropdown-divider"></div>
                            
                            <form method="POST" action="{{ route('logout') }}" id="logout-form-nav">
                                @csrf 
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}" 
                                   onclick="event.preventDefault(); document.getElementById('logout-form-nav').submit();">
                                    <i class="bi bi-box-arrow-right me-2"></i> Salir
                                </a>
                            </form>
                        </div>
                    @else                            
                        <a class="nav-link dropdown-toggle d-flex align-items-center p-0 text-dark" href="#" id="miRednetDropdownLeft" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('img/icono_mirednet.svg') }}" alt="Mi Rednet" class="nav-icon me-2" style="max-width:20px;">
                            <span>Mi Rednet</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="miRednetDropdownLeft">
                            <a class="dropdown-item" href="/login">
                                <i class="bi bi-person-check me-2"></i> Login
                            </a>
                        </div>
                    @endauth
                </div>
            </div>

        </div>
    </nav>
</div>