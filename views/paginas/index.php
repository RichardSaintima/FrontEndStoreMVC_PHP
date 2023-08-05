<main class="inicio">
    <h2 class="inicio__heading"><?php echo $titulo; ?></h2>

    <div class="inicio__grid">
        <?php foreach ($productosObjetos as $producto): ?>
           
                <div class="inicio__producto">
                <a href="/detalle_producto?id=<?php echo $producto->id; ?>">
                    <div class="inicio__imagen ">
                        <picture>
                            <source srcset="<?php echo $_ENV['HOST'] . '/img/productos/' . $producto->imagen; ?>.webp" type="image/webp">
                            <source srcset="<?php echo $_ENV['HOST'] . '/img/productos/' . $producto->imagen; ?>.png" type="image/png">
                            <img src="<?php echo $_ENV['HOST'] . '/img/productos/' . $producto->imagen; ?>.png" alt="Imagen producto">
                        </picture>
                    </div>
                </a>
                    <div class="inicio__detalles">
                        <p class="inicio__producto--descripcion"><?php echo $producto->descripcion; ?></p>
                        <p class="inicio__producto--precio">$<?php echo number_format($producto->precio); ?></p>
                        <p class="inicio__producto--disponibles">Stock<span><?php echo $producto->disponibles; ?></span></p>
                    </div>
                    <form method="POST" action="/carrito/crear" class="table__formulario">
                        <button class="table__accion table__accion--agregar" type="submit">
                          <input type="hidden" name="id" value="<?php echo $producto->id; ?>">  
                            <i class="fa-solid fa-add"></i>
                            Agregar al Carrito
                        </button>
                    </form>
                </div>           
            

        <?php endforeach; ?>
    </div>


</main>
