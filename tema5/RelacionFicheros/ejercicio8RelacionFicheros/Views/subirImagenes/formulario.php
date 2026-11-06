<h1 class="titulopag" id="titulo">Envia imagenes y las enlistamos</h1>
<form method="POST" action="index.php?controller=archivos&amp;action=procesar" enctype="multipart/form-data">
<p class="campo">
        <p>
            <label for="foto">Foto:</label><br>
            <input type="file" id="foto" name="foto" accept="image/*"/>
        </p>
    </p>
    <input class="boton" type="submit" value="Enviar"/>
</form>
<?php if (isset($errores['foto'])): ?>
    <span style="color:red;"><br><?= $errores['foto'] ?></span>
<?php endif; ?>
<?php if(isset($archivos)): ?>
    <?php foreach ($archivos as $archivo): ?>
       <br><img class="imagenesLista" src="uploads/<?php echo $archivo->getFilename(); ?>" alt="Imagen">
    <?php endforeach; ?>
    <?php else: ?>
        <p style="color: red;">No tienes imagenes para enlistar</p>
<?php endif; ?>
<script>

    let titulo = document.getElementById("titulo");
    
    function coloresRandom(){
        let r = Math.floor(Math.random() * 256);
        let g = Math.floor(Math.random() * 256);
        let b = Math.floor(Math.random() * 256);
        titulo.style.color= "rgb("+r+","+g+","+b+")";
        //document.body.style.backgroundColor="rgb("+r+","+g+","+b+")";
    }
    setInterval(coloresRandom, 300);
</script>