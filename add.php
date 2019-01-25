<?php


?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tick 8 | Add</title>

    <!-- Bootstrap core CSS -->
    <link href="src/css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="src/css/main.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
      body {
        padding-top: 54px;
      }
      @media (min-width: 992px) {
        body {
          padding-top: 56px;
        }
      }

    </style>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Add</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="home.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="read.php">Read</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="add.php">Add</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="settings.php">Settings</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-sx-12" style="margin-top: 20px;">
          <form method="POST" action="save.php">
            <input type="hidden" name="page" value="add">
            <div class="form-group">
              <label for="word_per_day">Word</label>
              <textarea class="form-control" name="word" id="word" value=""></textarea>
            </div>
            <div class="form-group">
              <label for="word_per_day">Synonym</label>
              <textarea class="form-control" name="synonym" id="synonym" value=""></textarea>
            </div>
            <div class="form-group">
              <label for="word_per_day">trans</label>
              <textarea class="form-control" name="trans" id="trans" value=""></textarea>
            </div>
            <div style="text-align: center; margin-top: 15px;">
              <button type="submit" class="btn btn-primary">Save</button>
              <a class="btn btn-light" href="home.php">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <p style="text-align: center;bottom: 0px;margin: 0px auto 0px 15%;position: fixed;">Developed By Abolfazl Ghaffari</p>
    <!-- Bootstrap core JavaScript -->
    <script src="src/js/jquery/jquery.min.js"></script>
    <script src="src/css/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
