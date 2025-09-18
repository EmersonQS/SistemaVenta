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
          <a href="{{'dashboard'}}" class="nav-link" id="itemDashboard">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>Dashboard</p>
          </a>
        </li>
        @canany(['unidades_list', 'productos_list'])
        <li class="nav-item" id="menuAlmacen">
          <a href="#" class="nav-link">

            <i class="nav-icon bi bi-archive-fill"></i>
            <p>
              Almacen
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @can('unidades_list')
            <li class="nav-item">
              <a href="{{route('unidades.index')}}" class="nav-link" id="itemUnidades">
                <i class="nav-icon bi bi-circle"></i>
                <p>Unidades</p>
              </a>
            </li>
            @endcan
            @can('productos_list')
            <li class="nav-item">
              <a href="{{route('productos.index')}}" class="nav-link" id="itemProductos">
                <i class="nav-icon bi bi-circle"></i>
                <p>Productos</p>
              </a>
            </li>
            @endcan
            @can('proveedores_list')
            <li class="nav-item">
              <a href="{{route('proveedores.index')}}" class="nav-link" id="itemProveedores">
                <i class="nav-icon bi bi-circle"></i>
                <p>Proveedores</p>
              </a>
            </li>
            @endcan
            @can('compras_list')
            <li class="nav-item">
              <a href="{{route('compras.index')}}" class="nav-link" id="itemCompras">
                <i class="nav-icon bi bi-circle"></i>
                <p>Compras</p>
              </a>
            </li>
            @endcan
          </ul>
        </li>
        @endcanany
        @canany(['clientes_list', 'ventas_list'])
        <li class="nav-item" id="menuVentas">
          <a href="#" class="nav-link">

            <i class="nav-icon bi bi-archive-fill"></i>
            <p>
              Ventas
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @can('clientes_list')
            <li class="nav-item">
              <a href="{{route('clientes.index')}}" class="nav-link" id="itemClientes">
                <i class="nav-icon bi bi-circle"></i>
                <p>Clientes</p>
              </a>
            </li>
            @endcan
            @can('ventas_list')
            <li class="nav-item">
              <a href="{{route('ventas.index')}}" class="nav-link" id="itemVentas">
                <i class="nav-icon bi bi-circle"></i>
                <p>Ventas</p>
              </a>
            </li>
            @endcan
          </ul>
        </li>
        @endcanany
        @canany(['compras_list', 'ventas_list'])
        <li class="nav-item" id="menuReporte">
          <a href="#" class="nav-link">

            <i class="nav-icon bi bi-bar-chart"></i>
            <p>
              Reportes
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @can('ventas_list')
            <li class="nav-item">
              <a href="{{route('reportes.ventas')}}" class="nav-link" id="itemReporteVentas">
                <i class="nav-icon bi bi-circle"></i>
                <p>Reporte Ventas</p>
              </a>
            </li>
            @endcan
          </ul>
        </li>
        @endcanany

        @canany(['comprobante_tipos_list', 'documento_tipos_list', 'afectacion_tipos_list'])
        <li class="nav-item" id="menuConfiguracion">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-gear"></i>
            <p>
              Configuracion
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @can('comprobante_tipos_list')
            <li class="nav-item">
              <a href="{{ route('comprobante-tipos.index') }}" class="nav-link" id="itemComprobanteTipo">
                <i class="nav-icon bi bi-circle"></i>
                <p>Tipo de Comprobante</p>
              </a>
            </li>
            @endcan

            @can('documento_tipos_list')
            <li class="nav-item">
              <a href="{{ route('documento-tipos.index')}}" class="nav-link" id="itemDocumentoTipo">
                <i class="nav-icon bi bi-circle"></i>
                <p>Tipo de Documentos</p>
              </a>
            </li>
            @endcan

            @can('afectacion_tipos_list')
            <li class="nav-item">
              <a href="{{ route('afectacion-tipos.index') }}" class="nav-link" id="itemAfectacionTipo">
                <i class="nav-icon bi bi-circle"></i>
                <p>Tipo de Afectacion</p>
              </a>
            </li>
            @endcan

            {{-- Usa el permiso correcto si existe; de lo contrario crea/asigna uno coherente --}}
            @can('comprobante_tipos_list')
            <li class="nav-item">
              <a href="{{ route('comprobante-series.index') }}" class="nav-link" id="itemComprobanteSerie">
                <i class="nav-icon bi bi-circle"></i>
                <p>Correlativos</p>
              </a>
            </li>
            @endcan
          </ul>
        </li>
        @endcanany

        @canany(['users_list', 'roles_permisos_list'])
        <li class="nav-item" id="menuSeguridad">
          <a href="#" class="nav-link">

            <i class="nav-icon bi bi-shield-lock-fill"></i>
            <p>
              Seguridad
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @can('roles_permisos_list')
            <li class="nav-item">
              <a href="{{route('roles.index')}}" class="nav-link" id="itemRoles">
                <i class="nav-icon bi bi-circle"></i>
                <p>Roles</p>
              </a>
            </li>
            @endcan
            @can('users_list')
            <li class="nav-item">
              <a href="{{ route('usuarios.index')}}" class="nav-link" id="itemUsuarios">
                <i class="nav-icon bi bi-circle"></i>
                <p>Usuarios</p>
              </a>
            </li>
            @endcan
          </ul>
        </li>
        @endcanany
      </ul>
      <!--end::Sidebar Menu-->
    </nav>
  </div>
  <!--end::Sidebar Wrapper-->
</aside>