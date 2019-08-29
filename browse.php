<?php
session_start();
require('utills/DBConnect.php');

function showGenres(){
?>

  <div class="dropdown float-right">
    Show by:  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Genre</button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
      <a class="dropdown-item" href="browse.php?genreId=1">Action</a>
      <a class="dropdown-item" href="browse.php?genreId=2">Adventure</a>
      <a class="dropdown-item" href="browse.php?genreId=8">Animation</a>
      <a class="dropdown-item" href="browse.php?genreId=12">Biography</a>
      <a class="dropdown-item" href="browse.php?genreId=3">Comedy</a>
      <a class="dropdown-item" href="browse.php?genreId=9">Crime</a>
      <a class="dropdown-item" href="browse.php?genreId=6">Drama</a>
      <a class="dropdown-item" href="browse.php?genreId=14">Family</a>
      <a class="dropdown-item" href="browse.php?genreId=7">Fantasy</a>
      <a class="dropdown-item" href="browse.php?genreId=15">History</a>
      <a class="dropdown-item" href="browse.php?genreId=13">Horror</a>
      <a class="dropdown-item" href="browse.php?genreId=17">Musical</a>
      <a class="dropdown-item" href="browse.php?genreId=11">Mystery</a>
      <a class="dropdown-item" href="browse.php?genreId=4">Romance</a>
      <a class="dropdown-item" href="browse.php?genreId=5">Sci-Fi</a>
      <a class="dropdown-item" href="browse.php?genreId=18">Short</a>
      <a class="dropdown-item" href="browse.php?genreId=10">Thriller</a>
      <a class="dropdown-item" href="browse.php?genreId=16">War</a>
    </div>
  </div>
  <br><br>

<?php
}

function showAllResults(){

      if(isset($_GET['genreId'])){
        $query = "SELECT m.id, title, description , CONCAT(d.firstName, ' ', d.lastName) AS dirName, g.name FROM movies as m, director as d, genres as g, movie_genre as mg
                  WHERE m.director_id=d.id AND m.id=mg.movie_id AND mg.genre_id=g.id AND g.id=".$_GET['genreId'];
      }else{
        $query = "SELECT * FROM movies";
      }

      //query to check number of movies available in DB; therefore use it for pagination
      $results = mysqli_query($GLOBALS['dbc'], $query);
      $noOfResults = mysqli_num_rows($results);

      $stepSize = 10;
      if(!isset($_GET['curPage']))
        $curPage = 0;
      else
        $curPage = $_GET['curPage'] - 1;

      $from = $curPage * $stepSize;
      $reqPages = ceil($noOfResults / $stepSize);

      echo '<div class="container">';
      showGenres();

      if(isset($_GET['genreId'])){
        $query = "SELECT m.id, title, description , CONCAT(d.firstName, ' ', d.lastName) AS dirName, g.name FROM movies as m, director as d, genres as g, movie_genre as mg
                  WHERE m.director_id=d.id AND m.id=mg.movie_id AND mg.genre_id=g.id AND g.id=".$_GET['genreId']." LIMIT ".$from.", ".$stepSize;
        $extendUrl = "genreId=".$_GET['genreId'];
      }else{
        $query = "SELECT movies.id, title, description , CONCAT(director.firstName, ' ', director.lastName) AS dirName FROM movies, director
                  WHERE movies.director_id=director.id LIMIT ".$from.", ".$stepSize;
        $extendUrl = "";
      }
      $results = mysqli_query($GLOBALS['dbc'], $query);

          foreach ($results as $row) {
?>
            <a href="view.php?movieId=<?php echo $row['id']; ?>">
              <div class="media mb-3">
                <img style=" width:100px; " class="mr-3 align-self-center" src="images/posters/<?php echo $row['title']."(main).jpg"; ?>">
                <div class="media-body  text-white">
                  <h5><?php  echo $row['title']; ?></h5>
                  <div class="text-secondary"><?php echo $row['description']; ?></div>
                </div>
              </div>
            </a>
<?php
          }
?>
          <!-- pagination logic -->
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
              <li class="page-item  <?php if($curPage+1 == 1) echo " disabled"; ?>">
                <a class="page-link" href="browse.php?<?php echo $extendUrl; ?>&curPage=<?php echo $curPage; ?>" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              <?php
              for($i=1; $i <= $reqPages; $i++){

                if($curPage+1 != $i)
                echo '<li class="page-item"><a class="page-link" href="browse.php?'.$extendUrl.'&curPage='.$i.'">'.$i.'</a></li>';
                else
                echo '<li class="page-item active"><a class="page-link" href="browse.php?'.$extendUrl.'&curPage='.$i.'">'.$i.'</a></li>';

              }
              ?>
              <li class="page-item<?php if($curPage+1 == $reqPages) echo " disabled"; ?>">
                <a class="page-link" href="browse.php?<?php echo $extendUrl; ?>&curPage=<?php echo $curPage+2; ?>" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Next</span>
                </a>
              </li>
            </ul>
          </nav>
    </div>

<?php
}//end of showAllResults funtion
?>

