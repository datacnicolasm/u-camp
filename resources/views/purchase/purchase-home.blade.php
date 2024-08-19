@include('components.header')

<body class="page-purchase-camp">

    <div class="container content">
        <div class="row">

            <!-- Logo de plataforma -->
            <div class="col-12 mb-3 logo-col">
                <div class="logo-purchase">
                    <span class="u-logo">Account</span>
                    <span class="camp-logo">Camp</span>
                </div>
            </div>

            <!-- Texto de premium -->
            <div class="col-12 mb-3">
                <h1 class="m-0 text-center text-white font-weight-bold">Plan Premium</h1>
                <p class="mt-3 text-purchase text-white">Acceso ilimitado a todos los espacios y recursos de nuestra
                    plataforma. Incluye todo nuestro contenido de aprendizaje sobre contabilidad, finanzas, impuestos,
                    NIIF y auditoria, entre otros temas necesarios para tu crecimiento profesional.</p>
            </div>

            <!-- Pasos de pago -->
            <div class="col-12 mb-3">
                <div class="payment-steps">
                    <div class="container content">
                        <div class="row payment-steps-number">
                            <div class="col-4">
                                <div class="step-number cuenta-step">1</div>
                            </div>
                            <div class="col-4">
                                <div class="step-number pago-step">2</div>
                            </div>
                            <div class="col-4">
                                <div class="step-number confirm-step">3</div>
                            </div>
                        </div>
                        <div class="row payment-steps-text">
                            <div class="col-4">
                                <div class="cuenta-step step-text text-center">
                                    <span>CUENTA</span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="pago-step step-text text-center">
                                    <span>PAGO</span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="confirm-step step-text text-center">
                                    <span>CONFIRMACION</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Resumen de compra -->
            <div class="col-4">
                <div class="form-sumary">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 mb-4 text-white font-weight-bold text-large">Resumen de tu compra</div>
                            <div class="col-8 text-muted-dark">PLAN</div>
                            <div class="col-4 text-muted-dark text-right">PRECIO</div>
                            <div class="col-8 mb-4 text-white">Premium mensual</div>
                            <div class="col-4 mb-4 text-white text-right">$23.00</div>
                            <div class="col-8 py-4 text-white sub-sumary">SUBTOTAL</div>
                            <div class="col-4 py-4 text-white sub-sumary text-right">$23.00</div>
                            <div class="col-8 my-4 font-weight-bold text-white">TOTAL A PAGAR</div>
                            <div class="col-4 my-4 font-weight-bold text-white text-right">$23.00</div>
                            <span class="text-white">*Valor en <b>DOLARES</b></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulario principal -->
            <?php
            $step_payment = '';
            if (Request::get('id') !== null) {
                $step_payment = 'confirm';
            } elseif (Request::get('id') == null) {
                $step_payment = 'cuenta';
            }
            ?>
            <div id="form-main-pago" class="col-8" data-step="<?php echo $step_payment; ?>">

                <!-- 1. Detalles de cuenta -->
                <div id="cuenta" class="mb-3 section-formulario">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 title-section-formulario">
                                <div class="number cuenta-step">1</div>
                                <div class="text text-large ml-3 font-weight-bold">Crea tu cuenta</div>
                            </div>
                            <div class="col-6 text-sesion">
                                ¿Ya tienes una cuenta?
                                <a href="#" id="login-pago" class="text-tint-3 ml-1 font-weight-bold">Iniciar sesión</a>
                            </div>
                            <div class="col-12">
                                <div class="row content-cuenta">
                                    <div class="col-12 my-3">
                                        <form>
                                            <!-- Tipo de usuario -->
                                            <input type="hidden" id="type_user" name="type_user" value="new_user">

                                            <!-- Otros campos -->
                                            <div class="form-row">
                                                <div class="form-group email-input col-6">
                                                    <p class="label-input">Correo electronico</p>
                                                    <input type="email" class="form-control" id="email"
                                                        placeholder="Correo electronico" required>
                                                    <div class="invalid-feedback-mail">
                                                        Por favor, ingresa un correo electrónico válido.
                                                    </div>
                                                    <div class="invalid-feedback-user">
                                                        Este correo electrónico ya está registrado.
                                                    </div>
                                                    <div class="valid-feedback">
                                                        Email válido.
                                                    </div>
                                                </div>
                                                <div class="form-group col-6">
                                                    <p class="label-input">Contraseña</p>
                                                    <input type="password" class="form-control" id="password"
                                                        placeholder="Contraseña" required>
                                                    <div class="invalid-feedback">
                                                        1. Al menos 6 caracteres.<br>
                                                        2. Al menos un número.<br>
                                                        3. Al menos una letra.
                                                    </div>
                                                    <div class="valid-feedback">
                                                        Contraseña valida.
                                                    </div>
                                                </div>
                                                <div class="form-group col-6">
                                                    <p class="label-input">Nombres</p>
                                                    <input type="text" class="form-control" id="first-name"
                                                        placeholder="Nombres" required>
                                                </div>
                                                <div class="form-group col-6">
                                                    <p class="label-input">Apellidos</p>
                                                    <input type="text" class="form-control" id="last-name"
                                                        placeholder="Apellidos" required>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-3">
                                        <button data-coderef="<?php echo $reference; ?>" id="crear-payment"
                                            class="btn btn-block btn-3-ucamp">Continuar</button>
                                    </div>
                                    <div class="col-9">
                                        <span class="text-muted-dark">
                                            Al continuar, aceptas nuestros <a
                                                href="{{ route('terminos-home') }}">Términos y condiciones</a>, nuestra
                                            <a href="{{ route('privacidad-home') }}">Politica de Privacidad</a> y que
                                            tus datos sean almacenados.
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. Metodo de pago -->
                <div id="pago" class="mb-3 section-formulario">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 title-section-formulario">
                                <div class="number pago-step">2</div>
                                <div class="text text-large ml-3 font-weight-bold">Método de pago</div>
                            </div>
                            <div class="col-12">
                                <div class="row content-pago">
                                    <div class="col-12 mt-3">
                                        <p>Seleccione la forma de pago</p>
                                    </div>
                                    <!--<div class="col-5">
                                        <a href="" class="btn btn-block btn-light pago-paypal">Pagar con<img src="" alt="PayPal"></a>
                                    </div>
                                    <div class="col-7 medios-pago-paypal">
                                    </div>-->
                                    <div class="col-5 my-3">
                                        <form id="form-pago-wompi">
                                            <?php
                                            $public_key = 'pub_test_C3EHFG30gb9kJRJJbhuDInR0OacWifjT';
                                            $num_ref = $reference;
                                            $value = 24900000;
                                            $secret = 'test_integrity_5xU445cUaVu3mafI4VCvRvX4czc1Q2YH';
                                            $string = $num_ref . $value . 'COP' . $secret;
                                            $hash = hash('sha256', $string);
                                            ?>
                                            <script src="https://checkout.wompi.co/widget.js" data-render="button" data-public-key="<?php echo $public_key; ?>"
                                                data-currency="COP" data-amount-in-cents="<?php echo $value; ?>" data-reference="<?php echo $num_ref; ?>"
                                                data-redirect-url="http://localhost/ibero-lab/public/home/purchase" data-signature:integrity="<?php echo $hash; ?>">
                                            </script>
                                        </form>
                                    </div>
                                    <div class="col-7 my-3 medios-pago-wompi">
                                        <img src="{{ asset('img/logo-american-express.svg') }}" alt="">
                                        <img src="{{ asset('img/logo-mastercard.svg') }}" alt="">
                                        <img src="{{ asset('img/logo-maestro.svg') }}" alt="">
                                        <img src="{{ asset('img/logo-visa.svg') }}" alt="">
                                        <img src="{{ asset('img/logo-visa-electron.svg') }}" alt="">
                                        <img src="{{ asset('img/logo-boton-bancolombia.svg') }}" alt="">
                                        <img src="{{ asset('img/logo-pse.svg') }}" alt="">
                                        <img src="{{ asset('img/logo-nequi.svg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3. Confirmacion -->
                <div id="confirmacion" class="mb-3 section-formulario">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 title-section-formulario">
                                <div class="number confirm-step">3</div>
                                <div class="text text-large ml-3 font-weight-bold">Confirmación</div>
                            </div>
                            <div class="col-12">
                                <div class="row content-confirmacion">
                                    <div class="col-12 py-3">
                                        <?php
                                        if ($id_wompi !== null) {
                                            // Verificar si la clave 'status' existe en el array $transaction antes de acceder a ella
                                            if (isset($transaction["status"]) && $transaction["status"] == "APPROVED") {
                                                ?>
                                                    <div class="payment-confirmation">
                                                        <div class="confirmation-icon">
                                                            <i class="fas fa-check-circle text-tint-3"></i>
                                                        </div>
                                                        <h1 class="text-tint-3 font-weight-bold m-0">¡Pago exitoso!</h1>
                                                        <p class="text-tint-1 succes-payment">
                                                            Felicitaciones {{ $payment->first_name }}, todo está listo para que
                                                            llevemos tu aprendizaje al siguiente nivel.
                                                        </p>
                                                        <div class="payment-details my-4">
                                                            <p><strong>Valor pagado:</strong> $23.00</p>
                                                            <p><strong>Método de pago:</strong>
                                                                {{ $transaction['payment_method_type'] }}</p>
                                                            <p><strong>Referencia de pago:</strong> {{ $transaction['reference'] }}
                                                            </p>
                                                            <p><strong>ID de pago:</strong> {{ $id_wompi }}</p>
                                                            <p><strong>Correo:</strong> {{ $payment->email }}</p>
                                                            <p><strong>Plan adquirido:</strong> Premium mensual</p>
                                                        </div>
                                                        <a href="{{ route('login-dashboard') }}"
                                                            class="btn btn-3-ucamp px-5 font-weight-bold text-large">Inicia tu
                                                            aprendizaje</a>
                                                    </div>
                                                <?php
                                            } else {
                                                ?>
                                                    <div class="payment-confirmation">
                                                        <div class="confirmation-icon">
                                                            <i class="fas fa-times-circle text-danger"></i>
                                                        </div>
                                                        <h1 class="text-danger font-weight-bold m-0">¡Pago cancelado!</h1>
                                                        <div class="payment-details my-4">
                                                            <p><strong>Valor:</strong> $23.00</p>
                                                            <p><strong>Método de pago:</strong>
                                                                {{ $transaction['payment_method_type'] }}</p>
                                                            <p><strong>Referencia de pago:</strong> {{ $transaction['reference'] }}
                                                            </p>
                                                            <p><strong>ID de pago:</strong> {{ $id_wompi }}</p>
                                                            <p><strong>Correo:</strong> {{ $transaction['merchant']['email'] }}</p>
                                                            <p><strong>Plan:</strong> Premium mensual</p>
                                                        </div>
                                                        <a href="{{ route('purchase-home') }}" class="btn bg-danger px-5 font-weight-bold text-large">Reintentar pago</a>
                                                    </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('components.footer')
