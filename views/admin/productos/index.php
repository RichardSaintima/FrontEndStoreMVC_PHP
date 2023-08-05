<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/productos/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Productos
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if(!empty($productos)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Imagen</th>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">Precio</th>
                    <th scope="col" class="table__th">Stock</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($productos as $producto) { ?>
                    <tr class="table__tr">
                        <td class="table__td table__td--imagen">
                            <picture class="">
                                <source srcset="<?php echo $_ENV['HOST'] . '/img/productos/' . $producto->imagen; ?>.webp" type="image/webp">
                                <source srcset="<?php echo $_ENV['HOST'] . '/img/productos/' . $producto->imagen; ?>.png" type="image/png">
                                <img src="<?php echo $_ENV['HOST'] . '/img/productos/' . $producto->imagen; ?>.png" alt="Imagen producto">
                            </picture>
                        </td>
                        <td class="table__td--descipcion">
                            <?php echo $producto->descripcion ; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $producto->precio ; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $producto->disponibles ; ?>
                        </td>
                        <td class="table__td--acciones">
                            <a class=" table__accion table__accion--editar" href="/admin/productos/editar?id=<?php echo $producto->id; ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>

                            <form method="POST" action="/admin/productos/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $producto->id; ?>">
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
        <p class="text-center">No Hay Producto Aún</p>
    <?php } ?>
</div>

<?php 
    echo $paginacion;
?>