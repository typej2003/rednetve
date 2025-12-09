document.addEventListener('DOMContentLoaded', () => {
    
    let messageAreaPasarela = document.getElementById('message-areaPasarela');
    const API_URL = 'http://172.17.0.2:3000';
    //const API_URL = 'http://127.0.0.1:3000';     //temporal localhost
    let profile = getParameterByProfile('profile');
    profileInput =document.getElementById('profile');
    profileInput.value = profile;
    const sessionTimeout = getParameterByProfile('sessionTimeout');
    document.getElementById('sessionTimeout').value = sessionTimeout;
    // showMessagePasarela(`Perfil recibido: ${profile}`, 'success');
    
    $(function () {

        let params = new URLSearchParams(window.location.search);
        let amount = params.get('amount');
        let plan = params.get('plan');
        
        //showMessagePasarela('Funciona.', 'warning');

        if(amount){
            document.getElementById('amount').value = amount
            document.getElementById('plan').value = plan
        }        

        var datos = { "plan": 'plan1', "costo": 0, "modopago": "pagomovil", "telefono": "", "referencia": "" };

        //document.getElementById('planPasarela').value = JSON.stringify(datos1)

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl, { container: 'body', trigger: 'hover' })
        })

        enableJuridicalPerson($('#chkJuridicalPerson').prop("checked"));

        $('#chkJuridicalPerson').on('change', function () {
            enableJuridicalPerson($('#chkJuridicalPerson').prop("checked"));
        });

        $('#paymentErrorContainer').hide();
        $('#paymentLinkContainer').hide();
        $('#btnNewPayment').hide();

        $('#btnCloseAlert').click(function (e) {
            e.preventDefault();
            $("#paymentErrorContainer").hide();
        });

        $('#btnGoPayment').click(function (e) {
            e.preventDefault();
            var url = $('#paymentLink').val();
            window.open(url, '_blank');
        });

        $('#btnCopyLink').click(function (e) {
            e.preventDefault();
            copyToClipboard($('#paymentLink')[0]);
        });

        $('#btnNewPayment').click(function (e) {
            e.preventDefault();
            $("#form").trigger("reset");
            $('#paymentErrorContainer').hide();
            $('#paymentLinkContainer').hide();
            $('#btnNewPayment').hide();
            $('#btnCreatePayment').show();
            $('#checkPaymentTable tbody').html('');
            $('#txtToken').val('');

            enabledControls(false);
            enableJuridicalPerson($('#chkJuridicalPerson').prop("checked"));
            removeValidationClass(form);
        });

        $('#btnClearSearchPayment').click(function (e) {
            e.preventDefault();
            $('#checkPaymentTable tbody').html('');
            $('#txtToken').val('');
        });

        const forms = document.querySelectorAll('.needs-validation');
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', async  event => {
                //alert('create')
                event.preventDefault();
                if (form.checkValidity()) {                    
                    createPayment();                    
                }
                else {
                    event.stopPropagation();
                    addValidationClass(form);
                }
            }, false)
        });

        $('#searchPayment').click(function () {
            var tokenValue = $("#txtToken").val();

            if (tokenValue != '') {
                $.ajax({
                    url: 'CheckPayment-ajax.php',
                    type: "POST",
                    data: { token: tokenValue },
                    beforeSend: function () {
                        $("#spinner").addClass("show");
                    },
                    complete: function () {
                        $("#spinner").removeClass("show");
                    },
                    success: function (data) {

                        jsonResponse = JSON.parse(data);
                        var table = $('#checkPaymentTable tbody');
                        table.html('');

                        for (var prop in jsonResponse) {
                            var tr = $('<tr>');
                            var td1 = $('<td>');
                            var td2 = $('<td>');
                            td1.html(prop);
                            if (jsonResponse[prop] != null)
                                td2.html(jsonResponse[prop].toString());
                            tr.append(td1);
                            tr.append(td2);
                            table.append(tr);
                        }

                    }
                });
            }
        });
    });

    function showMessagePasarela(message, type = 'danger') {
        
        messageAreaPasarela.innerHTML = `
            <div class="alert alert-${type} fade show" role="alert">
                ${message}
            </div>
        `;
    }
    
    function enableJuridicalPerson(isJuridicalPerson) {
        if (isJuridicalPerson == true) {
            $('#rifLetter').removeAttr('disabled');
            $('#rifNumber').removeAttr('disabled');

        } else {
            $('#rifLetter').attr('disabled', 'disabled');
            $('#rifNumber').attr('disabled', 'disabled');
        }
    }

    function copyToClipboard(elem) {
        // create hidden text element, if it doesn't already exist
        var targetId = "_hiddenCopyText_";
        var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
        var origSelectionStart, origSelectionEnd;
        if (isInput) {
            // can just use the original source element for the selection and copy
            target = elem;
            origSelectionStart = elem.selectionStart;
            origSelectionEnd = elem.selectionEnd;
        } else {
            // must use a temporary form element for the selection and copy
            target = document.getElementById(targetId);
            if (!target) {
                var target = document.createElement("textarea");
                target.style.position = "absolute";
                target.style.left = "-9999px";
                target.style.top = "0";
                target.id = targetId;
                document.body.appendChild(target);
            }
            target.textContent = elem.textContent;
        }
        // select the content
        var currentFocus = document.activeElement;
        target.focus();
        target.setSelectionRange(0, target.value.length);

        // copy the selection
        var succeed;
        try {
            succeed = document.execCommand("copy");
        } catch (e) {
            succeed = false;
        }
        // restore original focus
        if (currentFocus && typeof currentFocus.focus === "function") {
            currentFocus.focus();
        }

        if (isInput) {
            // restore prior selection
            elem.setSelectionRange(origSelectionStart, origSelectionEnd);
        } else {
            // clear temporary content
            target.textContent = "";
        }
        return succeed;
    }

    async function createCuenta(username, profile, sessionTimeout) {
        try {
            let response = await fetch(`${API_URL}/api/user/add`, {
                method: "POST",
                body: JSON.stringify({ name: `${username}`, password: `123`, profile: `${profile}`, server: "all", sessionTimeout: `${sessionTimeout}` }),
                });

            // Suponiendo que el Mikrotik redirigirá o dará una respuesta JSON en un API de prueba
            if (response.ok) {

                //const data = await response.json(); 
                
                // loginMessage.className = 'mt-3 text-center alert alert-success';
                // loginMessage.textContent = `¡Bienvenido, ${username}! Sesión iniciada.`;
                // Redirección al estado de la sesión o a una URL de éxito
                // window.location.href = 'http://TU_IP_MIKROTIK/status'; 
                //messageAreaPasarela(`¡Cuenta creada para ${username}!`, 'success');
                const result = await response.json();
                return {
                        code: "CREATED_CUENTA",
                        message: "Resultado de crear cuenta.",
                        data: result,    
                        response: response,
                    };
            } else {
                // El Mikrotik real maneja esto con redirecciones y mensajes en su página de error
                // loginMessage.className = 'mt-3 text-center alert alert-danger';
                // loginMessage.textContent = `Error de inicio de sesión. Credenciales incorrectas o problema de servidor.`;
                return {
                        code: "CREATED_CUENTA",
                        message: "Resultado de crear cuenta.",
                        data: result,    
                        response: response,
                    };
                console.log(response);
                // messageAreaPasarela(`Error al crear la cuenta para ${username}.`, 'danger');
                return 'oye noo'
                return {
                        code: "USER_NOT_CREATED",
                        message: "Usuario no creado.",
                        status: false,
                    };
            }

        } catch (error) {
            alert('error2');
            //messageAreaPasarela(`Error de conexión con el Mikrotik: ${error.message}`, 'danger');
            console.error('Login error:', error);
            return false;   
        }
        
        
    }

    function createPayment1() {

        // let url = 'https://wifiexpres.com/api/mikrotikPasarela'
        //let url = 'http://192.168.2.254:8000/api/mikrotikPasarela'
        let url = '/pasarela/0'

        var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Get CSRF token

        let btnCreatePayment = document.querySelector('#btnCreatePayment').disabled = true
        
        //document.getElementById('gifCargando').style.display = 'block'; // Mostrar GIF

        const form = document.getElementById('form');
        const formData = new FormData(form);
        const data = {};
        for (const pair of formData.entries()) {
            data[pair[0]] = pair[1];
        }
        // 188.95.113.44
        fetch(url, {
        //fetch('url', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json', // Opcional, pero recomendado para APIs
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // Incluir token CSRF si usas protección CSRF
            },
            body: JSON.stringify(data),
        
        })
        .then(response => response.json())
        //.then(data => console.log(data))
        .then(data => {   
            // if (data.response.success == true) {
            if (data.success == true) {
                enabledControls(true);
                
                // $('#paymentLink').val(data.response.urlPayment);
                // $('#paymentLinkContainer').css('display', 'block');
                // location.href = data.response.urlPayment;
                $('#paymentLink').val(data.urlPayment);
                $('#paymentLinkContainer').css('display', 'block');
                location.href = data.urlPayment;

                $('#btnCreatePayment').hide();
                $('#btnNewPayment').show();
            }
            else {
                console.log(data);
                // $('#paymentError').html('Código: ' + data.response.responseCode + '<br/>Mensaje: ' + data.response.responseMessage);
                $('#paymentError').html('Código: ' + data.responseCode + '<br/>Mensaje: ' + data.responseMessage);
                $('#paymentErrorContainer').show();
                btnCreatePayment = document.querySelector('#btnCreatePayment').disabled = false
                //document.getElementById('gifCargando').style.display = 'none'; // Mostrar GIF
            }
        })
        .catch(error => {
            alert('Error:' + error)
            console.error('Error:', error)
        });
        
    }

    function createPayment() {
        $('#paymentErrorContainer').hide();
        $('#paymentLinkContainer').hide();
        //var path = "{{ route('ProcessPaymentDemo',0) }}";
        var path = "/pasarela/0";
        $.ajax({
            url: path,
            type: "GET",
            //data: {campo: 'cedula',},
            data: $("#form").serialize(),
            //dataType: "json",
            beforeSend: function () {
                $("#spinner").addClass("show");
            },
            complete: function () {
                $("#spinner").removeClass("show");
            },
            success: function (data) {
                console.log(data)
                if (data.success) {
                    enabledControls(true);
                    $('#paymentLink').val(data.urlPayment);
                    console.log(data.urlPayment)
                    $('#paymentLinkContainer').css('display', 'block');

                    //location.href = data.urlPayment;
                    //let formGrupoTarjetaDebito = document.getElementById('formGrupoTarjetaDebito');
                    //borrar el nodo
                    //formGrupoTarjetaDebito.remove()

                    // let spanR = document.getElementById('spanR');
                    // spanR.remove()

                    $('#btnCreatePayment').hide();
                    $('#btnNewPayment').show();

                    // let bloqueP = document.getElementById('bloqueP')


                    // let cadena = `<iframe id="iframePasarela" width="420px" height="620px" wire:ignore></iframe>`

                    // bloqueP.innerHTML= cadena

                    //bloqueP.appendChild(iframe)
                    // let iframe = document.createElement('iframe')
                    // iframe.width = '420px;'
                    // iframe.height = '600px;'
                    let iframe = document.querySelector('#iframePasarela')
                    iframe.src = data.urlPayment
                }
                else {
                    $('#paymentError').html('Código: ' + data.responseCode + '<br/>Mensaje: ' + data.responseMessage);
                    $('#paymentErrorContainer').show();
                }
            }
        });
    }

    function addValidationClass(form) {
        var elements = form.getElementsByClassName('validate-me');
        for (var i = 0; i < elements.length; i++) {
            elements[i].classList.add('was-validated');
        }
    }

    function removeValidationClass(form) {
        var elements = form.getElementsByClassName('validate-me');
        for (var i = 0; i < elements.length; i++) {
            elements[i].classList.remove('was-validated');
        }
    }

    function enabledControls(enabled) {
        if (enabled) {
            $('#form input').each(function () { $(this).attr('disabled', 'disabled'); });
            $('#form select').each(function () { $(this).attr('disabled', 'disabled'); });
            $('#form textarea').each(function () { $(this).attr('disabled', 'disabled'); });
        } else {    
            $('#form input').each(function () { $(this).removeAttr('disabled'); });
            $('#form select').each(function () { $(this).removeAttr('disabled'); });
            $('#form textarea').each(function () { $(this).removeAttr('disabled'); });
        }
    }

    // Función para obtener un parámetro de la URL
    function getParameterByProfile(name='profile') {
        //showMessagePasarela(name, 'warning');
        name = name.replace(/[\[\]]/g, '\\$&');
        const regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)');
        const results = regex.exec(window.location.href);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }
    
    // const codigoRecibido = getParameterByName();    
    
    // if (codigoRecibido) {
    //     showMessagePasarela(`Código recibido: ${codigoRecibido}`, 'success');   
    //     // document.getElementById('parametroRecibidoURL').textContent = codigoRecibido;
    // } else {
    //     showMessagePasarela('No se encontró el parámetro "codigo" en la URL.', 'danger');
    //     // document.getElementById('parametroRecibidoURL').textContent = 'No se encontró el parámetro "codigo"';
    // }
        
});