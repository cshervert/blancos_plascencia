<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="{{ asset('assets/vendors/images/logo.png') }}" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu icon-list-style-3">
            <ul id="accordion-menu">
                <li>
                    <div class="sidebar-small-cap mt-3 text-center">
                        {{ $usuario['sucursal']->nombre }}</>
                    </div>
                </li>
                <li>
                    <a href="" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Inicio</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-deal"></span><span class="mtext">Operaciones</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="form-basic.html">Ventas</a></li>
                        <li><a href="advanced-components.html">Devoluciones</a></li>
                        <li><a href="form-wizard.html">Transpasos</a></li>
                        <li><a href="html5-editor.html">Compras</a></li>
                        <li><a href="form-pickers.html">Pedidos</a></li>
                        <li><a href="image-dropzone.html">Cotización</a></li>
                        <li><a href="image-cropper.html">Corte de Caja</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-folder1"></span><span class="mtext">Catálogos</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="basic-table.html">Articulos</a></li>
                        <li><a href="datatable.html">Paquetes</a></li>
                        <li><a href="datatable.html">Clientes</a></li>
                        <li><a href="datatable.html">Proveedores</a></li>
                        <li><a href="datatable.html">Inventario</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-settings1"></span><span class="mtext">Configuración</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="font-awesome.html">Empresa</a></li>
                        <li><a href="{{ route('roles') }}">Roles</a></li>
                        <li><a href="{{ route('usuarios') }}">Usuarios</a></li>
                        <li><a href="themify.html">Empleados</a></li>
                        <li><a href="custom-icon.html">Monedas</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-slideshow"></span><span class="mtext">Articulos</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="font-awesome.html">Impuestos</a></li>
                        <li><a href="foundation.html">Unidades</a></li>
                        <li><a href="ionicons.html">Tags</a></li>
                        <li><a href="themify.html">Cajas</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>