<?php
	session_start();
?>
<html>
	<head>
		<title>Movie Hunger - Trending Moives</title>
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
							<li class="nav-item active">
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
						<input type="text" class="form-control mr-2" name="searchString" placeholder="Search...">
						<button name="searchSubmit" class="btn btn-outline-light">Search</button>
					</form>
				</div>
			</div>
		</nav>

<?php

			$dbc = mysqli_connect('localhost','id7925529_root','Jyothi123','id7925529_movie_hunger') or die("couldn't connect to DB at line 46");

      if(isset($_POST['updateProfile'])){

          $query = "SELECT * FROM users WHERE email='".$_SESSION['email']."' AND password='".$_POST['oldPassword']."'";
          $results = mysqli_query($dbc, $query);

          if(mysqli_num_rows($results) == 1){
              if(!empty($_POST['password']) && !empty($_POST['rptPassword'])){
                  $query = "UPDATE users SET firstName='".$_POST['firstName']."', lastName='".$_POST['lastName']."', phone=".$_POST['phNo'].", password='".$_POST['password']."' WHERE email='".$_SESSION['email']."'";
                  $results = mysqli_query($dbc, $query) or die("Couldn't issue UPDATE query at line 63");
                  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <strong>YEAH!</strong> Details updated successfully. Thankyou for Updating with us.
                        </div>';
              }else{
                  $query = "UPDATE users SET firstName='".$_POST['firstName']."', lastName='".$_POST['lastName']."', phone=".$_POST['phNo']." WHERE email='".$_SESSION['email']."'";
                  $results = mysqli_query($dbc, $query) or die("Couldn't issue UPDATE query at line 66");
                  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <strong>YEAH!</strong> Details updated successfully. Thankyou for Updating with us.
                        </div>';
              }
          }else{
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>Uh Oh!</strong> Old password seems to be wrong.
                    </div>';
          }

      }

			// if(isset($_POST['setGenre'])){
			// 		$flag = 0;
			// 		$query = "SELECT id FROM users WHERE email='".$_SESSION['email']."'";
			// 		$results = mysqli_query($dbc, $query);
			// 		$userId = mysqli_fetch_array($results);
			//
			// 		$query = "INSERT INTO user_genre_personalize VALUES";
			// 		$queryAppend = array();
			// 		if(isset($_POST['Action'])){
			// 				array_push($queryAppend, "(".$userId['id'].",".$_POST['Action'].")");
			// 		}
			// 		if(isset($_POST['Adventure'])){
			// 				array_push($queryAppend, "(".$userId['id'].",".$_POST['Adventure'].")");
			// 		}
			// 		if(isset($_POST['Animation'])){
			// 				array_push($queryAppend, "(".$userId['id'].",".$_POST['Animation'].")");
			// 		}
			// 		if(isset($_POST['Biography'])){
			// 				array_push($queryAppend, "(".$userId['id'].",".$_POST['Biography'].")");
			// 		}
			// 		if(isset($_POST['Comedy'])){
			// 				array_push($queryAppend, "(".$userId['id'].",".$_POST['Comedy'].")");
			// 		}
			// 		if(isset($_POST['Crime'])){
			// 				array_push($queryAppend, "(".$userId['id'].",".$_POST['Crime'].")");
			// 		}
			// 		if(isset($_POST['Drama'])){
			// 				array_push($queryAppend, "(".$userId['id'].",".$_POST['Drama'].")");
			// 		}
			// 		if(isset($_POST['Family'])){
			// 				array_push($queryAppend, "(".$userId['id'].",".$_POST['Family'].")");
			// 		}
			// 		if(isset($_POST['Fantasy'])){
			// 				array_push($queryAppend, "(".$userId['id'].",".$_POST['Fantasy'].")");
			// 		}
			// 		if(isset($_POST['History'])){
			// 				array_push($queryAppend, "(".$userId['id'].",".$_POST['History'].")");
			// 		}
			// 		if(isset($_POST['Horror'])){
			// 				array_push($queryAppend, "(".$userId['id'].",".$_POST['Horror'].")");
			// 		}
			// 		if(isset($_POST['Musical'])){
			// 				array_push($queryAppend, "(".$userId['id'].",".$_POST['Musical'].")");
			// 		}
			// 		if(isset($_POST['Mystery'])){
			// 				array_push($queryAppend, "(".$userId['id'].",".$_POST['Mystery'].")");
			// 		}
			// 		if(isset($_POST['Romance'])){
			// 				array_push($queryAppend, "(".$userId['id'].",".$_POST['Romance'].")");
			// 		}
			// 		if(isset($_POST['Sci-fi'])){
			// 				array_push($queryAppend, "(".$userId['id'].",".$_POST['Sci-fi'].")");
			// 		}
			// 		if(isset($_POST['Short'])){
			// 				array_push($queryAppend, "(".$userId['id'].",".$_POST['Short'].")");
			// 		}
			// 		if(isset($_POST['Thriller'])){
			// 				array_push($queryAppend, "(".$userId['id'].",".$_POST['Thriller'].")");
			// 		}
			// 		if(isset($_POST['War'])){
			// 				array_push($queryAppend, "(".$userId['id'].",".$_POST['War'].")");
			// 		}
			// 		$query .= implode(", ", $queryAppend);
			// 		$results = mysqli_query($dbc, $query);
			// 		if(mysqli_affected_rows($dbc) > 0){
			// 			  echo '<div class="container"><div class="alert alert-info alert-dismissible">
			// 					  <button class="close" type="button" data-dismiss="alert"><span>&times;</span></button>
			// 					  <strong>Thankyou!!</strong> We\'ll make sure you see content as per your favourites.
			// 			  </div></div>';
			//
			// 		}
			//
			// }


      $query = "SELECT * FROM users WHERE email='".$_SESSION['email']."'";
      $results = mysqli_query($dbc, $query);
      $userDetails = mysqli_fetch_array($results);

			if(isset($_GET['setGenre'])){
					$query = "INSERT INTO user_genre_personalize VALUES(".$userDetails['id'].",". $_GET['genreId'].")";
					$results = mysqli_query($dbc, $query);
					if(mysqli_affected_rows($dbc) == 1){
							echo '<div class="container"><div class="alert alert-info alert-dismissible">
				 					  <button class="close" type="button" data-dismiss="alert"><span>&times;</span></button>
				 					  <strong>Thankyou!!</strong> We\'ll make sure you see content as per your favourites.
						 			  </div></div>';
					}

			}

			if(isset($_GET['deleteGenre'])){
					$query = "DELETE FROM user_genre_personalize WHERE user_id=".$userDetails['id']." AND genre_id=".$_GET['genreId'];
					$results = mysqli_query($dbc, $query);
					if(mysqli_affected_rows($dbc) == 1)
							echo '<div class="container"><div class="alert alert-info alert-dismissible">
									<button class="close" type="button" data-dismiss="alert"><span>&times;</span></button>
									<strong>Forget It!!</strong> We have many more genres to choose from.
							</div></div>';
			}
