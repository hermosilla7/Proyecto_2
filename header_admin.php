<!DOCTYPE html>
<html>
  <head>
  <html lang="es">
      <meta charset="utf-8">
      <title>Reserva de Material</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!-- JQUERY -->
      <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script> 

      <!-- BOOTSTRAP -->
      <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
      <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

      <!-- BOOTSTRAP TABLE -->
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.5.0/bootstrap-table.min.css">
      <script type="text/javascript" src="js/bootstrap-table.js"></script>
      <script type="text/javascript" src="js/bootstrap-table-ca-ES.js"></script>
      <script src="//oss.maxcdn.com/bootbox/4.2.0/bootbox.min.js"></script>

      <!-- BOOTSTRAP SELECT -->
      <link rel="stylesheet" href="css/bootstrap-select.min.css">
      <script type="text/javascript" src="js/bootstrap-select.min.js"></script>

      <!-- VALIDATION -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.css"></link>
      <script type="text/javascript" src="js/bootstrapValidator.js"></script>
      
      <!-- Generic page styles -->
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" type="text/css" href="css/global.css">
      <link rel="icon" type="image/png" href="img/favicon.png" />
  </head>
  <body>
    <header>
    <nav class="navigation">
          <ul>
            <li><a href="admin.php"><img src ='img/logo.png'width='250' heigth='250'/></a></li>
            <li><a href="busqueda_reservas_admin.php" class="navList">Reservas</a></li>
            <li><a href="historial_incidencias_admin.php" class="navList">SAT</a></li>
            <li><a href="logout.php" class="navLogout">Salir</a></li>
            <li>
              <?php
                //creamos la sesion
                session_start();

                $nomUsuari = $_SESSION['nom'];
                $user_id = $_SESSION['id_user']; 

                //validamos si se ha hecho o no el inicio de sesion correctamente
                //si no se ha hecho la sesion nos regresará a index.html
                if(!isset($_SESSION['nom'])) 
                {
                  header('Location: index.html'); 
                  exit();
                }
                echo "<div class='cont'><div class='perfillog'>
                      <h4 style='color:white' 'width:280px'>BENVINGUT - $nomUsuari </h4></div>";

                $fichero="img/$user_id".".jpg";
                if(file_exists($fichero)&&(($user_id) != '')){
                  echo "<div class='perfil'><img src='$fichero' width='50' heigth='50' ></div>";
                }
                else{
                  echo "<div class='perfil'><img src ='img/no_disponible.jpg'width='50' heigth='50'/></div>";
                }
                echo"</div>";

                ?>
            </li>
          </ul>
    </nav>
    </header>


