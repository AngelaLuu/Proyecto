<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO</title>
    <link rel="stylesheet" href="./css/empleado.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600&display=swap" rel="stylesheet">

</head>

<body>
          <form action="../../../../mvc/controller/empleado/guardar.php" method="post">
    <section class="main">

        <figure class="main__figure">
            <img src="../images/login.jpg.png" class="main__img">
        </figure>

        <div class="main__contact">

            <h2 class="main__title">REGISTRATE</h2>
            <p class="main__paragraph">Registro solo para empleados</p>

            <form class="main__form">

                <input type="id" name='id' placeholder="id" class="main__input">
                <input type="text" name='documento' placeholder="Numero De Documento" class="main__input">
                <input type="text" name='TipoDoc' placeholder="Tipo De Documento" class="main__input">
                <input type="text" name='nombre' placeholder="Nombre" class="main__input">
                <input type="text" name='apellido' placeholder="Apellido" class="main__input">
                <input type="text" name='direccion' placeholder="Direccion" class="main__input">
                <input type="text" name='telefono' placeholder="telefono" class="main__input">
                <input type="text" name='rol' placeholder="Cargo" class="main__input">
                <input type="text" name='estado' placeholder="Estado" class="main__input">
                <div class="form-group">
                     <label for="exampleInputEmail1">estado</label>
                     <select name="estado" value="" class="form-control">
                        <option value="activo">activo</option>
                        <option value="inactivo">inactivo</option>
                    </select>
                </div>

                <div class="form-group">
    <label for="exampleInputEmail1">usuario</label>
    <input type="text" autocomplete="off" name="usuario" class="form-control" maxlength="64" required="true"  placeholder="Enter usuario">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">clave</label>
    <input type="password" autocomplete="off" name="clave" class="form-control" maxlength="64" required="true"  placeholder="Enter clave">
  </div>

                <div allign="center">
                    <input type="submit" value="Registrar">
                    <input type="reset" value="Limpiar">
                </div>
            </form>
        </div>

    </section>

</body>
</html>
