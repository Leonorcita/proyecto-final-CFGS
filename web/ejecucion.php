<?php
$id = $_POST['id_user'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$os = $_POST['os'];
$activity = $_POST['activity'];
$ip = $_POST['ip'];

$address = $_POST['address'];
$userOS = $_POST['userOS'];

$software = $_POST['app'];
$estado = 'Incompleto';

$con = mysqli_connect("129.153.156.209:3306","root","Flot@nte23","it_users");
$query = "select estado from status where id_user='".$id."' and num_producto='".$software."'";

if($con){
    $result = mysqli_query($con, $query);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
			$estado = $row['estado'];
		}
	}
}
    echo '<!DOCTYPE html>
          <html lang="es">      
          <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=1, initial-scale=1.0">
            <title>Solicitud</title>
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
              <form action="set_gitlab_variable.php" method="post">
              <h2>Hola, '.$first_name.'!</h2>
              </br>
              <p>ID: '.$id.'</p>
              <p>Nombre: '.$first_name.'</p>
              <p>Apellido: '.$last_name.'</p>
              <p>Email: '.$email.'</p>
              <p>Sistema Operativo: '.$os.'</p>
              <p>Cargo: '.$activity.'</p>
              <p>Dirección IP: '.$ip.'</p>
			  
              <input type="hidden" name="ip" id="ip" value="'.$ip.'">
              <input type="hidden" name="id_user" id="id_user" value="'.$id.'">
              <input type="hidden" name="os" id="os" value="'.$os.'">
			        <input type="hidden" name="app" id="app" value="'.$software.'">

              </br>  
              <h2>Conexión realizada</h2>
              </br>
              <p>Dirección IP: '. $address .'</p>
              <p>Sistema Operativo: '.$userOS.'</p>
			</div>
            <div id="aside">';

$software_query = "select nomb_prog from programas where num_producto='".$software."'";
$software_result = mysqli_query($con, $software_query);

if ($software_result->num_rows > 0) {
while ($row = $software_result->fetch_assoc()) {
            $nombre_software = $row['nomb_prog'];
      }  
}                 
            echo '<h2>'.$nombre_software.'. Acciones disponibles</h2>               
                <div id="radio2">
                  <div class="article">
                    <input type="radio" id="instalar" name="ejecucion" value="instalar" required />
                    <label for="instalar">
                    <h3>INSTALAR</h3>
                    </label>
                  </div>
                  <div class="article">
                    <input type="radio" id="reinstalar"name="ejecucion" value="reinstalar" required />
                    <label for="reinstalar">
                    <h3>REINSTALAR</h3>
                    </label>
                  </div>
                  <div class="article">
                    <input type="radio" id="desinstalar"name="ejecucion" value="desinstalar" required />
                    <label for="desinstalar">
                    <h3>DESINSTALAR</h3>
                    </label>
                  </div>
                </div>
			<button type="submit" id="botonContinuar">Iniciar Solicitud</button>
			<script>
				let rInstalar = document.getElementById("instalar");
				let rReinstalar = document.getElementById("reinstalar");
				let rDesinstalar = document.getElementById("desinstalar");
				
				if ("'.$estado.'" == "Completo")
				{
					rInstalar.disabled = true;
					rReinstalar.disabled = false;
					rDesinstalar.disabled = false;
				}
				else
				{
					rInstalar.disabled = false;
					rReinstalar.disabled = true;
					rDesinstalar.disabled = true;
				}
			</script>';
?>
