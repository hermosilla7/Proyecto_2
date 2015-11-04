<?php

// Establecer conexión con el servidor
mysql_connect('localhost','root','') or die ('Ha fallado la conexión: '.mysql_error());

//Establecer conexión con la base de datos
mysql_select_db('club_estudio') or die ('Error al seleccionar la Base de Datos: '.mysql_error());

 
// Recoger lo que ha introducido el usuario
$user = $_POST["user"];   
$passwd = $_POST["passwd"];

// Select de la tabla donde exista ese usuario
$result = mysql_query("SELECT * FROM usuario WHERE nom = '$user'");

//Validamos si el nomUsuari existe en la base de datos o es correcto
if($row = mysql_fetch_array($result))
{     
//Si el usuario es correcto ahora validamos su contraseña
   if($row["pass"] == $passwd)
   {
    //Creamos sesión
    session_start();  
    //Almacenamos el nombre de usuario en una variable de sesión usuario
    $_SESSION['nom'] = $user;
    $_SESSION['id_user'] = $row["id_user"] ;
      if($row['rol'] == 1){
        //Redireccionamos a la pagina: admin.php
        header("Location: admin.php");  
      } else {
        //Redireccionamos a la pagina: user.php
        header("Location: user.php");
      }
   }
   else
   {
      //En caso que la contraseña sea incorrecta hacemos un alert y redireccionamos a index.html
      ?>
      <script languaje="javascript">
          alert("¡Has introducido una contraseña incorrecta!!");
          location.href = "index.html";
      </script>
  <?php
              
   }
}
else
{
   //En caso que el nombre de usuario es incorrecto hacemos un alert y redireccionamos a index.php
  ?>
    <script languaje="javascript">
        alert("¡No has introducido un usuario correcto!");
        location.href = "index.html";
    </script>
  <?php   
          
}

//Mysql_free_result() se usa para liberar la memoria empleada al realizar una consulta
mysql_free_result($result);

// Cerrar la conexión con la base de datos
mysql_close();

?>