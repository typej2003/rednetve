<div>
    <head>
        <title>Pasarela de Pago</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/style_pasarela.css" rel="stylesheet" type="text/css">
        <link href="css/style_hotspot.css" rel="stylesheet" type="text/css">
        <meta name="csrf-token" content="your_unique_csrf_token_here">
        <style>
            #btnCreatePayment { background-color: #6500DB; border-color: #6500DB; border-radius: 24px; }
            #btnCreatePayment:hover { background-color: #5800b8; border-color: #5800b8; }
        </style>
    </head>
    <body style="background-color: white;">
    <div id="gifCargando" class="gif-cargando" style="display: none;"></div>
    <div class="container bg-white container-pasarela">
        <div id="message-areaPasarela"></div>
        <form id="form" method="post" autocomplete="off" class="needs-validation" novalidate>
            <input type="hidden" id="nrorouter" name="nrorouter" value="R001">
            <input type="hidden" id="plan" name="plan" value="001">
            <select id="currency" name="currency" class="form-select" style="display: none;">
                <option value="1">
                    Bolivares
                </option>
            </select>
            <input type="hidden" id="reference" name="reference" class="form-control" maxlength="50" value="12345678" required>
            <input type="hidden" class="form-check-input m-0 mt-2" type="checkbox" id="chkJuridicalPerson">
            <select id="rifLetter" name="rifLetter" class="form-select" required style="display: none;">
                <option value="J">
                    J
                </option>
                <option value="G">
                    G
                </option>
            </select>
            <input type="hidden" id="rifNumber" name="rifNumber" class="form-control" value="12345678" maxlength="20" required>
            <input type="hidden" id="title" name="title" class="form-control" maxlength="50" required value="Abono internet">
            <textarea style="display: none;" id="description" name="description" class="form-control" maxlength="500" rows="3" required>Pago internet</textarea>
            <input type="hidden" id="profile" name="profile" class="form-control" maxlength="100" readonly value="neutro">
            <input type="hidden" id="sessionTimeout" name="sessionTimeout" class="form-control" maxlength="100" readonly value="">
            <div class="row border-bottom bg-p"><!--Monto--><!--Moneda-->
                <div class="col-12 validate-me text-left">
                    <label for="amount" class="form-label text-violet mx-3">Enviar Bs.</label>
                    <input id="amount" name="amount" class="form-control input-center mb-1" maxlength="10" value="1" required readonly style="background-color: white;">
                </div>
            </div>

            <div class="row border-bottom bg-s"><!--Teléfono-->
                <div class="col-12 validate-me text-left">
                    <label for="cellphone" class="form-label text-violet mx-3">Teléfono Celular</label>
                    <input value="04165800403" id="cellphone1" name="cellphone1" class="form-control" type="hidden" maxlength="30" required>
                    <input value="04165800403" type="number" id="cellphone" name="cellphone" pattern="^\+?\d{9,15}$" class="form-control input-center mb-1" maxlength="30"required>
                </div>
            </div>

            <div class="row border-bottom bg-p"><!--Cédula-->
                <div class="col-12 text-left">
                    <label class="form-label text-violet mx-3" for="identificationNumber">Documento de Identidad</label>
                    <div class="row">
                        <div class="col-4">
                            <select id="identificationNac" name="identificationNac" class="form-select text-violet mb-1">
                                <option value="V">
                                    V
                                </option>
                                <option value="E">
                                    E
                                </option>
                                <option value="P">
                                    P
                                </option>
                            </select>
                        </div>
                        <div class="col-8 ps-0 validate-me">
                            <input value="13053081" type="number" id="identificationNumber" name="identificationNumber"
                                class="form-control input-center" maxlength="20" required pattern="^[0-9]{7,15}$">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row border-bottom bg-s"><!--Nombre-->
                <div class="col-12 text-left ">
                    <label for="name" class="form-label text-violet mx-3" disabled>Nombre Completo</label>
                    <input value="Jose" id="name" name="name" class="form-control input-center mb-1" maxlength="45" required>
                </div>                
            </div>

            <div class="row border-bottom bg-p"><!--Mail-->
                <div class="col-12 text-left">
                    <label for="email" class="form-label text-violet mx-3">Correo Electrónico</label>
                    <input value="typej2003@gmail.com" id="email" name="email" type="email" class="form-control input-center mb-1" maxlength="50" value="">
                </div>
            </div>

            <div class="row mt-3"><!--Button-->
                <div class="col-12 text-center">
                    <button id="btnCreatePayment" type="submit" class="btn btnEnviar  w-100">Enviar</button>
                </div>
            </div>
        </form>

        <!--Mensaje de error-->
        <div class="row mb-3" id="paymentErrorContainer">
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <p id="paymentError"></p>
                <button id="btnCloseAlert" type="button" class="btn-close" aria-label="Close"></button>
            </div>
        </div>

        <!--Link de pago-->
        <div class="card mb-3" id="paymentLinkContainer">
            <div class="card-header d-none">
                <div class="row">
                    <div class="col-6">
                        <h5>Ir al BioPago BDV</h5>
                    </div>
                    <div class="col-6">
                        <div class="d-flex justify-content-end">
                            <button id="btnCopyLink" class="btn" type="button"
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Copiar">
                                <img src="/img/clipboard.svg" width="20" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="input-group">
                            <input type="hidden" id="paymentLink" class="form-control" readonly>
                            <button id="btnGoPayment" class="btn btn-secondary" type="button" title="Limpiar">Presione para Continuar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Consulta de Pago
        <div class="card mb-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h5>Consultar Pago</h5>
                    </div>
                    <div class="col-6">
                        <div class="d-flex justify-content-end">
                            <button id="btnClearSearchPayment" class="btn" type="button"
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Limpiar">
                                <img src="eraser.svg" width="20" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="input-group">
                            <input type="text" id="txtToken" class="form-control" placeholder="Ingrese el token de pago">
                            <button class="btn btn-secondary" type="button" id="searchPayment">Consultar</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table id="checkPaymentTable" class="table table-striped">
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    -->
        <!--Nuevo pago
        <div class="row mb-3">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input id="btnNewPayment" type="submit" value="Nuevo Pago" class="btn btn-primary">
            </div>
        </div>-->

        
    </div>            

    <script type="text/javascript" src="/js/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="/js/pasarela.js"></script>
    </body>
</div>
