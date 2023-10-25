@section('title', 'Login')
@include('includes.head')
<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-12">
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="pb-2 text-center">
                        <img src="{{ asset('assets/vendors/images/logo_blancos.png') }}" alt="logo" class="border-radius-10">
                    </div>
                    
                    <form>
                        <div class="select-role">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn active">
                                    <input type="radio" name="options" id="admin">
                                    <div class="icon"><img src="{{ asset('assets/vendors/images/manager.svg') }}"
                                            class="svg" alt=""></div>
                                    <span>Soy</span>
                                    Admin
                                </label>
                                <label class="btn">
                                    <input type="radio" name="options" id="user">
                                    <div class="icon"><img src="{{ asset('assets/vendors/images/person.svg') }}"
                                            class="svg" alt=""></div>
                                    <span>Soy</span>
                                    Empleado
                                </label>
                            </div>
                        </div>
                        <div class="input-group custom">
                            <input type="text" class="form-control form-control-lg" placeholder="Usuario o email">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                            </div>
                        </div>
                        <div class="input-group custom">
                            <input type="password" class="form-control form-control-lg" placeholder="**********">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                        </div>
                        <div class="row pb-30">
                            <div class="col-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Recordar</label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="forgot-password"><a href="forgot-password.html">Olvidaste tú contraseña</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group mb-0">
                                    <input class="btn btn-default btn-lg btn-block" type="submit"
                                        value="Iniciar sesión">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')