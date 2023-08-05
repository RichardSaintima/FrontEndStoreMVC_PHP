<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Del Producto</legend>

    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Descripcion Producto</label>
        <textarea
            type="text"
            class="formulario__input"
            id="descripcion"
            name="descripcion"
            cols="4" rows="4" value=""
        ><?php echo $producto->descripcion ?? ''; ?></textarea>
    </div>
    
    <div class="formulario__campo">
        <label for="precio" class="formulario__label">Precio</label>
        <input
            type="number"
            class="formulario__input"
            id="precio"
            name="precio"
            placeholder="Precio Producto"
            value="<?php echo $producto->precio ?? ''; ?>"
        >
    </div>
    <div class="formulario__campo">
        <label for="imagen" class="formulario__label">Imagen</label>
        <input
            type="file"
            class="formulario__input formulario__input--file"
            id="imagen"
            name="imagen"
        >
    </div>

    <?php if(isset($producto->imagen_actual)) { ?>
        <p class="formulario__texto">Imagen Actual:</p>
        <div class="formulario__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/productos/' . $producto->imagen; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/img/productos/' . $producto->imagen; ?>.png" type="image/png">
                <img src="<?php echo $_ENV['HOST'] . '/img/productos/' . $producto->imagen; ?>.png" alt="Imagen producto">
            </picture>
        </div>

    <?php } ?>
    

    <div class="formulario__campo">
        <label for="disponibles" class="formulario__label">Stock</label>
        <input
            type="number"
            class="formulario__input"
            id="disponibles"
            name="disponibles"
            placeholder="Stock Disponible"
            value="<?php echo $producto->disponibles ?? ''; ?>"
        >
    </div>

</fieldset>
