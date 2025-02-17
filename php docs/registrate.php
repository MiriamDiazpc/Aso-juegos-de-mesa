<?php
    include('db.php'); /*Acceso a la BBDD*/
    $message = '';

    if($_SERVER['REQUEST_METHOD']=== 'POST'){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?,?,?)");
        $stmt -> bind_param("sss", $username, $email, $password);

        if($stmt->execute()){
            $message = "Usuario registrado con éxito";
        } else {
            $message = "Error ".$conn->error;
        }

        $stmt->close();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="index.html">
    <link rel="stylesheet" href="biblioteca.html">
    <link rel="stylesheet" href="inicioSesion.html">
    <link rel="stylesheet" href="mesasJuego.html">
    <link rel="stylesheet" href="styles.css">
    <title>Regístrate</title>
</head>
<body class="fondoRegistrate">
  <header>
    <div class="col-md-12">
      <h1 class="h1Registrate">Ficha de inscripción</h1>
    </div>
  </header>
  <main>
    <div class="menuRegistro">
      <div class="p-3 d-flex">
        <div class="col">
          <a class="nav-link" aria-current="page" href="index.html"><img src="icons.svg/inicio.svg" alt=""> Inicio</a>
        </div>
        <div class="col">
          <a class="nav-link" href="mesasJuego.html"><img src="icons.svg/mesas_juego.svg" alt=""> Mesas de juego</a>
        </div>
        <div class="col">
          <a class="nav-link" href="biblioteca.html"><img src="icons.svg/biblioteca.svg" alt=""> Tu biblioteca</a>
        </div>
        <div class="col"> 
          <a class="nav-link active" href="registrate.html"><img src="icons.svg/registrate.svg" alt=""> Regístrate</a>
        </div>
        <div class="col">
          <a class="nav-link" href="inicioSesion.html"><img src="icons.svg/inicia_sesion.svg" alt=""> Inicia sesión</a>
        </div>
      </div>
    </div>
  </main>
  <form class="registro" method="POST">
    <div class="form-group">
      <label for="name">Nombre o nickname</label>
      <input type="name" class="form-control" id="name" placeholder="Juan el bandido" required>
    </div>
    <div class="form-group">
      <label for="raza">Raza</label>
      <input type="text" class="form-control" id="eligeRaza" placeholder="humano, elfo, enano, orco, tiefling, gnomo, celestial, bestia, demonio">
    </div>
    <div class="form-group">
      <label for="clase">Clase</label>
      <input type="text" class="form-control" id="eligeClase" placeholder="guerrero, clérigo, ladrón, mago, hechicero, bardo, druida, paladín">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="ponEmail" placeholder="name@example.com" required>
    </div>
    <div class="form-group">
      <label for="password">Contraseña</label>
      <input type="password" class="form-control" id="creaContraseña" placeholder="contraseña" required>
    </div>
    <div class="form-group">
      <label for="password">Confirmar contraseña</label>
      <input type="password" class="form-control" id="creaContraseña" placeholder="contraseña" required>
    </div>
    <div class="form-group" id="color-selector">
      <label for="select">Elige el color de tu alma</label>
      <select multiple class="form-control" id="eligeColor">
        <option value="azul" class="opt1">Azul</option>
        <option value="rojo" class="opt2">Rojo</option>
        <option value="amarillo" class="opt3">Amarillo</option>
        <option value="verde" class="opt4">Verde</option>
        <option value="morado" class="opt5">Morado</option>
      </select>
    </div>
    <div class="form-group">
      <label for="favJuegos">Juegos preferidos</label>
      <textarea class="form-control" id="favJuegos" rows="3"></textarea>
    </div>
    <button type="submit" class="btn-registro">Enviar a Mordor</button>
  </form>
</body>
</html>