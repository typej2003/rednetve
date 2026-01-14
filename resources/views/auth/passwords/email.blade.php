@extends('layouts.app_clean') @section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-5">
            <div class="card login-card p-4">
                <div class="text-center mb-4">
                    <h4 class="fw-bold">Recuperar Contraseña</h4>
                    <p class="text-muted small">Te enviaremos un enlace para restablecer tu acceso.</p>
                </div>

                @if (session('status'))
                    <div class="alert alert-success small" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label">Correo Electrónico</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                        </div>
                        @error('email')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-login w-100">
                        Enviar Enlace de Recuperación
                    </button>
                    
                    <div class="text-center mt-4">
                        <a href="{{ route('login') }}" class="small text-decoration-none text-muted">
                            <i class="bi bi-arrow-left"></i> Volver al inicio de sesión
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection