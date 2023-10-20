<?php 
    $mysqli = new mysqli("localhost","root","15092020","movies",3306);

    $salida = "";

    if($_POST['Genre'] == ""){ $_POST['Genre'] = " ";} 
    $aKeyword = explode(" ", $_POST['Genre']);

    if($_POST['Genre'] == "" AND $_POST['Company'] == "" AND $_POST['Language'] == "" AND $_POST['ReDa'] == "" AND $_POST['Country'] == ""){

    }else{
        $query = "SELECT * FROM movies ";

        if($_POST['Genre'] != ""){
            $query .= "WHERE (genre LIKE LOWER('%".$aKeyword[0]."%'))";
            
            for($i = 1; $i < count($aKeyword); $i++){
                if(!empty($aKeyword[$i])){
                    $query .= "OR genre LIKE '%" . $aKeyword[$i] . "%'";
                }
            }
        }

        if ($_POST["Company"] != ""){
            $query .= "AND company = '".$_POST['Company']."'";
        }

        if ($_POST["Language"] != ""){
            $query .= "AND language = '".$_POST['Language']."'";
        }

        if ($_POST["ReDa"] != ""){
            $query .= "AND YEAR(release_date) = '".$_POST['ReDa']."'";
        }

        if ($_POST["Country"] != ""){
            $query .= "AND Country = '".$_POST['Country']."'";
        }

        $sql = $mysqli->query($query);

        $numerosql = mysqli_num_rows($sql);
    }




    if($sql->num_rows > 0){
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

        while($fila = $sql->fetch_assoc()){
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