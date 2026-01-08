<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RedNetVe - Registro de Usuario</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --primary-color: #009b9f;
            --primary-dark: #007d81;
            --bg-gradient: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-gradient);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 0;
        }

        .register-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            max-width: 500px;
            width: 100%;
        }

        .logo-img {
            max-width: 160px;
            margin-bottom: 1rem;
        }

        .form-label {
            font-weight: 600;
            color: #444;
            font-size: 0.85rem;
            margin-bottom: 0.4rem;
        }

        .input-group-text {
            background-color: transparent;
            border-right: none;
            color: var(--primary-color);
        }

        .form-control, .form-select {
            border-left: none;
            padding: 0.6rem 1rem;
            font-size: 0.9rem;
        }

        .form-control:focus, .form-select:focus {
            box-shadow: none;
            border-color: #dee2e6;
        }

        /* Estilo especial para el selector de tipo (V, J, E...) */
        .input-group > .inputType {
            border-left: 1px solid #dee2e6;
            max-width: 80px;
            flex: none;
        }

        .btn-register {
            background-color: var(--primary-color);
            border: none;
            padding: 0.8rem;
            font-weight: 600;
            border-radius: 8px;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 155, 159, 0.3);
            color: white;
        }

        .login-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center">
    <div class="card register-card">
        <div class="card-body p-4 p-md-5">
            <div class="text-center mb-4">
                <a href="/"><img src="/img/logo_rednet.png" alt="RedNet" class="logo-img"></a>
                <h4 class="fw-bold text-dark">Crea tu cuenta</h4>
                <p class="text-muted small">¿Ya tienes cuenta? <a href="/login" class="login-link">Inicia sesión aquí</a></p>
            </div>

            <form action="{{ route('register') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label">Tipo de usuario</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-people"></i></span>
                        <select class="form-select border-start-0" name="role" id="role">
                            <option value="cliente" selected>CLIENTE</option>
                            <option value="afiliado">AFILIADO</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Identificación <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <select class="form-select inputType" name="identificationNac">
                            <option value="V" selected>V</option>
                            <option value="J">J</option>
                            <option value="E">E</option>
                            <option value="G">G</option>
                            <option value="P">P</option>
                        </select>
                        <input type="text" name="identificationNumber" class="form-control" placeholder="Número de documento" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nombre de Usuario <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" name="name" class="form-control" placeholder="Ej: JuanPerez" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Correo Electrónico <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="nombre@correo.com" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3 mt-md-0">
                        <label class="form-label">Repetir Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-shield-check"></i></span>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="••••••••" required>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Teléfono de contacto</label>
                    <div class="input-group">
                        <select class="form-select inputType" name="cellphonecode" style="max-width: 95px;">
                            <option value="0412">0412</option>
                            <option value="0414">0414</option>
                            <option value="0424">0424</option>
                            <option value="0416">0416</option>
                            <option value="0426">0426</option>
                        </select>
                        <input type="text" name="cellphone" class="form-control" placeholder="1234567">
                    </div>
                </div>

                <button type="submit" class="btn btn-register w-100">
                    <i class="bi bi-person-plus-fill me-2"></i> Crear mi cuenta
                </button>
            </form>
        </div>
    </div>
</div>

</body>
</html>