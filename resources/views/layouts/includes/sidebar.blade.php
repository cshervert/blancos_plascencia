<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/vendors/images/logo.png') }}" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu icon-list-style-3 mt-3">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ route('dashboard') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Inicio</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-deal"></span><span class="mtext">Operaciones</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('articulos') }}">Artículos</a></li>
                        <li><a href="{{ route('articulos') }}">Paquetes</a></li>
                        <li><a href="form-basic.html">Inventarios</a></li>
                        <li><a href="advanced-components.html">Compras</a></li>
                        <li><a href="form-pickers.html">Pedidos</a></li>
                        <li><a href="form-pickers.html">Ventas</a></li>
                        <li><a href="image-cropper.html">Corte de Caja</a></li>
                        <li><a href="image-dropzone.html">Cotización</a></li>
                        <li><a href="form-wizard.html">Devolucion</a></li>
                        <li><a href="html5-editor.html">Traspasos</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-folder1"></span><span class="mtext">Catálogos</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('empleados') }}">Empleados</a></li>
                        <li><a href="{{ route('clientes') }}">Clientes</a></li>
                        <li><a href="{{ route('proveedores') }}">Proveedores</a></li>
                        <li><a href="{{ route('unidades') }}">Unidades</a></li>
                        <li><a href="{{ route('impuestos') }}">Impuestos</a></li>
                        <li><a href="{{ route('cajas') }}">Caja</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-file-210"></span><span class="mtext">Reportes</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('empleados') }}">Reporte Global</a></li>
                        <li><a href="{{ route('clientes') }}">Reporte Ventas</a></li>
                        <li><a href="{{ route('proveedores') }}">Reporte Compras</a></li>
                        <li><a href="{{ route('unidades') }}">Reporte Promociones</a></li>
                        <li><a href="{{ route('impuestos') }}">Reporte Inventario</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-settings1"></span><span class="mtext">Configuración</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('empresa') }}">Empresa</a></li>
                        <li><a href="{{ route('sucursales') }}">Sucursales</a></li>
                        <li><a href="{{ route('roles') }}">Roles</a></li>
                        <li><a href="{{ route('usuarios') }}">Usuarios</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>