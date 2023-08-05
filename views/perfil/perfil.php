<main class="perfil">
    <h2 class="perfil__heading"><?php echo $titulo; ?></h2>
    <p class="perfil__texto">Visualiza mi Perfil</p> 

    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
    
    <div class="perfil__contenido">
        <p class="perfil__contenido--nombre">Nombre: <strong><?php echo $usuario->nombre; ?></strong></p>
        <p class="perfil__contenido--nombre">Apellido: <strong><?php echo $usuario->apellido; ?></strong> </p>
        <p class="perfil__contenido--nombre">E-mail: <strong><?php echo $usuario->email; ?></strong> </p>
        <?php  if($ubicacion) { ?> 
            <p class="perfil__contenido--nombre">Dirrecion: 
                <strong><?php echo $ubicacion->calle . ", " .$ubicacion->comuna . ", " .$ubicacion->region ; ?></strong> 
            </p>
        <?php } ?>
        <a href="/modifica-perfil?id=<?php echo $usuario->id; ?>" class="formulario__submit">Modifica</a>
       
    </div>
     <div class="perfil__enlace">
        <a href="/olvide" class="perfil__enlace">Cambiar Contraseña</a>
     </div>   
     
    
</main>
