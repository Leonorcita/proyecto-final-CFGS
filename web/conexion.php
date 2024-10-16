<?php
$userName = $_POST['user'];
$pass = $_POST['password'];
$userOS = $_POST['os'];
$con = mysqli_connect("129.153.156.209:3306","root","Flot@nte23","it_users");
$query = "select * from users where nombre='".$userName."' and password='".$pass."'";

if($con){
    $result = mysqli_query($con, $query);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['id_user'];
            $first_name = $row['nombre'];
            $last_name = $row['apellido'];
            $email = $row['email'];
            $password = $row['password'];
            $os = $row['os'];
            $activity = $row['cargo'];
            $ip = $row['ip'];

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $address = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
      $address = $_SERVER['REMOTE_ADDR'];
    }

    $product_query = "select altas.id_user as id_user, altas.num_producto as num_producto, nomb_prog, os from altas left join (programas) ON (altas.num_producto = programas.num_producto) where id_user='".$id."'";
    $product_result = mysqli_query($con, $product_query);

    $count_query = "select COUNT(altas.id_user) as cuenta from altas left join (programas) ON (altas.num_producto = programas.num_producto) where id_user='".$id."'";
	  $count_result = mysqli_query($con, $count_query);

    echo '<!DOCTYPE html>
          <html lang="es">      
          <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=1, initial-scale=1.0">
            <title>Intranet</title>
            <link rel="stylesheet" href="estilo2.css">
            <link rel="icon" href="./pics/blockchain.png">
            <link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
          </head>
          <body>
            <div id="header">
              <h1>WEBSITE</h1>
              <div id="nav">
                <ul id="menu">
                  <li class="item"><a href="./home.html">HOME</a></li>
                  <li class="item"><a href="./index.html">MI CUENTA</a></li>			
                  <li class="item"><a href="./contacto.html">CONTACTO</a></li>
                  <li class="item"><a href="./catalogo.php">CATÁLOGO GLOBAL</a></li>
                </ul>
              </div>
            </div>
            <div id="section">
              <form action="ejecucion.php" method="post">
              <h2>Hola, '.$first_name.'!</h2>
              </br>
              <p>ID: '.$id.'</p>
              <p>Nombre: '.$first_name.'</p>
              <p>Apellido: '.$last_name.'</p>
              <p>Email: '.$email.'</p>
              <p>Sistema Operativo: '.$os.'</p>
              <p>Cargo: '.$activity.'</p>
              <p>Dirección IP: '.$ip.'</p>
                
        <input type="hidden" name="id_user" id="id_user" value="'.$id.'">
			  <input type="hidden" name="first_name" id="first_name" value="'.$first_name.'">
			  <input type="hidden" name="last_name" id="last_name" value="'.$last_name.'">
			  <input type="hidden" name="email" id="email" value="'.$email.'">
			  <input type="hidden" name="os" id="os" value="'.$os.'">
			  <input type="hidden" name="activity" id="activity" value="'.$activity.'">
			  <input type="hidden" name="ip" id="ip" value="'.$ip.'">

              </br>  
              <h2>Conexión realizada</h2>
              </br>
              <p>Dirección IP: '. $address .'</p>
              <p>Sistema Operativo: '.$userOS.'</p>
			  
			  <input type="hidden" name="address" id="address" value="'.$address.'">
			  <input type="hidden" name="userOS" id="userOS" value="'.$userOS.'">
			  
            </div>
            <div id="aside">
                <h2>Aplicaciones disponibles</h2>               
                <div id="radio1">';

    while ($row = $product_result->fetch_assoc()) {
            $bbdd_id = $row['num_producto'];
            $bbdd_nombre = $row['nomb_prog'];

            echo '<div class="article">
                    <input type="radio" id="control_'.$bbdd_id.'" name="app" value="'.$bbdd_id.'" required />
                    <label for="control_'.$bbdd_id.'">
                    <h3>'.$bbdd_nombre.'</h3>
                    </label>
                  </div>';
          }
          echo '</div>
                
                <p id="labelApps">NO ESTAS DADO DE ALTA EN NINGUNA APLICACION</p>               
                <button type="submit" id="botonContinuar">Continuar</button>
                <p id="labelDenegado">PERMISO DENEGADO. POR FAVOR, CONTACTA CON EL ADMINISTRADOR</p>
                
				        </br>                
                <script>
                          let btnContinuar = document.getElementById("botonContinuar");
                          let lblDenegado = document.getElementById("labelDenegado");
                          if ("'.$address.'" != "'.$ip.'" || "'.$userOS.'" != "'.$os.'"){
                            btnContinuar.disabled = true;
                          }
                          else
                          {
                            btnContinuar.disabled = false;                         
                            lblDenegado.style.display = "none";
                          }';

    while ($row = $count_result->fetch_assoc()) {
			$cuenta = $row['cuenta'];
	  }
					          echo 'let lblApps = document.getElementById("labelApps");
						              if ("'.$cuenta.'" == "0"){
                            btnContinuar.disabled = true;
                          }
                          else
                          {                  
                            lblApps.style.display = "none";
                          }                          					
                  </script>
              </form>
            </div>
          </body>
          </html>';
        }
      } else {
          echo'<script type="text/javascript">
                alert("Usuario o contraseña incorrectos");
                window.location.href="index.html";
               </script>';
      }

    mysqli_close($con);
}else{
    echo "no conectado!";
}

?>
