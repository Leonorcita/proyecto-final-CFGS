<?php

$con = mysqli_connect("129.153.156.209:3306","root","Flot@nte23","it_users");
$query = "select * from programas";

echo '<!DOCTYPE html>
          <html lang="es">      
          <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=1, initial-scale=1.0">
            <title>Catálogo</title>
            <link rel="stylesheet" href="estilo2.css">
            <link rel="icon" href="./pics/blockchain.png">
            <link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
          </head>
          <body>
            <div id="header">
              <h1>EJECUCIÓN DE PRUEBA</h1>
              <div id="nav">
                <ul id="menu">
                  <li class="item"><a href="./home.html">HOME</a></li>
                  <li class="item"><a href="./index.html">MI CUENTA</a></li>			
                  <li class="item"><a href="./contacto.html">CONTACTO</a></li>
                  <li class="item"><a href="./catalogo.php">CATÁLOGO GLOBAL</a></li>
                </ul>
              </div>
            </div>
            
            <div id="aside">
                <h2>Catálogo global</h2>';               
if($con){
    $result = mysqli_query($con, $query);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            $num_prod = $row['num_producto'];
            $nom_prog = $row['nomb_prog'];
            $company = $row['compania'];
            $os = $row['os'];
            $fecha = $row['fec_adq'];

            echo '<div class="unidad">
                    <h3>'.$nom_prog.'</h3>
                    <p>'.$company.'</p>
              </div>';
            }
      } else {
          echo '<p id="labelApps">NO HAY APLICACIONES DISPONIBLES</p>';
	      }
    mysqli_close($con);
    }
else {
    echo "no conectado!";
    }
echo '</div>
          </body>
          </html>';
?>

