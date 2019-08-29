<?php
	session_start();
	date_default_timezone_set('Asia/Kolkata');
	require('../utills/DBConnect.php');

	function getRating($rating){ //this function is used to display the stars given to movies

		switch ($rating){
			case 1:
				echo '<a href="#reviewSection"><span class="fa fa-star checked"></span>';
				echo '<span class="fa fa-star"></span>';
				echo '<span class="fa fa-star"></span>';
				echo '<span class="fa fa-star"></span>';
				echo '<span class="fa fa-star"></span></a>';
				break;
			case 2:
				echo '<a href="#reviewSection"><span class="fa fa-star checked"></span>';
				echo '<span class="fa fa-star checked"></span>';
				echo '<span class="fa fa-star"></span>';
				echo '<span class="fa fa-star"></span>';
				echo '<span class="fa fa-star"></span></a>';
				break;
			case 3:
				echo '<a href="#reviewSection"><span class="fa fa-star checked"></span>';
				echo '<span class="fa fa-star checked"></span>';
				echo '<span class="fa fa-star checked"></span>';
				echo '<span class="fa fa-star"></span>';
				echo '<span class="fa fa-star"></span></a>';
				break;
			case 4:
				echo '<a href="#reviewSection"><span class="fa fa-star checked"></span>';
				echo '<span class="fa fa-star checked"></span>';
				echo '<span class="fa fa-star checked"></span>';
				echo '<span class="fa fa-star checked"></span>';
				echo '<span class="fa fa-star"></span></a>';
				break;
			case 5:
				echo '<a href="#reviewSection"><span class="fa fa-star checked"></span>';
				echo '<span class="fa fa-star checked"></span>';
				echo '<span class="fa fa-star checked"></span>';
				echo '<span class="fa fa-star checked"></span>';
				echo '<span class="fa fa-star checked"></span></a>';
				break;
			default:
				echo '<a href="#reviewSection">No reviews yet. Be the first.</a>';
				break;
		}

	}

	function setRating($rating){  //this function is used by user to set rating for a movie

		switch($rating){
			case 0:
				echo '<div class="rating"><input type="radio" name="rating" value=5 id="r-1"><label for="r-1"></label>
																	<input type="radio" name="rating" value=4 id="r-2"><label for="r-2"></label>
																	<input type="radio" name="rating" value=3 id="r-3"><label for="r-3"></label>
																	<input type="radio" name="rating" value=2 id="r-4"><label for="r-4"></label>
																	<input type="radio" name="rating" value=1 id="r-5"><label for="r-5"></label></div>';
				break;
			case 1:
				echo '<div class="rating"><input type="radio" name="rating" value=5 id="r-1"><label for="r-1"></label>
																	<input type="radio" name="rating" value=4 id="r-2"><label for="r-2"></label>
																	<input type="radio" name="rating" value=3 id="r-3"><label for="r-3"></label>
																	<input type="radio" name="rating" value=2 id="r-4"><label for="r-4"></label>
																	<input type="radio" name="rating" value=1 id="r-5" checked><label for="r-5"></label></div>';
				break;
			case 2:
				echo '<div class="rating"><input type="radio" name="rating" value=5 id="r-1"><label for="r-1"></label>
																	<input type="radio" name="rating" value=4 id="r-2"><label for="r-2"></label>
																	<input type="radio" name="rating" value=3 id="r-3"><label for="r-3"></label>
																	<input type="radio" name="rating" value=2 id="r-4" checked><label for="r-4"></label>
																	<input type="radio" name="rating" value=1 id="r-5"><label for="r-5"></label></div>';
				break;
			case 3:
				echo '<div class="rating"><input type="radio" name="rating" value=5 id="r-1"><label for="r-1"></label>
																	<input type="radio" name="rating" value=4 id="r-2"><label for="r-2"></label>
																	<input type="radio" name="rating" value=3 id="r-3" checked><label for="r-3"></label>
																	<input type="radio" name="rating" value=2 id="r-4"><label for="r-4"></label>
																	<input type="radio" name="rating" value=1 id="r-5"><label for="r-5"></label></div>';
				break;
			case 4:
				echo '<div class="rating"><input type="radio" name="rating" value=5 id="r-1"><label for="r-1"></label>
																	<input type="radio" name="rating" value=4 id="r-2" checked><label for="r-2"></label>
																	<input type="radio" name="rating" value=3 id="r-3"><label for="r-3"></label>
																	<input type="radio" name="rating" value=2 id="r-4"><label for="r-4"></label>
																	<input type="radio" name="rating" value=1 id="r-5"><label for="r-5"></label></div>';
				break;
			case 5:
				echo '<div class="rating"><input type="radio" name="rating" value=5 id="r-1" checked><label for="r-1"></label>
																	<input type="radio" name="rating" value=4 id="r-2"><label for="r-2"></label>
																	<input type="radio" name="rating" value=3 id="r-3"><label for="r-3"></label>
																	<input type="radio" name="rating" value=2 id="r-4"><label for="r-4"></label>
																	<input type="radio" name="rating" value=1 id="r-5"><label for="r-5"></label></div>';
		}

	}

