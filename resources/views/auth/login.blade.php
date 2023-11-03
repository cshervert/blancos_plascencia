@section('title', 'Login')
@include('auth.default.head')
<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-12">
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="pb-2 text-center">
                        <img src="{{ asset('assets/vendors/images/logo_blancos.png') }}" alt="logo"
                            class="border-radius-10">
                    </div>
                    <form id="FormLogin" class="mt-2">
                        @csrf
                        <div class="form-control-feedback has-danger mb-2">
                            <small id="label-msg"></small>
                        </div>
                        <div class="input-group custom">
                            <input type="text" class="form-control form-control-lg" placeholder="Usuario o email"
                                id="username" onkeyup="clearFormLogin();">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                            </div>
                        </div>
                        <div class="input-group custom">
                            <input type="password" class="form-control form-control-lg" placeholder="**********"
                                id="password" onkeyup="clearFormLogin();">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                        </div>
                        <div class="row pb-30">
                            <div class="col-4">
                            </div>
                            <div class="col-8">
                                <div class="forgot-password"><a href="forgot-password.html">Olvidaste tú contraseña</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group mb-0">
                                    <input class="btn btn-default btn-lg btn-block" type="submit" value="INICIAR">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('auth.default.footer')