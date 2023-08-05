<div class="formulario__campo">
    <label class="formulario__label"  for="calle">Casa y Numero:</label>
    <input class="formulario__input" type="text" id="calle" name="calle"
    value="<?php echo $ubicacion->calle ?? '' ; ?>"
    placeholder="Tu Casa y Numero"
    >
</div>

<div class="formulario__campo">
    <label class="formulario__label"  for="ciudad">Comuna:</label>
    <input class="formulario__input" type="text" id="comuna" name="comuna"
    value="<?php echo $ubicacion->comuna  ?? ''; ?>"
    placeholder="Tu Comuna"
    >
</div>

<div class="formulario__campo">
    <label class="formulario__label" for="region">Región:</label>
    <input class="formulario__input" type="text" id="region" name="region"
    value="<?php echo $ubicacion->region  ?? ''; ?>"
    placeholder="Tu Region"
    >
</div>