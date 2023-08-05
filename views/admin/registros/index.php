<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>
<div class="dashboard__contenedor">
    <?php if(!empty($registros)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Nombre Producto</th>
                    <th scope="col" class="table__th">Tipo De envio</th>
                    <th scope="col" class="table__th">Día y Hora Compra</th>
                    <th scope="col" class="table__th">Nombre Cliente</th>
                    <th scope="col" class="table__th">Cantidad</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($registros as $registro) { ?>
                    <tr class="table__tr">
                        <td class="table__td--descipcion">
                            <?php echo $registro->producto->descripcion ; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $registro->envio->nombre; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $registro->fecha . " : " . $registro->hora; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $registro->usuario->nombre . " " . $registro->usuario->apellido; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $registro->cantidad ; ?>
                        </td>
                        <td class="table__td--acciones">
                            <form method="POST" action="/admin/registros/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $registro->id; ?>">
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

        <?php echo $paginacion; ?>

    <?php } else { ?>
        <p class="text-center">No hay registros de ventas</p>
    <?php } ?>
</div>
