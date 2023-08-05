<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<main class="bloques">
    <div class="bloques__grid">
        <div class="bloque">
            <h3 class="bloque__heading">Últimos Compras</h3>

            <?php foreach($compras as $compra) { ?>
                <div class="bloque__contenido">
                    <p class="bloque__texto--nombre">
                        <?php echo $compra->usuario->nombre . "    " . $compra->usuario->apellido; ?>
                    </p>
                </div>
            <?php } ?>
        </div>

        <div class="bloque">
            <h3 class="bloque__heading">Ingresos</h3>
            <p class="bloque__texto--cantidad">$ <?php echo $ingresos; ?></p>
        </div>

        <div class="bloque">
            <h3 class="bloque__heading">Sacar en Tienda</h3>
            <div class="bloque__contenido">
                <p class="bloque__texto">
                    <?php echo $presenciales . " " .' Disponibles'; ?>
                </p>
            </div>
        </div>

        <div class="bloque">
            <h3 class="bloque__heading">Entregar Para Hacer</h3>
            <div class="bloque__contenido">
                <p class="bloque__texto">
                <?php echo $entregas . " " .' Disponibles'; ?>
                </p>
            </div>
        </div>
    </div>
</main>