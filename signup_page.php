<!DOCTYPE html>
<html lang="en">
<head>
<title>login/signup</title>
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


<div class="container content padding-32 light-grey">
<div class="card-4">

<div class="container black">
  <h2>SIGN UP</h2>
</div>

<form class="container" action="signup.php" method="post">

<label>Name</label>
<input class="input" type="text" id="name" name="name" required>

<label>Email</label>
<input class="input" type="text" id="email" name="email" required>

<label>Password</label>
<input class="input" type="password" id="password" name="password" required>

<button class="button black section left" type="submit">SEND</button>
<button class="button black section right" type="reset">RESET</button>
</form>

</div>







</body>
</html>