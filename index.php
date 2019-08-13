<!DOCTYPE html>
<html>
    <head>
        <title>Movie Hunger - Homepage</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato:400" rel="stylesheet">
        <link type="text/css" href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <header class="homepage_dashboard">
            <!--<h1 id="title">Movie Hunger</h1>-->
            <ul class="navigator">
                <li><a id="active" href="#">Home</a></li>
                <li><a href="browse.php">Browse</a></li>
                <li><a onclick="document.getElementById('signup').style.display='block'">Signup</a></li>
                <li><a onclick="document.getElementById('login').style.display='block'">Login</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
            </ul>
            <div class="dashboard_text">
                <h3>"Movie experience has got a bit smarter."</h3>
                <h4>News, trailers, ratings, reviews everything at one place.</h4>
                <div id="searchForm">
                    <form action="browse.php" onsubmit="return searchValidate()">
                        <input id="searchText" class="search_bar" autofocus name="searchString" required type="search" placeholder="Search...">
                        <button class="search_btn" type="submit" name="searchSubmit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </header>

        <div id="signup" class="popup">
            <span onclick="document.getElementById('signup').style.display='none'" class="close" title="Close Signup Form">&times;</span>

            <form class="popup-content" name="signup" method="post" action="user/userHomepage.php" onsubmit="return signupValidate()" >
                <div class="container">
                    <h1 style="font-size: 40px; margin-bottom: 10px; font-weight: normal; letter-spacing: 0.1em;">Signup Form</h1>
                    <p>Please fill in this form to create an account</p>
                    <hr>
                    <label for="firstName">First Name</label>
                    <input type="text" placeholder="Enter First Name" id="firstName" name="firstName" >

                    <label for="lastName">Last Name</label>
                    <input type="text" placeholder="Enter Last Name" id="lastName" name="lastName" >

                    <label for="phNo">Phone Number</label>
                    <input type="number" placeholder="Enter Phone No" id="phNo" name="phNo" >

                    <label for="email">Email</label>
                    <input type="text" placeholder="Enter Email" id="email" name="email" >

                    <label for="password">Password</label>
                    <input type="password" placeholder="Enter Password" id="password" name="password" >

                    <label for="rptPassword">Repeat Password</label>
                    <input type="password" placeholder="Repeat Password" id="rptPasssword" name="rptPassword" >

                    <input type="radio" name="gender" required value="m"> Male<br>
                    <input type="radio" name="gender" value="f"> Female<br>

                    <p>By creating an account you can rate, review a movie by yourself.</p>
                    <div id="signupErrorInfo" style="color: #ff0000; font-size: 16px; margin: 15px 0;">*</div>
                    <div class="clearfix">
                        <button type="button" onclick="document.getElementById('signup').style.display='none'" class="cancelbtn">Cancel</button>
                        <button type="submit" name="signupProcess" class="signupbtn">Sign Up</button>
                    </div>
                </div>
            </form>

        </div>

        <div id="login" class="popup">
            <span onclick="document.getElementById('login').style.display='none'" class="close" title="Close Login Form">&times;</span>

            <form class="popup-content" name="login" method="post" action="user/userHomepage.php" onsubmit="return loginValidate()" >
                <div class="container">
                    <h1 style="font-size: 40px; margin-bottom: 10px; font-weight: normal; letter-spacing: 0.1em;">Login Form</h1>
                    <p>Please provide login credentials</p>
                    <hr>

                    <label for="loginEmail">Email</label>
                    <input type="text" placeholder="Enter Email" id="loginEmail" name="loginEmail" >

                    <label for="loginPassword">Password</label>
                    <input type="password" placeholder="Enter Password" id="loginPassword" name="loginPassword" >

                    <div id="loginErrorInfo" style="color: #ff0000; font-size: 16px; margin: 15px 0;">*</div>
                    <div class="clearfix">
                        <button type="button" onclick="document.getElementById('login').style.display='none'" class="cancelbtn">Cancel</button>
                        <button type="submit" name="loginProcess" class="signupbtn">Login</button>
                    </div>
                </div>
            </form>

        </div>

        <script src="javascript/funtion.js"></script>

    </body>
</html>
