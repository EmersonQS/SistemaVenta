<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <!--begin::Sidebar Brand-->
  <div class="sidebar-brand">
    <!--begin::Brand Link-->
    <a href="../index.html" class="brand-link">
      <!--begin::Brand Image-->
      <img
        src="{{asset('assets/img/AdminLTELogo.png')}}"
        alt="Sistema Logo"
        class="brand-image opacity-75 shadow" />
      <!--end::Brand Image-->
      <!--begin::Brand Text-->
      <span class="brand-text fw-light">Sistema de Venta</span>
      <!--end::Brand Text-->
    </a>
    <!--end::Brand Link-->
  </div>
  <!--end::Sidebar Brand-->
  <!--begin::Sidebar Wrapper-->
  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <!--begin::Sidebar Menu-->
      <ul
        class="nav sidebar-menu flex-column"
        data-lte-toggle="treeview"
        role="navigation"
        aria-label="Main navigation"
        data-accordion="false"
        id="navigation">
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>DashBoard</p>
          </a>
        </li>
        <li class="nav-item" id="menuAlmacen">
          <a href="#" class="nav-link">

            <i class="nav-icon bi bi-archive-fill"></i>
            <p>
              Almacen
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('unidades.index')}}" class="nav-link" id="itemUnidades">
                <i class="nav-icon bi bi-circle"></i>
                <p>Unidades</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" id="itemAfectaciones">
                <i class="nav-icon bi bi-circle"></i>
                <p>Afectaciones tipos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('productos.index')}}" class="nav-link" id="itemProductos">
                <i class="nav-icon bi bi-circle"></i>
                <p>Productos</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item" id="menuSeguridad">
          <a href="#" class="nav-link">

            <i class="nav-icon bi bi-shield-lock-fill"></i>
            <p>
              Seguridad
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('roles.index')}}" class="nav-link" id="itemRoles">
                <i class="nav-icon bi bi-circle"></i>
                <p>Roles</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" id="itemUsuarios">
                <i class="nav-icon bi bi-circle"></i>
                <p>Usuarios</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
      <!--end::Sidebar Menu-->
    </nav>
  </div>
  <!--end::Sidebar Wrapper-->
</aside>