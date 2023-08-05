<div class="detalle">

    <h2 class="detalle__heading"><?php echo $titulo; ?></h2>
    <div class="detalle__imagen">
        <picture>
            <source srcset="<?php echo $_ENV['HOST'] . '/img/productos/' . $producto->imagen; ?>.webp" type="image/webp">
            <source srcset="<?php echo $_ENV['HOST'] . '/img/productos/' . $producto->imagen; ?>.png" type="image/png">
            <img src="<?php echo $_ENV['HOST'] . '/img/productos/' . $producto->imagen; ?>.png" alt="Imagen producto">
        </picture>
    </div>

    <div class="detalle__contenido">
        <p class="detalle__nombre">Descipcion:</p>
        <p class="detalle__descripcion">
            <?php echo $producto->descripcion; ?>
        </p>
    </div>        
    <div class="detalle__contenido">
        <p class="detalle__nombre">Precio:</p>
        <p class="detalle__precio"></p>
        <p class="detalle__precio">$
            <?php echo $producto->precio; ?>
        </p>
    </div>

    <form method="POST" action="/carrito" class="table__formulario">
        <button class="table__accion table__accion--agregar" type="submit">
            <input type="hidden" name="id" value="<?php echo $producto->id; ?>">  
            <i class="fa-solid fa-add"></i>
            Agregar al Carrito
        </button>
    </form>
</div>