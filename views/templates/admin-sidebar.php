<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="/admin/dashboard" class="dashboard__enlace <?php echo pagina_actual('/dashboard') ? 'dashboard__enlace--actual' : ''; ?> ">
            <i class="fa-solid fa-house dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Inicio
            </span>    
        </a>
        <a href="/admin/productos" class="dashboard__enlace <?php echo pagina_actual('/productos') ? 'dashboard__enlace--actual' : ''; ?> ">
            <i class="fa-solid fa-shop dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Productos
            </span>    
        </a>

        <a href="/admin/registros" class="dashboard__enlace <?php echo pagina_actual('/admin/registros') ? 'dashboard__enlace--actual' : ''; ?> ">
            <i class="fa-solid fa-users dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Registros
            </span>    
        </a>
        <a href="/admin/regalos" class="dashboard__enlace <?php echo pagina_actual('/regalos') ? 'dashboard__enlace--actual' : ''; ?> ">
            <i class="fa-brands fa-wpforms dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Informes
            </span>    
        </a>
    </nav>
</aside>

