<main class="perfil">
    <h2 class="perfil__heading"><?php echo $titulo; ?></h2>
    <p class="perfil__texto">Actualiza mi Perfil</p> 
    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

    <form method="POST"  class="formulario">
        <div class="formulario__campo">
            <label for="nombre" class="formulario__label">Nombre</label>
            <input
                type="text"
                class="formulario__input"
                placeholder="Tu Nombre"
                id="nombre"
                name="nombre"
                value="<?php echo $usuario->nombre ; ?>"
            >
        </div>

        <div class="formulario__campo">
            <label for="apellido" class="formulario__label">Apellido</label>
            <input
                type="text"
                class="formulario__input"
                placeholder="Tu Apellido"
                id="apellido"
                name="apellido"
                value="<?php echo $usuario->apellido ; ?>"
            >
        </div>

        <div class="formulario__campo">
            <label for="email" class="formulario__label">Email</label>
            <input
                type="email"
                class="formulario__input"
                placeholder="Tu Email"
                id="email"
                name="email"
                value="<?php echo $usuario->email ; ?>"
            >
        </div>

    <?php  if($ubicacion ) { ?> 
            <legend class="perfil__texto">Información Direccion</legend>
            <?php include_once __DIR__ . '/form-direccion.php'; ?>
        <input type="submit" class="formulario__submit" value="Guardar Cambio">
    </form>
    <?php } else { ?>
        <input type="submit" class="formulario__submit" value="Guardar Cambio">
    </form>
        <div class="formulario">
            <a href="/direccion" class="footer__copyright--formulario" >
                <div class="footer__copyright--dirrecion" >
                    <i>Agregar Dirección</i>
                </div>    
            </a>       
        </div>
    <?php } ?>

    <div class="acciones">
        <a href="/perfil" class="perfil__enlace">Volver</a>
    </div>
</main>