<!DOCTYPE html>
<html>
<head>
    <title>Movie Hunger - About Developers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:400" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
</head>
<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-5">
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
                    <li class="nav-item">
                        <a class="nav-link" href="browse.php">Browse</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>

                <form class="form-inline ml-auto" action="browse.php">
                    <input type="text" class="form-control mr-2" name="searchString" placeholder="Search...">
                    <button name="searchSubmit" class="btn btn-outline-light">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">

      <div class="jumbotron text-center text-dark">
        <h1 class="display-4">Our Motto</h1>
        <p1 class="lead">"Strive to build a product that amaze customers within thirty seconds of usage. If you fail to do so, you lose them for life.
          Effort is important, but knowing where to make an effort makes all the difference."</p>
        <footer class="blockquote-footer text-right text-capitalize">Satya Nadella (CEO Microsoft)</footer>
        <hr>
        <p><b>We are still in Aplha. So, any complaints and bugs are warmly appreciated.</b></p>
        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Write to us.</button>
        <div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Write to us.</h5>
                <button class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <a href="mailto:lokesh.pandu1998@gmail.com">Mail</a> us your experience.
              </div>
              <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card-columns">
          <div class="card">
              <img class="card-img-top img-fluid" src="images/utill/Aravind C.jpeg" alt="">
              <div class="card-body text-dark">
                  <h4 class="card-title text-center lato">Aravind C</h4>
                  <p class="card-text">Give him any task and consider it done.
                    If this website looks any cool to you he is the reason for it. Oh yea!! don't get us started on his female following.</p>
                  <div class="text-center">
                    <a target="_blank" href="https://www.facebook.com/arvind.arjun.58"><i style="color: #3b5999;" class="display-6 fab fa-facebook-square mr-3"></i></a>
                    <a target="_blank" href="https://www.instagram.com/arvind_arjun_/"><i style="color: #e4405f;" class="display-6 fab fa-instagram mr-3"></i></a>
                  </div>
              </div>
          </div>
          <div class="card">
              <img class="card-img-top img-fluid" src="images/utill/Kiran C.jpeg" alt="">
              <div class="card-body text-dark">
                  <h4 class="card-title text-center lato">Kiran C</h4>
                  <p class="card-text">Have you heard of dudes who never attend lectures yet, ace the exams? This is one of 'em.
                    He is the reason behind enormous data behind our database holds.</p>
                  <div class="text-center">
                    <a target="_blank" href="https://www.facebook.com/kiran.kiran.509994"><i style="color: #3b5999;" class="display-6 fab fa-facebook-square mr-3"></i></a>
                    <a target="_blank" href="https://www.instagram.com/kiranlucky003/"><i style="color: #e4405f;" class="display-6 fab fa-instagram mr=3"></i></a>
                  </div>
              </div>
          </div>
          <div class="card">
              <img class="card-img-top img-fluid" src="images/utill/Lokesh K.jpg" alt="">
              <div class="card-body text-dark">
                  <h4 class="card-title text-center lato">Lokesh K</h4>
                  <p class="card-text">You'll either find him going haywire on his keyboard or partying with friends.
                    If you find him zoned out don't worry he might prolly be thinking of some <code>nullPointerExceptions</code>.</p>
                  <div class="text-center">
                    <a target="_blank" href="https://www.facebook.com/lokesh.pandu.733"><i style="color: #3b5999;" class="display-6 fab fa-facebook-square mr-3"></i></a>
                    <a target="_blank" href="https://www.instagram.com/lokesh_kadiyala/"><i style="color: #e4405f;" class="display-6 fab fa-instagram mr-3"></i></a>
                    <a href="#"><i style="color: #6e5494;" class="display-6 fab fa-github"></i></a>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <div class="end"></div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
