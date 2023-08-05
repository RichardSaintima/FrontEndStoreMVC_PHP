<div class="carrito">
    <h2 class="carrito__heading"><?php echo $titulo; ?></h2>
    <div class="dashboard__contenedor">
        <?php if(!empty($productos)) { ?>
            <table class="table">
                <thead class="table__thead">
                    <tr>
                        <th scope="col" class="table__th carrito__imagen">Imagen</th>
                        <th scope="col" class="table__th">Nombre</th>
                        <th scope="col" class="table__th">Precio</th>
                        <th scope="col" class="table__th">Cantidad</th>
                        <th scope="col" class="table__th"></th>
                    </tr>
                </thead>

                <tbody class="carrito__tbody">
                <?php foreach($productos as  $producto) { ?>
                        <tr class="table__tr">
                            <td class="table__td carrito__imagen">
                                <picture class="carrito__imagen">
                                    <source srcset="<?php echo $_ENV['HOST'] . '/img/productos/' . $producto->imagen; ?>.webp" type="image/webp">
                                    <source srcset="<?php echo $_ENV['HOST'] . '/img/productos/' . $producto->imagen; ?>.png" type="image/png">
                                    <img src="<?php echo $_ENV['HOST'] . '/img/productos/' . $producto->imagen; ?>.png" alt="Imagen producto">
                                </picture>
                            </td>
                            <td class="table__descipcion">
                                <?php echo $producto->descripcion ; ?>
                            </td>
                            <td class="table__td">
                                <?php echo $producto->precio ; ?>
                            </td>
                            <td class="table__td">
                                <p class="table__td--disponibles">Stock:<span><?php echo $producto->disponibles; ?></span></p>
                                <form method="POST" action="/carrito" class="table__formulario"> <!-- Corregir la acción del formulario -->
                                    <input type="hidden" name="producto_id" value="<?php echo $producto->id; ?>" class="table__td--input">
                                    <input type="number" name="cantidad" class="cantidad-input" value="1" min="1" max="<?php echo $producto->disponibles; ?>" data-precio="<?php echo $producto->precio; ?>">
                                </form>
                            </td>
                            <td class="table__td--acciones">
                                <form method="POST" action="/compra/carrito/eliminar" class="table__formulario">
                                    <input type="hidden" name="id" value="<?php echo $carrito->id; ?>">
                                    <button class="table__accion table__accion--eliminar" type="submit">
                                        <i class="fa-solid fa-circle-xmark"></i>
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>

                    <?php } ?>
                    
                </tbody>
            </table>
            
        <?php } else { ?>
            <p class="text-center">No Hay Producto En el Carrito</p>
        <?php } ?>
    </div> 
    <?php if($carrito) { ?> 
        <p class="carrito__texto">Finaliza Tu Comprar</p>
        <div class="formulario__campo">
            <select id="tipoEnvio" class="formulario__input--option tipo-envio">
                <option class="formulario__input " selected disabled>--Seleccionar--</option>
                <option class="formulario__input--option" value="<?php echo $entrega; ?>">Entrega</option>
                <option class="formulario__input--option" value="<?php echo $presencial; ?>">Sacar en la Tienda</option>
            </select>
        </div>
        <p id="totalAPagar" class="carrito__total">Total a pagar: $<?php echo number_format($totalAPagar); ?></p>
    <?php } ?>
</div>
