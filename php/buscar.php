<?php 
    $mysqli = new mysqli("localhost","root","15092020","movies",3306);

    $salida = "";
    $query = "SELECT title, overview,release_date,company,genre,Country,language FROM movies order by rand() limit 5";

    if(isset($_POST['consulta'])){
        $q = $mysqli->real_escape_string($_POST['consulta']);
        $query = "SELECT title, 
                        overview,
                        actors, 
                        release_date, 
                        company, 
                        genre, 
                        Country,
                        language 
                    FROM movies 
                    WHERE title LIKE '%".$q."%' OR 
                        actors LIKE '%".$q."%' OR
                        release_date LIKE '%".$q."%' OR 
                        company LIKE '%".$q."%' OR 
                        genre LIKE '%".$q."%' OR 
                        Country LIKE '%".$q."%' OR 
                        language LIKE '%".$q."%'";
        
    }

    $resultado = $mysqli->query($query);

    if($resultado->num_rows > 0){
        $salida.="<table class='table tabla_datos'>
                    <thead>
                        <tr>
                            <td class='col-2 mb-2'>Movie</td>
                            <td class='col-5 mb-2'>Overview</td>
                            <td class='col-1 mb-2'>Release Date</td>
                            <td class='col-1 mb-2'>Company</td>
                            <td class='col-1 mb-2'>Genre</td>
                            <td class='col-2 mb-2'>Filming Location</td>
                            <td class='col-2 mb-2'>Language</td>
                            
                        </tr>
                    </thead>
                    <tbody>"; 

        while($fila = $resultado->fetch_assoc()){
            $salida.="<tr>
                    <td class='col-2 mb-2'>".$fila['title']."</td>
                    <td class='col-5 mb-4'>".$fila['overview']."</td>
                    <td class='col-1 mb-2'>".$fila['release_date']."</td>
                    <td class='col-1 mb-2'>".$fila['company']."</td>
                    <td class='col-1 mb-2'>".$fila['genre']."</td>
                    <td class='col-2 mb-2'>".$fila['Country']."</td>
                    <td class='col-2 mb-2'>".$fila['language']."</td>
                </tr>";
                
        }
        $salida.="</tbody></table>";
    }else{
        $salida.="No hay peliculas con esos datos.";
    }

    echo $salida;

    $mysqli->close();
?>