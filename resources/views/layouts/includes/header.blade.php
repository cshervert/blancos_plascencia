<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
        <div class="search-toggle-icon dw dw-down-arrow-11" data-toggle="header_search"></div>
        <div class="header-search">
            <form>
                <div class="form-group mb-0">
                    <input type="text" class="form-control search-input" placeholder="Buscar">
                    <div class="dropdown">
                        <a class="dropdown-toggle no-arrow" href="#" role="button">
                            <i class="icon-copy dw dw-search2"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="header-right">
        <div class="user-notification">
            {{ $usuario['sucursal']->nombre }}
        </div>
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle head-username" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="{{ asset('assets/vendors/images/user.png') }}" alt="foto">
                    </span>
                    <span class="user-name">{{ $usuario['username'] }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Perfil</a>
                    <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Ayuda</a>
                    <a class="dropdown-item" href="/logout"><i class="dw dw-logout"></i> Salir</a>
                </div>
            </div>
        </div>
    </div>
</div>