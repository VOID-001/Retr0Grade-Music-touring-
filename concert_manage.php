<?php


if($_SERVER["REQUEST_METHOD"] === "POST"){

  $mysqli = require __DIR__ ."/database_con.php";

  $sql = sprintf("SELECT * FROM users
          WHERE email = '%s'",
          $mysqli->real_escape_string($_POST["email"]));
  
  $result = $mysqli->query($sql);

  $user = $result->fetch_assoc();
  
  if($user){
    if(password_verify($_POST["password"],$user["password"])){
      session_start();
      $_SESSION["user"] = $user["name"];

    }
  }
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Retrograde</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="1.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="2.css">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>
</head>
<body>

<!-- Navbar -->
<div class="top">
  <div class="bar black card">
    <a class="bar-item button padding-large hide-medium hide-large right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu">... </a>
    <a href="#" class="bar-item button padding-large">HOME</a>
    <a href="#band" class="bar-item button padding-large hide-small">RetrOGrade</a>
    <a href="#tour" class="bar-item button padding-large hide-small">TOUR</a>
    <a href="#contact" class="bar-item button padding-large hide-small">CONTACT</a>

    <!--<div class="dropdown-hover hide-small">
      <button class="padding-large button" title="More">MORE <i class="fa fa-caret-down"></i></button>     
      <div class="dropdown-content bar-block card-4">
        <a href="#" class="bar-item button">L</a>
        <a href="#" class="bar-item button">o</a>
        <a href="#" class="bar-item button">L</a>
        <a href="#" class="bar-item button">N</a>
        <a href="#" class="bar-item button">G</a>
        <a href="#" class="bar-item button">L</a>
      </div>
    </div>-->


    <?php if (isset($_SESSION)): ?>
      <a onclick="document.getElementById('Logout').style.display='block'" class="padding-large hover-red hide-small right"><?php print_r($_SESSION["user"]);?></a>
    <?php else: ?>
      <a onclick="document.getElementById('Login').style.display='block'" class="padding-large hover-red hide-small right">LOG IN</a>
    <?php endif; ?>
  </div>
  
  <div id="Logout" class="modal">
    <div class="modal-content animate-top card-4">
      <header class="container black center padding-32"> 
        <span onclick="document.getElementById('Logout').style.display='none'" class="button black xlarge display-topright">×</span>
        <h2 class="wide">LOGOUT</h2>
      </header>
      
      <form class="container" method="post" action="logout.php">
        <br>
        <br>
        <button class="button block black padding-16 section right" type="submit">Logout</button>
        <button class="button red section" onclick="document.getElementById('Logout').style.display='none'">Close</button>
      </form>
    </div>
  </div>

  <div id="Login" class="modal">
    <div class="modal-content animate-top card-4">
      <header class="container black center padding-32"> 
        <span onclick="document.getElementById('Login').style.display='none'" class="button black xlarge display-topright">×</span>
        <h2 class="wide">LOGIN</h2>
      </header>
      
      <form class="container" method="post">
        <br>
        <br><input class="input border" type="text" placeholder="Enter Email" id="email" name="email" required>
        <br><input class="input border" type="password" placeholder="Password" id="password" name="password" required>
        <button class="button block black padding-16 section right" type="submit">Login</button>
        <button class="button red section" onclick="document.getElementById('Login').style.display='none'">Close</button>
        <p class="right">Need an account <a href="signup_page.php" class="text-blue">Sign up</a></p>
      </form>
    </div>
  </div>
</div>

<!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links)-->
<div id="navDemo" class="bar-block black hide hide-large hide-medium top" style="margin-top:46px">
  <a href="#band" class="bar-item button padding-large" >RetrOGrade</a>
  <a href="#tour" class="bar-item button padding-large" >TOUR</a>
  <a href="#contact" class="bar-item button padding-large" >CONTACT</a>
  <a href="#" class="bar-item button padding-large" >MORE</a>
  <?php if (isset($_SESSION)): ?>
    <a onclick="document.getElementById('Logout').style.display='block'" class="bar-item button padding-large"><?php print_r($_SESSION["user"]);?></a>
  <?php else: ?>
    <a onclick="document.getElementById('Login').style.display='block'" class="bar-item button padding-large">LOG IN</a>
  <?php endif; ?>

  <div id="Logout" class="modal">
    <div class="modal-content animate-top card-4">
      <header class="container black center padding-32"> 
        <span onclick="document.getElementById('Logout').style.display='none'" class="button black xlarge display-topright">×</span>
        <h2 class="wide">LOGOUT</h2>
      </header>
      
      <form class="container" method="post" action="logout.php">
        <br>
        <br>
        <button class="button block black padding-16 section right" type="submit">Logout</button>
        <button class="button red section" onclick="document.getElementById('Logout').style.display='none'">Close</button>
      </form>
    </div>
  </div>

  <div id="Login" class="modal">
    <div class="modal-content animate-top card-4">
      <header class="container black center padding-32"> 
        <span onclick="document.getElementById('Login').style.display='none'" class="button black xlarge display-topright">×</span>
        <h2 class="wide">LOGIN</h2>
      </header>
      <form class="container" method="post">
        <br><input class="input border" type="text" placeholder="Enter Email" id="email" name="email" required>
        <br><input class="input border" type="password" placeholder="Password" id="password" name="password" required>
        <button class="button block black padding-16 section right" type="submit">Login</button>
        <button class="button red section" onclick="document.getElementById('Login').style.display='none'">Close</button>
        <p class="right">Need an account <a href="signup_page.php" class="text-blue">Sign up</a></p>
      </form>
    </div>
  </div>
