<?php
require __DIR__ . '/vendor/autoload.php';
// https://desarrolloweb.com/articulos/variables-entorno-php-env.html
$dotenv = Dotenv\Dotenv::createImmutable('../../');
$dotenv->load();

$ip = $_POST['ip'];
$os = $_POST['os'];
$software = $_POST['app'];
$id = $_POST['id_user'];
$ejecucion = $_POST['ejecucion'];

$project_id = 43;
$api_token = $_ENV["PROJECT_TOKEN"];

$ip_key = "ANSIBLE_IP";
$os_key = "CLIENTE_OS"; 
$software_key = "ANSIBLE_SW";
$id_key = "CLIENTE_ID";
$ejecucion_key = "TIPO_EJECUCION";

$ip_value = $ip;
$os_value = $os;
$software_value = $software;
$id_value = $id;
$ejecucion_value = $ejecucion;


##Variable ip

$url = "http://150.136.254.165/api/v4/projects/{$project_id}/variables/{$ip_key}";

$data = array(
    'value' => $ip_value
);

// Creamos un cliente Guzzle
$client = new \GuzzleHttp\Client();

// Se envia una peticion GET para comprobar si la variable ya existe
$response = $client->get($url, [
    'headers' => [
        'PRIVATE-TOKEN' => $api_token,
    ],
]);

// Comprobamos el codigo de estado resultante
if ($response->getStatusCode() === 200) {
    // if the variable exists, update it
    $response = $client->put($url, [
        'headers' => [
            'PRIVATE-TOKEN' => $api_token,
        ],
        'form_params' => $data,
    ])->getBody()->getContents();
    echo '<!DOCTYPE html>
            <html lang="es">      
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=1, initial-scale=1.0">
                <title>Solicitud</title>
                <link rel="stylesheet" href="estilo3.css">
                <link rel="icon" href="./pics/blockchain.png">
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
                    <h2>Variables de la pipeline</h2>
                    </br>
                    <ul>
                    <li class="listVar"><p>Variable IP actualizada.</p></li>';

} else {
    // Si la variable no existe, la crea
    $response = $client->post("http://150.136.254.165/api/v4/projects/{$project_id}/variables", [
        'headers' => [
            'PRIVATE-TOKEN' => $api_token,
        ],
        'form_params' => array_merge($data, [
            'key' => $ip_key,
        ]),
    ])->getBody()->getContents();

    echo '<li class="listVar"><p>Variable IP creada.</p></li>';
}

###Variable os

$url = "http://150.136.254.165/api/v4/projects/{$project_id}/variables/{$os_key}";

$data = array(
    'value' => $os_value
);

// Creamos un cliente Guzzle
$client = new \GuzzleHttp\Client();

// Se envia una peticion GET para comprobar si la variable ya existe
$response = $client->get($url, [
    'headers' => [
        'PRIVATE-TOKEN' => $api_token,
    ],
]);

// Comprobamos el codigo de estado resultante
if ($response->getStatusCode() === 200) {
    // if the variable exists, update it
    $response = $client->put($url, [
        'headers' => [
            'PRIVATE-TOKEN' => $api_token,
        ],
        'form_params' => $data,
    ])->getBody()->getContents();

    echo '<li class="listVar"><p>Variable OS actualizada.</p></li>';
} else {
    // Si la variable no existe, la crea
    $response = $client->post("http://150.136.254.165/api/v4/projects/{$project_id}/variables", [
        'headers' => [
            'PRIVATE-TOKEN' => $api_token,
        ],
        'form_params' => array_merge($data, [
            'key' => $os_key,
        ]),
    ])->getBody()->getContents();

    echo '<li class="listVar"><p>Variable OS creada.</p></li>';
}

###Variable  sw

$url = "http://150.136.254.165/api/v4/projects/{$project_id}/variables/{$software_key}";

$data = array(
    'value' => $software_value
);

// Creamos un cliente Guzzle
$client = new \GuzzleHttp\Client();

// Se envia una peticion GET para comprobar si la variable ya existe
$response = $client->get($url, [
    'headers' => [
        'PRIVATE-TOKEN' => $api_token,
    ],
]);

