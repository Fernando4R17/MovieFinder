<?php 
$mysqli = new mysqli("","","","",3306);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Peliculas</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/main.js"></script>

</head>
<body>
  <nav class="navbar sticky-top  navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><h1>Movie Finder</h1></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <button type="button" class="btn btn-outline-secondary" onclick="topFunction()" id="toTop">Back To Top</button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Recomendation
            </a>
            <ul class="dropdown-menu">
              <form id="filtro" id="searchMovie" name="searchMovie" method="POST">
                <!-- Genre -->
                <li>
                  <div class="dropdown-item">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" role="switch" data-bs-toggle="collapse" id="genre_id" onclick="genreVal()" data-bs-target="#collapseGenre" aria-expanded="false" aria-controls="collapseGenre">
                      <label class="form-check-label" for="flexSwitchGenre">Genre</label>
                    </div>
                    <select class="form-select m-2 collapse" id="collapseGenre" name="genre" aria-label="Genre">
                      <option selected value="">Choose a Genre</option>
                      <?php 
                      $query = $mysqli -> query("SELECT DISTINCT genre FROM movies ORDER BY genre ASC");
                      while($fila = mysqli_fetch_array($query)){
                        echo '<option value="'.$fila['genre'].'">'.$fila['genre'].'</option>';
                      }
                      ?>
                    </select>
                  </div>
                </li>
                <!-- Film Production Company -->
                <li>
                  <div class="dropdown-item">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" role="switch" data-bs-toggle="collapse" id="company_id" onclick="companyVal()" data-bs-target="#collapseCompany" aria-expanded="false" aria-controls="collapseCompany">
                      <label class="form-check-label" for="flexSwitchCompany">Film Production Company</label>
                    </div>
                    <select class="form-select m-2 collapse" id="collapseCompany" name="company" aria-label="Company">
                    <option selected value="">Choose a Company</option>
                    <?php 
                    $query = $mysqli -> query("SELECT DISTINCT company FROM movies ORDER BY company ASC");
                    while($fila = mysqli_fetch_array($query)){
                      echo '<option value="'.$fila['company'].'">'.$fila['company'].'</option>';
                    }
                    ?>
                    </select>
                  </div>
                </li>
                <!-- Language -->
                <li>
                  <div class="dropdown-item">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" role="switch" data-bs-toggle="collapse" id="language_id" onclick="languageVal()" data-bs-target="#collapseLanguage" aria-expanded="false" aria-controls="collapseLanguage">
                      <label class="form-check-label" for="flexSwitchLanguage">Language</label>
                    </div>
                    <select class="form-select m-2 collapse" id="collapseLanguage" name="language" aria-label="Language">
                      <option selected value="">Choose a Language</option>
                      <?php 
                      $query = $mysqli -> query("SELECT DISTINCT language FROM movies");
                      while($fila = mysqli_fetch_array($query)){
                        echo '<option value="'.$fila['language'].'">'.$fila['language'].'</option>';
                      }
                      ?>
                    </select>
                  </div>
                </li>
                <!-- Release Date -->
                <li>
                  <div class="dropdown-item">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" role="switch" data-bs-toggle="collapse" id="release_id" onclick="releaseVal()" data-bs-target="#collapseReleaseDate" aria-expanded="false" aria-controls="collapseReleaseDate">
                      <label class="form-check-label" for="flexSwitchReleaseDate">Release Date</label>
                    </div>
                    <select class="form-select m-2 collapse" id="collapseReleaseDate" name="release" aria-label="Release Date">
                      <option selected value="">Choose a Release Date</option>
                      <?php 
                      $query = $mysqli -> query("SELECT DISTINCT YEAR(release_date) From movies order by release_date Desc;");
                      while($fila = mysqli_fetch_array($query)){
                        echo '<option value="'.$fila['YEAR(release_date)'].'">'.$fila['YEAR(release_date)'].'</option>';
                      }
                      ?>
                    </select>
                  </div>
                </li>
                <!-- Country -->
                <li>
                  <div class="dropdown-item">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" role="switch" data-bs-toggle="collapse" id="country_id" onclick="countryVal()" data-bs-target="#collapseCountry" aria-expanded="false" aria-controls="collapseCountry">
                      <label class="form-check-label" for="flexSwitchCountry">Country</label>
                    </div>
                    <select class="form-select m-2 collapse" id="collapseCountry" name="country" aria-label="Country">
                      <option selected  value="">Choose a Country</option>
                      <?php 
                      $query = $mysqli -> query("SELECT DISTINCT Country From movies order by Country ASC;");
                      while($fila = mysqli_fetch_array($query)){
                        echo '<option value="'.$fila['Country'].'">'.$fila['Country'].'</option>';
                      }
                      ?>
                    </select>
                  </div>
                </li>
                <li><hr class="dropdown-divider"></li>
                <center><button class="btn btn-outline-secondary" type="Submit" id="RecBuscar">Search</button></center>
              </form>
            </ul>
          </li>
        </ul>
        <input class="form-control col-2 me-2" type="text" placeholder="Search" aria-label="Search" id="inbusqueda">
        <button class="btn btn-outline-success" type="submit" id="buscar">Search</button>
      </div>
    </div>
  </nav>
  <div class="container-fluid">
    <a class="inicio"></a>
    <br>
    <div class="row m-2">
      <div class="card col-12">
        <div class="card-body">
          <div id="datos"></div>
        </div>
        
      </div>
      
    </div>

  </div>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#RecBuscar').click(function(){
        datos = "Genre=" + $('#collapseGenre').val() +
              "&Company=" + $('#collapseCompany').val() +
              "&Language=" + $('#collapseLanguage').val() +
              "&ReDa=" + $('#collapseReleaseDate').val() +
              "&Country=" + $('#collapseCountry').val();

        $.ajax({
          url:'php/recbuscar.php',
          type:'POST',
          dataType: 'html',
          data: datos,
        })
        .done(function(respuesta) {
          $("#datos").html(respuesta);
        })
        return false;
      })
    })
    let mybutton = document.getElementById("toTop");
    function topFunction() {
      document.documentElement.scrollTop = 0; 
    }


    function genreVal(){
      if($('#genre_id').hasClass('collapsed')) {
        $('#collapseGenre').prop("selectedIndex", 0);
      }
    }
    function companyVal(){
      if($('#company_id').hasClass('collapsed')) {
        $('#collapseCompany').prop("selectedIndex", 0);
      }
    }
    function languageVal(){
      if($('#language_id').hasClass('collapsed')) {
        $('#collapseLanguage').prop("selectedIndex", 0);
      }
    }
    function releaseVal(){
      if($('#release_id').hasClass('collapsed')) {
        $('#collapseReleaseDate').prop("selectedIndex", 0);
      }
    }
    function countryVal(){
      if($('#country_id').hasClass('collapsed')) {
        $('#collapseCountry').prop("selectedIndex", 0);
      }
    }
  </script>

  
</body>
  <script src="plugins/sweetalert2.all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>