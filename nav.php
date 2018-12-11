    
    <!-- Barra lateral (nav)-->
    <div id="sidebarnav" class="sidenav">
        <div class="sidebar-header">
            <a class="nav-link logo_nav" href="inicio.php">
                DashPark
            </a>
        </div>
        <a class="nav-link rep_color" href="reportes.php">
            <i class=" fa fa-file-o icon_nav" style="color: #a7d2cb;"></i> Reportes
        </a>
        <a class="nav-link corte_color" href="cortefinal.php">
            <i class=" fa fa-file-text-o icon_nav" style="color: #f2d388;"></i> Corte final
        </a>
        <a class="nav-link chart_color" href="Estadisticas/BoletosTotales.php">
            <i class="fa fa-bar-chart icon_nav" style="color: #c98474;"></i> Estadisticas
        </a>
        <a class="nav-link cincho_color" href="cinchos.php">
            <i class="fa fa-ticket icon_nav" style="color: #c97490;"></i> Cinchos
        </a>
        <a class="nav-link cajer_color" href="cajeros.php">
            <i class="fas fa-users icon_nav" style="color: #93c178;"></i></i> Cajeros
        </a>
        <a class="nav-link admin_color" href="administradores.php">
            <i class="fas fa-users-cog icon_nav" style="color: #eeb6b7;"></i> Admins
        </a>

    <!-- Cerrar sesión -->
        <a class="nav-link">
            <form action="acions.php" method="POST">
                <button class="btn btn-sm" title="Cerrar sesión">
                    Cerrar Sesión <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
        </a>
    </div><!--Fin sidenav-->