// Comprobamos el codigo de estado resultante
if ($response->getStatusCode() === 200) {
    // if the variable exists, update it
    $response = $client->put($url, [
        'headers' => [
            'PRIVATE-TOKEN' => $api_token,
        ],
        'form_params' => $data,
    ])->getBody()->getContents();

    echo '<li class="listVar"><p>Variable software actualizada.</p></li>';
} else {
    // Si la variable no existe, la crea
    $response = $client->post("http://150.136.254.165/api/v4/projects/{$project_id}/variables", [
        'headers' => [
            'PRIVATE-TOKEN' => $api_token,
        ],
        'form_params' => array_merge($data, [
            'key' => $software_key,
        ]),
    ])->getBody()->getContents();

    echo '<li class="listVar"><p>Variable SOFTWARE creada.</p></li>';
}

##Variable id

$url = "http://150.136.254.165/api/v4/projects/{$project_id}/variables/{$id_key}";

$data = array(
    'value' => $id_value
);

// Creamos un cliente Guzzle
$client = new \GuzzleHttp\Client();

// Se envia una peticion GET para comprobar si la variable ya existe
$response = $client->get($url, [
    'headers' => [
        'PRIVATE-TOKEN' => $api_token,
    ],
]);

// Comprobamos el codigo de estado resultante
if ($response->getStatusCode() === 200) {
    // if the variable exists, update it
    $response = $client->put($url, [
        'headers' => [
            'PRIVATE-TOKEN' => $api_token,
        ],
        'form_params' => $data,
    ])->getBody()->getContents();

    echo '<li class="listVar"><p>Variable ID actualizada.</p></li>';
} else {
    // Si la variable no existe, la crea
    $response = $client->post("http://150.136.254.165/api/v4/projects/{$project_id}/variables", [
        'headers' => [
            'PRIVATE-TOKEN' => $api_token,
        ],
        'form_params' => array_merge($data, [
            'key' => $id_key,
        ]),
    ])->getBody()->getContents();

    echo '<li class="listVar"><p>Variable ID creada.</p></li>';
}

###Variable tipo_ejecucion

$url = "http://150.136.254.165/api/v4/projects/{$project_id}/variables/{$ejecucion_key}";

$data = array(
    'value' => $ejecucion_value
);

// Creamos un cliente Guzzle
$client = new \GuzzleHttp\Client();

// Se envia una peticion GET para comprobar si la variable ya existe
$response = $client->get($url, [
    'headers' => [
        'PRIVATE-TOKEN' => $api_token,
    ],
]);

// Comprobamos el codigo de estado resultante
if ($response->getStatusCode() === 200) {
    // if the variable exists, update it
    $response = $client->put($url, [
        'headers' => [
            'PRIVATE-TOKEN' => $api_token,
        ],
        'form_params' => $data,
    ])->getBody()->getContents();

    echo '<li class="listVar"><p>Variable TIPO_EJECUCION actualizada.</p></li>';
} else {
    // Si la variable no existe, la crea
    $response = $client->post("http://150.136.254.165/api/v4/projects/{$project_id}/variables", [
        'headers' => [
            'PRIVATE-TOKEN' => $api_token,
        ],
        'form_params' => array_merge($data, [
            'key' => $ejecucion_key,
        ]),
    ])->getBody()->getContents();

    echo '<li class="listVar"><p>Variable TIPO_EJECUCION creada.</p></li></ul>';
}

// Creamos un trigger (disparador) para la pipeline de GitLab
$pipeline_url = "http://150.136.254.165/api/v4/projects/{$project_id}/pipeline";
$pipeline_data = array(
    'ref' => 'main', // Se ejecutará en la rama main
);

// Enviamos una peticion POST para ejecutar el trigger de la pipeline
$pipeline_response = $client->post($pipeline_url, [
    'headers' => [
        'PRIVATE-TOKEN' => $api_token,
    ],
    'form_params' => $pipeline_data,
])->getBody()->getContents();

    echo '</div>
            <div id="aside">
            <h2>Estado de la solicitud</h2>
            </br>';

#Conexion a la tabla status de la bbdd

$conn = mysqli_connect("129.153.156.209:3306","root","Flot@nte23","it_users");

if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}

$sql = "select * from status where id_user='".$id."' and num_producto='".$software."'";
$result = mysqli_query($conn, $sql);

// Cerrar la conexión

$conn->close();

// Verificar si se encontraron resultados


echo '<iframe src="./frames/frame_'.$id_value.''.$software_value.'.txt" height="200" width="600" name="iframe" onerror="this.src="about:blank"">
      </iframe>
    </div>';


echo '<script>
  function refreshFrame(iframe) {
    var frame = window.frames[iframe];
    frame.location.reload();
  }
  // Example usage: refresh frame1 every 5 seconds
  setInterval(function() {
    refreshFrame("iframe");
  }, 5000);
</script>

</body>
</html>';
?>