?>
      <div class="container">
					<div id="editProfile" style="display: none">
							<ol class="breadcrumb bg-dark">
								<li class="breadcrumb-item active">Edit Profile</li>
								<li class="breadcrumb-item"><a href=# onclick="return showPage('favGenre', 'editProfile');">Favourite Genre</a></li>
								<button class="btn btn-success" data-toggle="tooltip" data-placement="right" title="" data-original-title="Using this form you can update detials in the database."><i class="fas fa-info-circle"></i></button>
							</ol>
		          <form onsubmit="return updateValidate()" name="update" action="userPersonalize.php" method="post">
		              <div class="form-group">
		                  <label for="name">First Name</label>
		                  <input class="form-control" type="text" id="firstName" name="firstName" value="<?php echo $userDetails['firstName']; ?>" placeholder="Enter first name">
		              </div>
		              <div class="form-group">
		                  <label for="name">Last Name</label>
		                  <input class="form-control" type="text" id="lastName" name="lastName" value="<?php echo $userDetails['lastName']; ?>" placeholder="Enter last name">
		              </div>
		              <div class="form-group">
		                  <label for="email">Email address</label>
		                  <input class="form-control" type="email" id="email" name="email" value="<?php echo $userDetails['email']; ?>"  placeholder="Enter email" readonly>
		                  <small class="form-text text-muted">Your email cannot be changed</small>
		              </div>
		              <div class="form-group">
		                  <label for="company">Phone</label>
		                  <input class="form-control" type="number" id="phNo" name="phNo" value="<?php echo $userDetails['phone']; ?>" placeholder="Enter phone number">
		              </div>
		              <div class="form-group">
		                  <label for="password">Password</label>
		                  <input class="form-control" type="password" id="password" name="password" placeholder="Password">
		              </div>
		              <div class="form-group">
		                  <label for="password">Repeat Password</label>
		                  <input class="form-control" type="password" id="rptPassword" name="rptPassword" placeholder="Repeat Password">
		              </div>
		              <hr>
		              <div class="form-group">
		                  <label for="password">Password</label>
		                  <input class="form-control" type="password" name="oldPassword" required placeholder="Old Password">
		                  <small class="form-text text-muted">You need to enter your old password to continue</small>
		              </div>
		              <div id="updateErrorInfo" class="text-danger">*</div>
		              <button class="btn btn-light float-right" name="updateProfile" type="submit">Submit</button>
		          </form>
					</div>
					<div id="favGenre">
						<ol class="breadcrumb bg-dark">
							<li class="breadcrumb-item active"><a href=# onclick="return showPage('editProfile', 'favGenre');">Edit Profile</a></li>
							<li class="breadcrumb-item">Favourite Genre</li>
							<button class="btn btn-success" data-toggle="tooltip" data-placement="right" title="" data-original-title="By clicking on the genre tags you can add/delete your favourite genres."><i class="fas fa-info-circle"></i></button>
						</ol>