?>
	<html>
	<head>
		<title>Movie Hunger - Movies, Actors, Directors</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Lato:400" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../css/style2.css">
	</head>

	<body>
<?php
	if(!empty($_SESSION['email'])){
?>
		<nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
			<div class="container">
				<a class="navbar-brand" style=" color: #f39c12; " href="#">Movie Hunger</a>
				<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
							<li class="nav-item">
									<a class="nav-link" href="userHomepage.php">Home</a>
							</li>
							<li class="nav-item">
									<a class="nav-link" href="userPersonalize.php">Personalize</a>
							</li>
							<li class="nav-item active">
									<a class="nav-link" href="userSearch.php?searchString=">Browse</a>
							</li>
							<li class="nav-item">
									<a class="nav-link" href="logout.php">Logout <?php echo "<span class='text-muted'>(".$_SESSION['username'].")</span>"; ?></a>
							</li>
					</ul>

					<form class="form-inline ml-auto" action="userSearch.php">
						<input type="text" class="form-control mr-2" name="searchString" placeholder="Search...">
						<button name="searchSubmit" class="btn btn-outline-light">Search</button>
					</form>
				</div>
			</div>
		</nav>

<?php

	  	if(isset($_GET['actorId'])){

				$actorId = $_GET['actorId'];
				$query = "SELECT a.firstName AS firstName, a.lastName AS lastName, a.bio AS bio, a.gender AS gender, CEIL(AVG(mr.rating)) AS rating, COUNT(mr.user_id) AS noOfReviews
									FROM movie_reviews AS mr, movie_actors AS ma, actors AS a WHERE mr.movie_id=ma.actor_id AND ma.actor_id=a.id AND a.id=".$actorId." GROUP BY a.id;";
				$actorDetails = mysqli_query($dbc, $query);
				$row = mysqli_fetch_array($actorDetails);
?>
				<div class="container">
					<div class=" row">
						<img style=" max-height: 150px; " class=" img-thumbnail mr-4 mt-4" src="../images/utill/<?php echo $row['gender'] ?>.png" alt="Thumbnail image">
						<div class=" lato col">
							<h1 class=" col-xs-10 mt-4 col-sm-14 col-md-7 col-lg-8 col-lg-offset-1 display-4 mb-0 "><?php echo $row['firstName']." ".$row['lastName']; ?></h1><br>
							<h5><?php echo $row['bio']."<br>"; ?></h5>
						</div>
					</div>
					<hr>
<?php
						$query = "SELECT * FROM actors AS a, movies AS m, movie_actors AS ma WHERE a.id=ma.actor_id AND ma.movie_id=m.id AND a.id=".$actorId;
						$actorDetails = mysqli_query($dbc, $query);
						if(mysqli_num_rows($actorDetails) > 0){

							echo '<div class="lato display-4 mb-3">Other Movies</div>';

							while($row = mysqli_fetch_array($actorDetails))
								echo '<a href=userView.php?movieId='.$row['id'].'><div class="media mb-2"><img class="mr-3 align-self-center" style="max-height: 100px;" src="../images/posters/'.$row['title'].'(main).jpg"><div class="media-body"><h5>'.$row['title'].'</h5></div></div></a>';

						}
?>
				</div>
<?php

	    }else if(isset($_GET['directorId'])){

				$query = "SELECT d.firstName as firstName, d.lastName as lastName, d.bio as bio, d.gender as gender, CEIL(AVG(rating)) as rating, COUNT(mr.user_id) AS noOfReviews
									FROM director AS d, movies AS m, movie_reviews AS mr WHERE d.id=".$_GET['directorId']." AND d.id=m.director_id and m.id=mr.movie_id GROUP BY d.id";
				$directorDetails = mysqli_query($dbc, $query);
				$row = mysqli_fetch_array($directorDetails);
?>
				<div class="container">
					<div class=" row">
						<img style=" max-height: 150px; " class=" img-thumbnail mr-4 mt-4" src="../images/utill/<?php echo $row['gender'] ?>.png" alt="Thumbnail image">
						<div class=" lato col">
							<h1 class=" col-xs-10 mt-4 col-sm-14 col-md-7 col-lg-8 col-lg-offset-1 display-4 mb-0 "><?php echo $row['firstName']." ".$row['lastName']; ?></h1><br>
							<h5><?php getRating($row['rating']); echo '<span class="text-muted"> ('.$row['noOfReviews'].')</span><br><br>'.$row['bio'].'<br>'; ?></h5>
						</div>
					</div>
					<hr>
<?php
						$query = "SELECT * FROM director AS d, movies AS m WHERE m.director_id=d.id AND d.id=".$_GET['directorId'];
						$directorDetails = mysqli_query($dbc, $query);
						if(mysqli_num_rows($directorDetails) > 0){

							echo '<div class="lato display-4 mb-3">Other Movies</div>';

							while($row = mysqli_fetch_array($directorDetails))
								echo '<a href=userView.php?movieId='.$row['id'].'><div class="media mb-2"><img class="mr-3 align-self-center" style="max-height: 100px;" src="../images/posters/'.$row['title'].'(main).jpg"><div class="media-body"><h5>'.$row['title'].'</h5></div></div></a>';

						}
?>
				</div>
<?php

	    }else if(isset($_GET['movieId'])){

				$query = "SELECT * FROM movies, director WHERE movies.director_id=director.id AND movies.id=".$_GET['movieId'];
				$results = mysqli_query($dbc, $query);
				$movieDirector = mysqli_fetch_array($results);

				$query = "SELECT * FROM movies m, movie_actors ma, actors a WHERE m.id=ma.movie_id AND ma.actor_id=a.id AND m.id=".$_GET['movieId'];
				$results = mysqli_query($dbc, $query);
				$movieActors = $results;

				$query = "SELECT title, g.name FROM movies m, movie_genre mg, genres g WHERE m.id=mg.movie_id AND mg.genre_id=g.id AND m.id=".$_GET['movieId'];
				$results = mysqli_query($dbc, $query) or die("cant issue query");
				$movieGenres = $results;

				$query = "SELECT CEIL(avg(rating)) as rating FROM movies as m, director as d, users as u, movie_reviews as mr
									WHERE m.director_id=d.id AND m.id=mr.movie_id AND mr.user_id=u.id AND m.id=".$_GET['movieId']." GROUP BY m.id";
				$results = mysqli_query($dbc, $query) or die("cant issue query");
				$movieAvgRating = mysqli_fetch_array($results);

				$query = "SELECT m.id id, title, count(*) count FROM movies m, movie_genre mg WHERE m.id=mg.movie_id AND mg.movie_id!=".$_GET['movieId']." AND mg.genre_id IN
									(SELECT genre_id FROM movie_genre WHERE movie_id=".$_GET['movieId'].") GROUP BY id ORDER BY count(*) DESC LIMIT 8";
				$results = mysqli_query($dbc, $query);
				$similarMovies = $results;

?>
				<div class="container" style="margin-bottom: 50px;">
					<div class="row">
						<img style=" max-height: 400px; " class="img-thumbnail mr-4 mt-4" src="../images/posters/<?php echo $movieDirector['title'] ?>(main).jpg" alt="Thumbnail image">
						<div class="col-xs-10 mt-4 col-sm-14 col-md-7 col-lg-8 col-lg-offset-1">
							<h1 class="display-4 mb-0"><?php echo $movieDirector['title'] ?></h1><br>
							<h5><?php echo $movieDirector['releasedYear']."<br><br>";
								getRating($movieAvgRating['rating']);
								echo "<br><br>";
								while($genre = mysqli_fetch_array($movieGenres))
									echo $genre['name']." / ";
								echo '<br><br>';
								echo $movieDirector['description']; ?>
							</h5>
						</div>
					</div>

					<div class="h4 mb-3 mt-3">Screenshots</div>
					<div class="row">
						<div class="col-6">
							<img class="img-fluid" src="../images/screenshots/<?php echo $movieDirector['title'] ?>.jpg">
						</div>
						<div class="col-6">
							<img class="img-fluid" src="../images/screenshots/<?php echo $movieDirector['title']?>(1).jpg">
						</div>
					</div>
					<hr>

					<div class="row">
						<div class="col-xs-12 col-sm-3 col-md-3">
							<div class="h4 mb-3">Director</div><hr>
							<a href="userView.php?directorId=<?php echo $movieDirector['director_id']; ?>"><?php echo $movieDirector['firstName']." ".$movieDirector['lastName']; ?></a>
						</div>
						<div class="col-xs-12 col-sm-9 col-md-6">
							<div class="h4 mb-3">Main Cast</div><hr>
<?php
							while($actor = mysqli_fetch_array($movieActors)){  //display all actors in that movie
								echo '<div  class="mb-2"><a href="userView.php?actorId='.$actor['id'].'">'.$actor['firstName'].' '.$actor['lastName'].'</a> <span class="mr-2 ml-2" >as</span> <span class="text-muted">'.$actor['played'].'</span></div>';
							}

?>
						</div>
					</div><hr>

					<div class="h4">Similar Movies</div><hr/>
<?php
						while($row = mysqli_fetch_array($similarMovies)){
							echo '<a href="userView.php?movieId='.$row['id'].'"><img style="width: 100px;" class="mr-3 mb-2" src="../images/posters/'.$row['title'].'(main).jpg"></a>';
						}
?>

				<div class="h4" id="reviewSection">Reviews</div><hr><br>
<?php

				if(isset($_GET['submitReview'])){  //if user gives review
					if(empty($_GET['rating'])){  //check if rating is empty
						echo '<div class="alert alert-danger" role="alert"><strong>No Way!</strong> Rating isn\'t optional.</a></div>';
					}else if(!empty($_GET['review'])){  //if review is not empty insert rating & review
						$review = mysqli_real_escape_string($dbc, $_GET['review']);
						$review = addslashes($review);
						$query = "INSERT INTO movie_reviews(user_id, movie_id, rating, review)
											VALUES((SELECT id FROM users WHERE email='".$_SESSION['email']."'),". $_GET['movieId'].",". $_GET['rating'].",'".$review."')";
						$results = mysqli_query($dbc, $query);
						if(mysqli_affected_rows($dbc) == 1){
							echo '<div class="alert alert-success" role="alert"><strong>Roger!</strong> Thanks for giving your review to us.</div>';
							$query = "CALL setActiveUser((SELECT id FROM users WHERE email='".$_SESSION['email']."'))";
							$results = mysqli_query($dbc, $query);
							if(mysqli_affected_rows($dbc) == 1){
								echo '<div class="container alert alert-light alert-dismissible"><button class="close" type="button" data-dismiss="alert"><span>×</span></button>On cloud nine</strong> You have been tagged as gold user for your contribution for our website.<i class="size-large ml-3 gold fas fa-award"></i></div>';
							}
						}
					}else{  //if review is empty insert only rating
						$query = "INSERT INTO movie_reviews(user_id, movie_id, rating)
											VALUES((SELECT id FROM users WHERE email='".$_SESSION['email']."'),". $_GET['movieId'].",". $_GET['rating'].")";
						$results = mysqli_query($dbc, $query);
						if(mysqli_affected_rows($dbc) == 1){
								echo '<div class="alert alert-success" role="alert"><strong>Roger!</strong> Thanks for giving your rating to us.</div>';
								$query = "CALL setActiveUser((SELECT id FROM users WHERE email='".$_SESSION['email']."'))";
								$results = mysqli_query($dbc, $query);
								if(mysqli_affected_rows($dbc) == 1){
									echo '<div class="container alert alert-light alert-dismissible"><button class="close" type="button" data-dismiss="alert"><span>×</span></button>On cloud nine</strong> You have been tagged as gold user for your contribution for our website.<i class="size-large ml-3 gold fas fa-award"></i></div>';
								}
						}
					}
				}

				if(isset($_GET['updateReview'])){

					if(empty($_GET['rating'])){  //check if rating is empty
						echo '<div class="alert alert-danger" role="alert"><strong>No Way!</strong> Rating isn\'t optional.</a></div>';
					}else if(!empty($_GET['review'])){  //if review is not empty insert rating & review
						$review = mysqli_real_escape_string($dbc, $_GET['review']);
						$review = addslashes($review);
						$query = "UPDATE movie_reviews SET rating=".$_GET['rating'].", review='".$review."', timeStamp='".date("Y-m-d H:i:s")."'
											WHERE user_id=(SELECT id FROM users WHERE email='".$_SESSION['email']."') AND movie_id=".$_GET['movieId'];
						$results = mysqli_query($dbc, $query) or die("Error in non empty review updation");
						if(mysqli_affected_rows($dbc) == 1){
							echo '<div class="alert alert-success" role="alert"><strong>Roger!</strong> Thanks for updating your review to us.</div>';
						}
					}else{  //if review is empty insert only rating
						$query = "UPDATE movie_reviews SET rating=".$_GET['rating'].", review=null, timeStamp='".date("Y-m-d H:i:s")."'
											WHERE user_id=(SELECT id FROM users WHERE email='".$_SESSION['email']."') AND movie_id=".$_GET['movieId'];
						$results = mysqli_query($dbc, $query) or die("Error in empty review updation");
						if(mysqli_affected_rows($dbc) == 1){
							echo '<div class="alert alert-success" role="alert"><strong>Roger!</strong> Thanks for updating your rating to us.</div>';
						}
					}
				}

				$query = "(SELECT CONCAT(u.firstName,' ',u.lastName) AS userName, u.id, DATE_FORMAT(timeStamp, \"%b %D, %Y\") AS timeStamp, rating, review, '<i class=\"gold fas fa-award\"></i>' AS activeUser
										FROM movies AS m, director AS d, users AS u, movie_reviews AS mr
										WHERE m.director_id=d.id AND m.id=mr.movie_id AND mr.user_id=u.id AND u.active_user=1 AND mr.review IS NOT NULL AND m.id=".$_GET['movieId'].")
										UNION
										(SELECT CONCAT(u.firstName,' ',u.lastName) AS userName, u.id,	DATE_FORMAT(timeStamp, \"%b %D, %Y\") AS timeStamp, rating, review, '' AS activeUser
										FROM movies AS m, director AS d, users AS u, movie_reviews AS mr
										WHERE m.director_id=d.id AND m.id=mr.movie_id AND mr.user_id=u.id AND u.active_user=0 AND mr.review IS NOT NULL AND m.id=".$_GET['movieId'].")";
				$results = mysqli_query($dbc, $query) or die("error");
				$movieReviews = $results;

				while($row = mysqli_fetch_array($movieReviews)){  //display all the movie reviews

					if ($row['userName'] == $_SESSION['username']){  //the review belongs to current user
						echo '<blockquote class="bg-secondary p-2 blockquote line"><p>'.stripslashes($row['review']).'</p>';
						echo '<footer class="blockquote-footer text-right text-capitalize text-white">'.$row['userName'].' '.$row['activeUser'].' @ '.$row['timeStamp'].' '.getRating($row['rating']).'</footer>';
						echo '</blockquote>';
					}else{
						echo '<blockquote class="blockquote line"><p>'.stripslashes($row['review']).'</p>';
						echo '<footer class="blockquote-footer text-right text-capitalize">'.$row['userName'].' '.$row['activeUser'].' @ '.$row['timeStamp'].' '.getRating($row['rating']).'</footer>';
						echo '</blockquote>';
					}

				}
					echo '<br>';

					//set/update reviews section
					$query = "SELECT * FROM movie_reviews AS mr WHERE mr.movie_id=".$_GET['movieId']." AND mr.user_id=(SELECT id FROM users WHERE email='".$_SESSION['email']."')";
					$results = mysqli_query($dbc, $query) or die("cant issue query");
					$didReview = mysqli_num_rows($results);
					$review = mysqli_fetch_array($results);
					if($didReview){  //if the movie is reviewed by current logged in user give update option
						echo '<div id=editReview>';
						echo '<form action="userView.php" method="get">';
						echo '<input type="hidden" name="movieId" value='.$_GET['movieId'].'>';
						setRating($review['rating']);
						echo '<div class="form-group">';
						echo '<label for="review">Your Review</label>';
						echo '<textarea class="form-control" id="review" name="review" rows="5">'.stripslashes($review['review']).'</textarea>';
						echo '</div>';
						echo '<button class="btn btn-light float-right" name="updateReview" type="submit">Update</button>';
						echo '</div>';
						echo '</form>';
						echo '</div>';
					}else{
						echo '<form action="userView.php" method="get">';
						echo '<input type="hidden" name="movieId" value='.$_GET['movieId'].'>';
						setRating(0);
						echo '<div class="form-group">';
						echo '<label for="review">Write Review <span class="text-muted ml-2">(Optional)</span></label>';
						echo '<textarea class="form-control" id="review" name="review" rows="5"></textarea>';
						echo '</div>';
						echo '<button class="btn btn-light float-right" name="submitReview" type="submit">Submit</button>';
						echo '</form>';
					}
			echo '</div>';
	    }

		}else{
			echo '<div class="alert alert-danger" role="alert"><strong>OOPS!</strong> Session expired you need to login first/again.<a href="../index.php"> Home</a></div>';
		}
?>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
