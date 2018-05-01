<!DOCTYPE html>
<html lang="en">
<head>
  <title>CSE</title>

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/dynamicbg.css">
 
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</head>
<body>
<!-- navbar -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">CSE @ PEC</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="faculty.php">Faculty</a></li>
      <li><a href="newfacilities.php">Facilities</a></li>
      <li><a href="newsfeed.php">News Feed</a></li>
      <li><a href="notifications.php">Notifications</a></li>
      <li><a href="../wt/register.php">Login</a></li>
    </ul>
    <form class="form-inline" style="margin-top: 10px;" method="GET" action="searchEngine.php">
        <input class="form-control" type="search" placeholder="Search People" name="name" required>
        <button class="btn btn-outline-success" name="search">Search</button>
    </form>
  </div>
</nav>

