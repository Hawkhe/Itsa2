<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXAMEN DISEÑO Y PROGRAMACION WEB</title>
    <!-- CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px; /* Margen alrededor del cuerpo */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            max-width: 800px; /* Ancho máximo del contenido */
            width: 90%; /* Ancho del contenedor */
            padding: 20px; /* Espaciado interno del contenedor */
        }

        @media screen and (max-width: 600px) {
            /* Estilos para pantallas pequeñas */
            .container {
                width: 100%; /* Ancho completo en pantallas pequeñas */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $canal = curl_init();
        $url= 'https://jsonplaceholder.typicode.com/posts';
        curl_setopt($canal, CURLOPT_URL,$url);
        curl_setopt($canal, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($canal);

        if(curl_errno($canal)) {
            $error_msg = curl_error($canal);
            echo "Error al conectarse";
        } else {
            curl_close($canal);
            $datos = json_decode($respuesta, true);

            if (!empty($datos)) {
                // Clase "table" de Bootstrap y "table-striped" para filas alternadas
                echo '<div class="table-responsive">';
                echo '<table class="table table-striped">';
                echo '<thead class="table-dark">'; // Encabezado oscuro
                echo '<tr>';
                echo '<th scope="col" class="table-primary">USER ID</th>';
                echo '<th scope="col" class="table-secondary">ID</th>';
                echo '<th scope="col" class="table-success">TITLE</th>';
                echo '<th scope="col" class="table-danger">BODY</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                foreach ($datos as $json) {
                    echo '<tr>';
                    echo '<td class="table-primary">' . $json['userId'] . '</td>';
                    echo '<td class="table-secondary">' . $json['id'] . '</td>';
                    echo '<td class="table-success">' . $json['title'] . '</td>';
                    echo '<td class="table-danger">' . $json['body'] . '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
                echo '</div>';
            } else {
                echo "No hay datos disponibles.";
            }
        }
        ?>
    </div>
</body>
</html>