</div>


<!-- Page content -->
<div class="content" style="max-width:2000px;margin-top:46px">

  <!-- Automatic Slideshow Images -->
  <div class="mySlides display-container center">
    <img src="Slideshow/la.jpg" style="width:100%">
    <div class="display-bottommiddle container text-white padding-32 hide-small">
      <h3>Los Angeles</h3>
      <p><b>We had the best time playing at Venice Beach!</b></p>   
    </div>
  </div>
  <div class="mySlides display-container center">
    <img src="Slideshow/ny.jpg" style="width:100%">
    <div class="display-bottommiddle container text-white padding-32 hide-small">
      <h3>New York</h3>
      <p><b>The atmosphere in New York is lorem ipsum.</b></p>    
    </div>
  </div>
  <div class="mySlides display-container center">
    <img src="Slideshow/chicago.jpg" style="width:100%">
    <div class="display-bottommiddle container text-white padding-32 hide-small">
      <h3>Chicago</h3>
      <p><b>Thank you, Chicago - A night we won't forget.</b></p>    
    </div>
  </div>

  <!-- The Band Section -->
  <div class="container content center padding-64" style="max-width:800px" id="band">
    <h2 class="wide">RetrOGrade</h2>
    <p class="opacity"><i>Lets get those hands up in the AIRRRR</i></p>
    <p class="justify">"Retr0Grade is the culmination of diverse talents and a shared passion for redefining the music scene.
       Born from the collaboration of independent DJs, we're here to bridge the gap between the past and the present,
        weaving the timeless classics of old school music with the cutting-edge rhythms of contemporary hip-hop beats.
         Our collective journey into the world of music is a testament to our commitment to delivering an electrifying auditory experience.
          With each track, we breathe new life into the nostalgic, infusing it with the fresh energy of the now.
           Welcome to the future of Supersonic fusion Retr0Grade, where tradition meets innovation, and the dance floor comes alive. --Martin Luther King.jr" </p>
    <div class="row padding-32">
      <div class="third">
        <p>VOID001</p>
        <img src="Artist/VOID001.jpeg" class="round margin-bottom" alt="Random Name" style="width:60%">
      </div>
      <div class="third">
        <p>Sarvajanik_kaka</p>
        <img src="Artist/kaka.jpg" class="round margin-bottom" alt="Random Name" style="width:60%">
      </div>
      <div class="third">
        <p>MC_Paplu</p>
        <img src="Artist/Paplu.jpg" class="round" alt="Random Name" style="width:60%">
      </div>
    </div>
  </div>

  <!-- The Tour Section -->
  <div class="black" id="tour">
    <div class="container content padding-64" style="max-width:800px">
      <h2 class="wide center">TOUR DATES</h2>
      <p class="opacity center"><i>Remember to book your tickets!</i></p><br>

      <ul class="ul border white text-grey">
        <li class="padding">September <span class="tag red margin-left">Sold out</span></li>
        <li class="padding">October <span class="tag red margin-left">Sold out</span></li>
        <li class="padding">November <span class="badge right margin-right">3</span></li>
      </ul>

      <div class="row-padding padding-32" style="margin:0 -16px">
        <div class="third margin-bottom">
          <img src="Show/Newyork.jpg" alt="New York" style="width:100%" class="hover-opacity">
          <div class="container white">
            <p><b>New York</b></p>
            <p class="opacity">Fri 27 Nov 2023</p>
            <p>Get ready to groove in the city that never sleeps as Retr0Grade brings the beats to the Big Apple
               a musical journey through the heart of New York!.</p>
            <button class="button black section right" onclick="document.getElementById('ticketModal').style.display='block'">Buy Tickets</button>
          </div>
        </div>
        <div class="third margin-bottom">
          <img src="Show/Paris.jpg" alt="Paris" style="width:100%" class="hover-opacity">
          <div class="container white">
            <p><b>Paris</b></p>
            <p class="opacity">Sat 28 Nov 2023</p>
            <p>Join us in the City of Lights for a night of music, love, and timeless melodies, 
              as Retr0Grade sets the stage for a Parisian soirée like no other</p>
            <button class="button black section right" onclick="document.getElementById('ticketModal').style.display='block'">Buy Tickets</button>
          </div>
        </div>
        <div class="third margin-bottom">
          <img src="Show/Wano.jpg" alt="San Francisco" style="width:100%" class="hover-opacity">
          <div class="container white">
            <p><b>Wano country</b></p>
            <p class="opacity">Sun 29 Nov 2023</p>
            <p>Damn, We got invited to Wano country Les GOOO !so join Retrograde to party with the OG gear 5 Luffy Senpai!!! </p>
            <button class="button black section right" onclick="document.getElementById('ticketModal').style.display='block'">Buy Tickets</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Ticket Modal -->
  <div id="ticketModal" class="modal">
    <div class="modal-content animate-top card-4">
      <header class="container black center padding-32"> 
        <span onclick="document.getElementById('ticketModal').style.display='none'" 
       class="button black xlarge display-topright">×</span>
        <h2 class="wide"><i class="fa fa-suitcase margin-right"></i>Tickets</h2>
      </header>
      <form class="container" method="post" action="ticket.php">
        <p><label><i class="fa fa-shopping-cart"></i> Tickets, $15 per person</label></p>
        <input class="input border" type="text" placeholder="How many?" id="number" name="number" required>
        <p><label><i class="fa fa-user"></i> Send To</label></p>
        <input class="input border" type="text" placeholder="Enter email" id="email" name="email" required>
        <button class="button block black padding-16 section right">PAY <i class="fa fa-check"></i></button>
        <button class="button red section" onclick="document.getElementById('ticketModal').style.display='none'">Close <i class="fa fa-remove"></i></button>
      </form>
    </div>
  </div>

  <!-- The Contact Section -->
  <div class="container content padding-64" style="max-width:800px" id="contact">
    <h2 class="wide center">CONTACT</h2>
    <p class="opacity center"><i>Fan? Subscribe to OF !</i></p>
    <div class="row padding-32">
      <div class="col m6 large margin-bottom">
        <i class="fa fa-map-marker" style="width:30px"></i> Verna ,Goa<br>
        <i class="fa fa-phone" style="width:30px"></i> Phone: +91 V0000001D111<br>
        <i class="fa fa-envelope" style="width:30px"> </i> Email: RetRograde@mail.com<br>
      </div>
      <div class="col m6">
        <form action="feedback.php" method="post">
          <div class="row-padding" style="margin:0 -16px 8px -16px">
            <div class="half">
              <input class="input border" type="text" placeholder="Name" required name="Name">
            </div>
            <div class="half">
              <input class="input border" type="text" placeholder="Email" required name="Email">
            </div>
          </div>
          <input class="input border" type="text" placeholder="Message" required name="Message">
          <button class="button black section right" type="submit">SEND</button>
          <button class="button black section left" type="reset">RESET</button>
        </form>
      </div>
    </div>
  </div>
  
<!-- End Page Content -->
</div>

<!-- Image of location/map -->
<img src="/mages/map.jpg" class="image greyscale-min" style="width:100%">

<!-- Footer -->
<footer class="container padding-64 center opacity light-grey xlarge">
  <i class="fa fa-facebook-official hover-opacity"></i>
  <i class="fa fa-instagram hover-opacity"></i>
  <i class="fa fa-snapchat hover-opacity"></i>
  <i class="fa fa-pinterest-p hover-opacity"></i>
  <i class="fa fa-twitter hover-opacity"></i>
  <i class="fa fa-linkedin hover-opacity"></i>
  <p class="medium">The DBMS project</p>
</footer>

<script>
// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 4000);    
}

// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("show") == -1) {
    x.className += " show";
  } else { 
    x.className = x.className.replace(" show", "");
  }
}

// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('ticketModal');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
