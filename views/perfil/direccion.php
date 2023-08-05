
<main class="perfil">
    <h2 class="perfil__heading"><?php echo $titulo; ?></h2>
    <p class="perfil__texto">Agrega Ubicacion</p> 

    <?php 
        require_once __DIR__ . '/../templates/alertas.php';
    ?>

    <form method="POST" action="/direccion" class="formulario">
        <?php include_once __DIR__ . '/form-direccion.php'; ?>
        <input type="submit" class="formulario__submit" value="Guardar Cambio">
    </form>
</main>