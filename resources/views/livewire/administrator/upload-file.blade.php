<div>
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/app_rednetve.css">
        <style>
            :root {
                --color-primary: #10999F; /* Azul Verdoso (para botones y redes sociales) */
                --color-main-footer: #162661; /* ¡NUEVO COLOR SOLICITADO! (Fondo principal) */
                --color-bottom-footer: #101c4e; /* Fondo de Copyright (Ligeramente más oscuro que el principal) */
                --color-dark-blue: #113c66; /* Azul Oscuro para Copyright Text */
                --color-primary: #10999F; /* Color principal (azul verdoso) */
                --color-secondary: #f8f9fa; /* Fondo claro */
                --color-text: #343a40;

                /* ALTURAS DE EJEMPLO (AJUSTA ESTOS VALORES A LA ALTURA REAL DE TUS MENÚS) */
                --navbar-height: 70px; 
                --menu-desktop-height: 40px; 

                /* Cálculo de la altura total del banner */
                --banner-dynamic-height: calc(100vh - var(--navbar-height) - var(--menu-desktop-height));
            }
            .btn-app {
                background-color: var(--color-main-footer);
                color: #fff !important;
                border-radius: 15px;
            }
            .btn-app:hover {
                background-color: #202a50ff !important;
                color: #fff !important;
                border-radius: 15px;
                border: 2px solid #101c4e;
            }
        </style>
        @stack('styles')
    </head>
    <body>
        <div class="container mt-5 text-center">
            <h2 class="mb-4">
                Importa Operaciones y Exporta Factuas Excel & CSV
            </h2>
            <form action="{{ route('importFile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <div class="custom-file text-left">
                        <input type="file" name="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Seleccione el archivo</label>
                        @if($errors->any())
                        <h5 class="text-danger">{{$errors->first()}}</h5>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-app">Import Operaciones</button>
                <a class="btn btn-app pt-2" href="{{ route('export-facturas') }}">Exportar Facturas</a>
            </form>
        </div>
    </body>
    </html>
</div>