<?php
						$query = "SELECT * FROM genres where id not in(SELECT genre_id FROM user_genre_personalize AS ugp, users AS u where ugp.user_id=u.id AND u.email='".$_SESSION['email']."')";
						$results = mysqli_query($dbc, $query);
						$genreList = $results;
						// echo '<form action="userPersonalize.php" method="post">';
						echo '<div class="lato display-4">Add Genre</div>';
						echo '<div class="row">';
						// show list of genres not in user favourites
						while($row = mysqli_fetch_array($genreList)){
								echo '<div class="col-xl-2 col-md-2 col-sm-3 text-center add-tag mr-5 ml-5 mb-2">'.$row['name'].' <a href="userPersonalize.php?genreId='.$row['id'].'&setGenre"><i class="fas fa-plus"></i></a></div>';
						}
						echo '</div>';
						// echo  '<button class="btn btn-light float-right" name="setGenre" type="submit">Submit</button>';
						// echo '</form>';

						$query = "SELECT * FROM user_genre_personalize AS ugr, genres AS g WHERE g.id=ugr.genre_id AND ugr.user_id=".$userDetails['id'];
						$results = mysqli_query($dbc, $query);
						echo '<div class="lato display-4">Delete Genre</div>';
						echo '<div class="row">';
						while($row = mysqli_fetch_array($results))
								echo '<div class="col-xl-2 col-md-2 col-sm-3 text-center delete-tag mr-5 ml-5 mb-2">'.$row['name'].' <a href="userPersonalize.php?genreId='.$row['id'].'&deleteGenre"><i class="fas fa-trash"></i></a></div>';
						echo '</div>';
?>
					</div>
      </div>
<?php
  }else{

    echo '<div class="alert alert-danger" role="alert"><strong>OOPS!</strong> Session expired you need to login first/again.<a href="../index.php"> Home</a></div>';

  }
?>
    <script src="../javascript/funtion.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
		<script>
		    // Init Popover
				$('[data-toggle="tooltip"]').tooltip();
		    function showTooltip() {
		      $('#hello').tooltip('show');
		    }

		    function hideTooltip() {
		      $('#hello').tooltip('hide');
		    }

		    function toggleTooltip() {
		      $('#hello').tooltip('toggle');
		    }

		    // Tooltip Events
		    $('#hello').on('show.bs.tooltip', function () {
		      console.log('Tooltip Show');
		    });

		    $('#hello').on('shown.bs.tooltip', function () {
		      console.log('Tooltip Shown');
		    });

		    $('#hello').on('hide.bs.tooltip', function () {
		      console.log('Tooltip Hide');
		    });

		    $('#hello').on('hidden.bs.tooltip', function () {
		      console.log('Tooltip Hidden');
		    });

  	</script>

  </body>
</html>
