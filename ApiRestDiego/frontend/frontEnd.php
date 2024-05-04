<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/ApiRestDiego/CSS/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
    $canal = curl_init();
    $url= 'http://localhost/ApiRestDiego/backend/get_all_animal.php';
    curl_setopt($canal, CURLOPT_URL,$url);
    curl_setopt($canal, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($canal);

    if(curl_errno($canal))
    {
        $error_msg=curl_error($canal);
        echo "Error al conectarse";
    }
    else{
        curl_close($canal);
        $datos= json_decode($respuesta, true);

        if (!empty($datos)) {
            echo '<table  border="1">';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Edad</th>';
            echo '<th>Especie</th>';
            echo '<th>Clasificacion</th>';
            echo '<th>Estado</th>';
            echo '<th>Acciones</th>';
            echo '</tr>';

            foreach ($datos as $animal) {
                echo '<tr>';
                echo '<td>' . $animal['id'] . '</td>';
                echo '<td>' . $animal['edad'] . '</td>';
                echo '<td>' . $animal['especie'] . '</td>';
                echo '<td>' . $animal['clasificacion'] . '</td>';
                echo '<td>' . $animal['estado'] . '</td>';
                echo '<td>';
                echo '<button onclick="editAnimal(' . $animal['id'] . ')">Editar</button>';
                echo '<button onclick="deleteAnimal(' . $animal['id'] . ')">Eliminar</button>';
                echo '</td>';
                echo '</tr>';
            }

            // Boton para agregar un nuevo animal
            echo '<tr>';
            echo '<td colspan="5"></td>'; 
            echo '<td><button onclick="openAddAnimalForm()">Agregar Nuevo</button></td>';
            echo '</tr>';

            echo '</table>';
        } else {
            echo "No hay datos disponibles.";
        }
    }
    ?>

    <!-- Modal para editar/agregar animal -->
    <div id="animalModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 id="modalTitle"></h2>
            <div id="formContainer">
               
            </div>
        </div>
    </div>
    
    <script>
       function editAnimal(id) {
    fetch('http://localhost/ApiRestDiego/backend/get_by_id_animal.php?id=' + id)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            const form = `
                <form id="animalForm" onsubmit="submitAnimalForm(event, ${id})">
                    <input type="hidden" id="animal-id" name="id" value="${id}">
                    Edad: <input type="text" id="animal-edad" name="edad" value="${data.edad}"><br>
                    Especie: <input type="text" id="animal-especie" name="especie" value="${data.especie}"><br>
                    Clasificación: <input type="text" id="animal-clasificacion" name="clasificacion" value="${data.clasificacion}"><br>
                    Estado: <input type="text" id="animal-estado" name="estado" value="${data.estado}"><br>
                    <input type="submit" value="Guardar">
                </form>
            `;
            
            document.getElementById('modalTitle').innerText = 'Editar Animal';
            document.getElementById('formContainer').innerHTML = form;
            document.getElementById('animalModal').style.display = 'block';
        })
        .catch(error => console.error('Error:', error));
}
function deleteAnimal(id) {
    console.log(id);
    fetch('http://localhost/ApiRestDiego/backend/delete_animal.php?id=' + id)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);     
            location.reload();
        })
        .catch(error => console.error('Error:', error));
}

        function openAddAnimalForm() {
            const form = `
                <form id="animalForm" onsubmit="submitAnimalForm(event, null)">
                    Edad: <input type="text" id="animal-edad" name="edad"><br>
                    Especie: <input type="text" id="animal-especie" name="especie"><br>
                    Clasificación: <input type="text" id="animal-clasificacion" name="clasificacion"><br>
                    Estado: <input type="text" id="animal-estado" name="estado"><br>
                    <input type="submit" value="Guardar">
                </form>
            `;
            
            document.getElementById('modalTitle').innerText = 'Agregar Nuevo Animal';
            document.getElementById('formContainer').innerHTML = form;
            document.getElementById('animalModal').style.display = 'block';
        }

        function submitAnimalForm(event, id) {
    event.preventDefault();

    const formData = new FormData(document.getElementById('animalForm'));
    const url = id ? 'http://localhost/ApiRestDiego/backend/update_animal.php' : 'http://localhost/ApiRestDiego/backend/create_animal.php';

    fetch(url, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        document.getElementById('animalForm').reset();
        document.getElementById('animalModal').style.display = 'none';
        location.reload();
    })
    .catch(error => console.error('Error:', error));
}


        function closeModal() {
            document.getElementById('animalModal').style.display = 'none';
        }

    </script>

</body>
</html>