<html>
<head>
    <title>Movie Hunger - Browse Movies, Actors, Directors</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:400" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
      crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
</head>
<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
      <div class="container">
        <a class="navbar-brand" style=" color: #f39c12; " href="#">Movie Hunger</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="browse.php">Browse</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="aboutUs.php">About</a>
            </li>
          </ul>

          <form class="form-inline ml-auto" action="browse.php">
            <input type="text" class="form-control mr-2" name="searchString" placeholder="Search Movie...">
            <button name="searchSubmit" class="btn btn-outline-light">Search</button>
          </form>
        </div>
      </div>
    </nav>

<?php

  //if user searches movie in search box
  if(!empty($_GET['searchString']) && empty($_GET['directorSearch']) && empty($_GET['actorSearch'])){

    // $searchStringDup = $_GET['searchString'];
    // $searchString = $_GET['searchString'];
    // $searchKeywords = explode(" ", $searchString);
    // $replaceWith = "%'"." OR title LIKE "."'%";
    // $searchString = implode($replaceWith, $searchKeywords);
    $searchString = $_GET['searchString'];
    $searchStringDup = $_GET['searchString'];

    $query = "SELECT * FROM movies WHERE title LIKE '%".$searchString."%'";
    $results = mysqli_query($dbc, $query) or die("Cant' isuue SELECT query at line 142");

      if(mysqli_num_rows($results)>1){
        //if multiple results paginate them
        $noOfResults = mysqli_num_rows($results);
        $stepSize = 10;
        if(!isset($_GET['searchCurPage']))
          $searchCurPage = 0;
        else
          $searchCurPage = $_GET['searchCurPage'] - 1;
        $from = $searchCurPage * $stepSize;
        $reqPages = ceil($noOfResults / $stepSize);

        $searchString = $searchString.'%\' LIMIT '.$from.', '.$stepSize;
        $query = "SELECT * FROM movies WHERE title LIKE '%".$searchString;
        $results = mysqli_query($dbc, $query);

        echo '<div class="container">';
        showGenres();
        while($row = mysqli_fetch_array($results)){
          ?>
          <a href="view.php?movieId=<?php echo $row['id']; ?>">
            <div class="media mb-3">
              <img style=" width:100px; " class="mr-3 align-self-center" src="images/posters/<?php echo $row['title']."(main).jpg"; ?>">
              <div class="media-body  text-white">
                <h5><?php  echo $row['title']; ?></h5>
                <div class="text-secondary"><?php echo $row['description']; ?></div>
              </div>
            </div>
          </a>
<?php
        }
?>
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-end">
            <li class="page-item  <?php if($searchCurPage+1 == 1) echo " disabled"; ?>">
              <a class="page-link" href="browse.php?searchString=<?php echo $searchStringDup ?>&searchCurPage=<?php echo $searchCurPage; ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
<?php       //print the pages
            for($i=1; $i <= $reqPages; $i++){
              if($searchCurPage+1 != $i)
                  echo '<li class="page-item"><a class="page-link" href="browse.php?searchString='.$searchStringDup.'&searchCurPage='.$i.'">'.$i.'</a></li>';
              else //if curPage set it as active
                  echo '<li class="page-item active"><a class="page-link" href="browse.php?searchString='.$searchStringDup.'&searchCurPage='.$i.'">'.$i.'</a></li>';
            }
?>
            <li class="page-item<?php if($searchCurPage+1 == $reqPages) echo " disabled"; ?>">
              <a class="page-link" href="browse.php?searchString=<?php echo $searchStringDup ?>&amp;searchCurPage=<?php echo $searchCurPage+2; ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
      <?php
    }else if(mysqli_num_rows($results) == 1){
      //if single result redirect to view page with movieId concatenated
      $row = mysqli_fetch_array($results);
      $home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/view.php?movieId='.$row['id'];
      // header('Location:'.$home_url);
      echo '<script> location.replace("'.$home_url.'"); </script>';

    }else{
      //if no results found show error and all the movies avaliable in database
      echo '<div class="container alert alert-danger" role="alert"><strong>UH! OH!</strong> Seems like we don\'t have such a movie in the database. No Wories you have lot more than that. </div>';
      showAllResults();

    }

  }else if(!isset($_GET['genreId']) && !isset($_GET['curPage']) && empty($_GET['searchString']) && !isset($_GET['actorSearch']) && !isset($_GET['directorSearch'])){
    //if the searchString is empty show search bars

    echo '<div class="container">';
    showGenres();

    //search boxes
    echo '<div class="container py-5"><form action="browse.php">';
    echo '<div class="form-group">
        <label for="name">Movie Search</label>
        <input class="form-control" type="search" name="searchString" placeholder="Search by Movie title"></div>';
    echo '<div class="form-group">
        <label for="name">Director Search</label>
        <input class="form-control" type="search" name="directorSearch" placeholder="Search by Director name"></div>';
    echo '<div class="form-group">
        <label for="name">Actor Search</label>
        <input class="form-control" type="search" name="actorSearch" placeholder="Search by Actor name"></div>';
    echo '<button class="btn btn-light float-right" type="submit">Submit</button>';
    echo '</form></div>';

  }else if(!empty($_GET['directorSearch'])){
    //if user searched for director

    $query = "SELECT CONCAT(d.firstName, ' ', d.lastName) AS name, m.id AS id, m.description AS description, m.title AS title FROM movies AS m, director AS d WHERE
              m.director_id=d.id AND (d.firstName LIKE '%".$_GET['directorSearch']."%' OR d.lastName LIKE '%".$_GET['directorSearch']."%' OR CONCAT(d.firstName, ' ', d.lastName) LIKE '%".$_GET['directorSearch']."%')";
    $results = mysqli_query($dbc, $query) or die($query);

    echo '<div class="container">';
    if(mysqli_num_rows($results)>0){

      $show;
      while($row = mysqli_fetch_array($results)){
        if( empty($show) ){
          echo '<div class="alert alert-info" role="alert">Showing movies of director <strong>'.$row['name'].'</strong>.</div>';
          $show = "not empty";
        }
        $id = $row['id'];
        $title = $row['title'];
        $description = $row['description'];
        echo '<a href="view.php?movieId='.$id.'">
                <div class="media mb-3">
                  <img style=" width:100px; " class="mr-3 align-self-center" src="images/posters/'.$title."(main).jpg".'">
                  <div class="media-body  text-white">
                    <h5>'.$title.'</h5>
                    <div class="text-secondary">'.$description.'</div>
                  </div>
                </div>
              </a>';
      }
      }else{
        echo '<div class="alert alert-danger" role="alert"><strong>UH! OH!</strong> Seems like we don\'t have such a director in the database. No Wories you have lot more than that.</div>';
        showAllResults();
      }
      echo '</div>';

  }else if(!empty($_GET['actorSearch'])){
    //if user seached for actor

    $query = "SELECT DISTINCT m.id AS id, m.description AS description, m.title AS title, CONCAT(a.firstName, ' ', a.lastName) AS name FROM movies AS m, actors AS a, movie_actors AS ma
              WHERE m.id=ma.movie_id AND ma.actor_id=a.id AND (a.firstName LIKE '%".$_GET['actorSearch']."%' OR a.lastName LIKE '%".$_GET['actorSearch']."%' OR CONCAT(a.firstName, ' ', a.lastName) LIKE '%".$_GET['actorSearch']."%')";
    $results = mysqli_query($dbc, $query) or die($query);

    echo '<div class="container">';
    if(mysqli_num_rows($results)>0){

      $show;
      while($row = mysqli_fetch_array($results)){
        if(empty($show)){
          echo '<div class="alert alert-info" role="alert">Showing movies of actor <strong>'.$row['name'].'</strong>.</div>';
          $show = "done";
        }
        $id = $row['id'];
        $title = $row['title'];
        $description = $row['description'];
        echo '<a href="view.php?movieId='.$id.'">
                <div class="media mb-3">
                  <img style=" width:100px; " class="mr-3 align-self-center" src="images/posters/'.$title."(main).jpg".'">
                  <div class="media-body  text-white">
                    <h5>'.$title.'</h5>
                    <div class="text-secondary">'.$description.'</div>
                  </div>
                </div>
              </a>';
      }
    }else{
      echo '<div class="alert alert-danger" role="alert"><strong>UH! OH!</strong> Seems like we don\'t have such an actor in the database. No Wories you have lot more than that.</div>';
      showAllResults();
    }
    echo '</div>';// close div container from line 283
  }else{
    showAllResults();
  }

?>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
