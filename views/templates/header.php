<header class="header">
    <div class="header__contenedor">
        <div class="header__mobile">
            <a href="/">
                    <div class="header__imagen">
                        <picture>
                            <source srcset="build/img/logo.avif" type="image/avif">
                            <source srcset="build/img/logo.webp" type="image/webp">
                            <img loading="lazy" width="200" height="300" src="build/img/logo.jpg" alt="Imagen Logotipo">
                        </picture>
                    </div>
                </a>

                <div class="mostrar" id="mostrar">
                    <svg id="ver" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="56" height="56" viewBox="0 0 24 24" stroke-width="2" stroke="#330032" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M4 6l16 0" />
                        <path d="M4 12l16 0" />
                        <path d="M4 18l16 0" />
                    </svg>
                    <svg style="display: none;" id="noVer" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="56" height="56" viewBox="0 0 24 24" stroke-width="2" stroke="#330032" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M18 6l-12 12" />
                        <path d="M6 6l12 12" />
                    </svg>
                </div>
                            
        </div>
        <div class="header__barra">
            <nav class="header__barra--navegacion header__mobile--barra">
                <a class="header__barra--navegacion__enlace nav__enlace header__mobile--barra__enlace " href="/">Tienda</a>
                <a class="header__barra--navegacion__enlace nav__enlace header__mobile--barra__enlace" id="numeroCarrito" href="/carrito">Carrito</a>
                <a class="header__barra--navegacion__enlace nav__enlace header__mobile--barra__enlace  " href="/nosotros">Nosotros</a>
                <?php if(is_auth()) { ?>
                    <a class="header__barra--navegacion__enlace nav__enlace header__mobile--barra__enlace " href="#">Mis Compras</a>
                <?php } ?>
               
                <div class="header__mobile--barra__enlace--enlaces enlaces " style="display: none;">
                    
                    <?php if(is_admin()) { ?>
                        <a href="/admin/dashboard" class=" header__barra--navegacion__enlace header__mobile--barra__enlace">Administrar</a>
                    <?php } ?>
                    <?php if(is_auth()) { ?>
                            <a  class="header__barra--navegacion__enlace header__mobile--barra__enlace" href="/perfil">Mi Perfil</a>
                            <form method="POST" action="/logout" class=" header__mobile--barra__enlace  header__barra--navegacion__enlace">
                                <input type="submit" value="Cerrar Sesión" class=" header__mobile--barra__enlace header__barra--navegacion__enlace">
                            </form>
                    <?php } else { ?>
                        <a class="header__barra--navegacion__enlace header__mobile--barra__enlace"  href="/login">Iniciar Sesión</a>
                        <a class="header__barra--navegacion__enlace header__mobile--barra__enlace" href="/registro" >Registro</a>
                    <?php } ?>
                </div>
                <div class="header__barra--navegacion__enlace  " id="paraSession">
                    <p class="header__barra--navegacion__enlace header__mobile--barra__enlace ">Perfil</p>
                </div>
            </nav>
        </div>
    </div>
</header>