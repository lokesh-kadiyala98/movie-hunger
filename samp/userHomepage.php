<?php

  session_start();
  $dbc = mysqli_connect('localhost','id7925529_root','Jyothi123','id7925529_movie_hunger') or die("Couldn't connect to database");

  if(!empty($_SESSION['email']) && isset($_POST['loginProcess']) || !empty($_SESSION['email']) && isset($_POST['signupProcess'])){
    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/userHomepage.php?msg=Seems like <b>'.$_SESSION['username'].'</b> is already logged in. Please!! logout and try.';
    header("Location:".$url);
  }

?>

<html>
    <head>
        <title>Movie Hunger - User Home Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato:400" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style2.css">
    </head>
    <body>

             <?php
                function setUserCookie($email, $firstName, $lastName){

                    $_SESSION['email'] = $email;
                    $_SESSION['username'] = $firstName.' '.$lastName;

                }

                function navbar(){
             ?>
                    <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
                         <div class="container">
                            <a class="navbar-brand" style=" color: #f39c12; " href="#">Movie Hunger</a>
                            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="userHomepage.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="userPersonalize.php">Personalize</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="userSearch.php?searchString=">Browse</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="logout.php">Logout <?php echo "<span class='text-muted'>(".$_SESSION['username'].")</span>"; ?></a>
                                    </li>
                                </ul>

                                <form class="form-inline ml-auto" action="userSearch.php">
                                    <input type="text" name="searchString" class="form-control mr-2" placeholder="Search...">
                                    <button name="searchSubmit" class="btn btn-outline-light">Search</button>
                                </form>
                            </div>
                        </div>
                    </nav>
             <?php
                }

                function showcase(){//display top movies based on most reviews

                    //$query = "SELECT * FROM movies LIMIT 28,3";
                    $query ="SELECT id, title, description, COUNT(*) FROM movies, movie_reviews WHERE movies.id=movie_reviews.movie_id GROUP BY movie_reviews.movie_id ORDER BY COUNT(*) DESC LIMIT 3";
                    $trendingMovies = mysqli_query($GLOBALS['dbc'], $query) or die("Couldn't issue SELECT query at line 66");

                    $row = mysqli_fetch_array($trendingMovies);
                    $id1 = $row['id'];
                    $title1 = $row['title'];
                    $image1 = $title1."(main).jpg";
                    $description1 = $row['description'];

                    $row = mysqli_fetch_array($trendingMovies);
                    $id2 = $row['id'];
                    $title2 = $row['title'];
                    $image2 = $title2."(main).jpg";
                    $description2 = $row['description'];

                    $row = mysqli_fetch_array($trendingMovies);
                    $id3 = $row['id'];
                    $title3 = $row['title'];
                    $image3 = $title3."(main).jpg";
                    $description3 = $row['description'];

                    $query = "SELECT m.id, m.title, m.description FROM movies AS m, movie_genre AS mg, movie_reviews AS mr
                              WHERE m.id=mg.movie_id AND m.id=mr.movie_id AND mg.genre_id IN
                              (SELECT mg.genre_id FROM movie_genre AS mg, user_genre_personalize AS ugp, users AS u
                              WHERE mg.genre_id=ugp.genre_id AND ugp.user_id=u.id AND u.id=(SELECT id FROM users WHERE email='".$_SESSION['email']."')) GROUP BY mr.movie_id ORDER BY count(*) DESC LIMIT 5";
                    $topPicks = mysqli_query($GLOBALS['dbc'], $query) or die("couldnt issue query at personalize genres");//based on favourite genres

                    $query = "SELECT CONCAT(d2.firstName, ' ', d2.lastName) AS directorName, title, m2.id AS movieId FROM movies AS m2, director AS d2 WHERE m2.director_id=d2.id AND m2.id NOT IN
                              (SELECT movie_id FROM movie_reviews WHERE user_id=(SELECT id FROM users WHERE email='".$_SESSION['email']."') ) AND d2.id IN
                              (SELECT DISTINCT m1.director_id FROM movies as m1 WHERE m1.id in
                              (SELECT mr.movie_id FROM movie_reviews as mr WHERE mr.rating>4 AND mr.user_id=(SELECT id FROM users WHERE email='".$_SESSION['email']."') ) )";
                    $movieSuggestions = mysqli_query($GLOBALS['dbc'], $query) or die ("couldn't issue movie suggestions query");//based on review given to a movie

             ?>
                    <div class="container">

                       <div class="display-3 mb-3 text-light">Trending Movies</div>
                        <div class="card-columns">
                            <a href="userView.php?movieId=<?php echo $id1; ?>">
                              <div class="card">
                                  <img class="card-img-top img-fluid" src="../images/posters/<?php echo $image1; ?>" alt="<?php echo $title1; ?> image">
                                  <div class="card-body text-dark">
                                      <h4 class="card-title"><?php echo $title1; ?></h4>
                                      <p class="card-text"><?php echo $description1; ?></p>
                                  </div>
                              </div>
                            </a>
                            <a href="userPersonalize.php">
                                <div class="card p-3 bg-dark text-white">
                                    <blockquote>
                                        <p class="display-4">Personalize.</p>
                                        <footer>
                                            <small>
                                                You know? you can personalize this site to show you the best picks as per your interests.
                                            </small>
                                        </footer>
                                    </blockquote>
                                </div>
                            </a>
                            <a href="userView.php?movieId=<?php echo $id2; ?>">
                              <div class="card">
                                  <img class="card-img-top img-fluid" src="../images/posters/<?php echo $image2; ?>" alt="<?php echo $title2; ?> image">
                                  <div class="card-body text-dark">
                                      <h4 class="card-title"><?php echo $title2 ?></h4>
                                      <p class="card-text"><?php echo $description2 ?></p>
                                  </div>
                              </div>
                            </a>
                            <a href="userView.php?movieId=<?php echo $id3; ?>">
                              <div class="card">
                                  <img class="card-img-top img-fluid" src="../images/posters/<?php echo $image3; ?>" alt="<?php echo $title3; ?> image">
                                  <div class="card-body text-dark">
                                      <h4 class="card-title"><?php echo $title3 ?></h4>
                                      <p class="card-text"><?php echo $description3 ?></p>
                                  </div>
                              </div>
                            </a>
                        </div>
                        <hr>
             <?php
                        if(mysqli_num_rows($topPicks)){
                            echo '<div class="display-3 mb-3 text-light">Top Picks</div>';
                            foreach ($topPicks as $row) {
                              echo '<a href="userView.php?movieId='.$row['id'].'">';
                              echo '<div class="media mb-3">';
                              echo '<img style=" width:100px;" class="mr-3 align-self-center" src="../images/posters/'.$row['title'].'(main).jpg">';
                              echo '<div class="media-body  text-white">';
                              echo '<h5>'.$row['title'].'</h5>';
                              echo '<div class="text-secondary">'.$row['description'].'</div>';
                              echo '</div>';
                              echo '</div>';
                              echo '</a>';
                            }
                            echo '</div>';  //end of container at line 94
                        }

                        $nextDirectorName = "";

                        if(mysqli_num_rows($movieSuggestions)) {
                          foreach ($movieSuggestions as $row) {

                            $directorName = $row['directorName'];

                            if($directorName != $nextDirectorName) {

                              echo '<div class="display-4 mb-3 text-light">'.$directorName.'\'s movies you may like</div>';
                              echo '<a href="userView.php?movieId='.$row['movieId'].'"><img style="width: 100px;" class="mr-5 align-self-center" src="../images/posters/'.$row['title'].'(main).jpg"></a>';

                            }else if($directorName == $nextDirectorName || empty($nextDirectorName)) {

                              echo '<a href="userView.php?movieId='.$row['movieId'].'"><img style="width: 100px;" class="mr-5 align-self-center" src="../images/posters/'.$row['title'].'(main).jpg"></a>';

                            }
                            $nextDirectorName = $row['directorName'];
                          }
                        }
                }

                if(isset($_POST['signupProcess'])){

                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $firstName = $_POST['firstName'];
                    $lastName = $_POST['lastName'];
                    $phno = $_POST['phNo'];
                    $gender = $_POST['gender'];

                    $query = "INSERT INTO users(email, firstName, lastName, password, gender, phone) VALUES('$email', '$firstName', '$lastName', '$password', '$gender', '$phno')";
                    $result = mysqli_query($dbc,$query) or die('<div class="alert alert-danger" role="alert"><strong>OOPS! </strong>There was some error processing your signup request</div>');

                    if($result){

                        echo '<div class="alert alert-success mb-0" role="alert"><strong>YEAH! You have successfully registered.</strong> The website is all yours now.</div>';
                        setUserCookie($email, $firstName, $lastName);
                        navbar();
                        showcase();

                    }else{

                        echo '<div class="alert alert-danger" role="alert"><strong>OOPS!</strong> Seems like we can\'t do that. If you are a registered user you can login directly.</div>';

                    }

                }else if(isset($_POST['loginProcess']) and empty($_SESSION['email'])){

                    $email = $_POST['loginEmail'];
                    $password = $_POST['loginPassword'];

                    $query = "SELECT * FROM users WHERE email='".$email."'AND password='".$password."'";
                    $result = mysqli_query($dbc, $query) or die("couldn't issue SELECT query at line 80");
                    $row = mysqli_fetch_array($result);

                    if(!empty($row['email']) and !empty($row['password'])){

                        echo '<div class="alert alert-success mb-0" role="alert"><strong>Welcome.</strong> Login successful.</div>';
                        setUserCookie($email, $row['firstName'], $row['lastName']);
                        navbar();
                        if($row['active_user'] == 1){
                          echo '<div class="container alert alert-light alert-dismissible"><button class="close" type="button" data-dismiss="alert"><span>×</span></button>On cloud nine</strong> You have been tagged as gold user for your contribution for our website.<i class="ml-3 size-large gold fas fa-award"></i></div>';
                        }
                        showcase();

                    }else{

                        echo '<div class="alert alert-danger" role="alert"><strong>OOPS!</strong> Seems like we can\'t do that. If you are a registered user check the email and password. Or else you need to register first. <a href="../index.php">Home</a></div>';

                    }

                }else if(!empty($_SESSION['email'])){

                    $email = $_SESSION['email'];
                    $query = "SELECT * FROM users WHERE email='".$email."'";
                    $result = mysqli_query($dbc, $query) or die("couldn't issue SELECT query at line 80");
                    $userDetails = mysqli_fetch_array($result);

                    if(!empty($_GET['msg'])){
                      echo '<div class="alert alert-warning mb-0">'.$_GET['msg'].'</div>';
                    }
                    navbar();
                    if($userDetails['active_user'] == 1){
                      echo '<div class="container alert alert-light alert-dismissible"><button class="close" type="button" data-dismiss="alert"><span>×</span></button>On cloud nine</strong> You have been tagged as gold user for your contribution for our website.<i class="ml-3 size-large gold fas fa-award"></i></div>';
                    }
                    showcase();

                }else{

                    echo '<div class="alert alert-danger" role="alert"><strong>OOPS!</strong> Session expired you need to login first/again.<a href="../index.php"> Home</a></div>';

                }

            ?>
        <div class="end"></div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    </body>
</html>
