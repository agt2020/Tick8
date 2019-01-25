<?php
session_start();
include 'funcs/connection.php';
$db = new db();
$word = $db->Get_Word();

if ($word == 'Done')
{
  echo '<script type="text/javascript">
          alert("Today Task Done !");
          window.location.replace("home.php");
      </script>'; 
}
else
{
  // READ THIS WORD
  $db->Read_Word($word['id']);
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tick 8 : Read</title>

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
        <a class="navbar-brand" href="#">Read</a>
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
          <input type="hidden" id="page" name="page" value="read">
          <input type="hidden" id="id" value="<?php echo $word['id']; ?>">
          <div class="form-group">
            <textarea readonly class="form-control" name="word" id="word" onclick="Show_Word();"><?php echo $word['words']; ?></textarea>
          </div>
          <div class="form-group response" style="display:none;">
            <label for="synonym">Synonym</label>
            <textarea readonly class="form-control" name="synonym" id="synonym"><?php echo $word['synonym']; ?></textarea>
          </div>
          <div class="form-group response" style="display:none;">
            <label for="trans">Translate</label>
            <textarea readonly class="form-control" name="trans" id="trans"><?php echo $word['trans']; ?></textarea>
          </div>
          <div class="form-group" style="text-align: center; margin-top: 15px;">
            <button class="btn btn-success" onclick="Know();">I Know</button>
            <button class="btn btn-danger" onclick="Dont_Know();">I Dont Know</button>
          </div>
          <div class="form-group" style="text-align: center; margin-top: 15px;">
            <button class="btn btn-info" onclick="Reset();">Reset</button>
            <input type="text" readonly name="repeated" value="<?php echo $word['repeated']; ?>">
          </div>
        </div>
      </div>
    </div>
    <p style="text-align: center;bottom: 0px;margin: 0px auto 0px 15%;position: fixed;">Developed By Abolfazl Ghaffari</p>
    <!-- Bootstrap core JavaScript -->
    <script src="src/js/jquery/jquery.min.js"></script>
    <script src="src/css/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
      function Show_Word()
      {
        $('.response').show();
      }
      function Know()
      {
        var data = {
          type: 'Know',
          record_id: $('#id').val(),
        };
        $.ajax({
          url: 'ajaxFiles/read.php',
          type: 'POST',
          data: data,
          async: true,
          dataType: 'json',
          error: function(resp){},
          success: function(resp){
            window.location.replace("read.php");
          }
        });
      }
      function Dont_Know()
      {
        window.location.replace("read.php");
      }
      function Reset()
      {
        var data = {
          type: 'Reset',
          record_id: $('#id').val(),
        };
        $.ajax({
          url: 'ajaxFiles/read.php',
          type: 'POST',
          data: data,
          async: true,
          dataType: 'json',
          error: function(resp){},
          success: function(resp){
            window.location.replace("read.php");
          }
        });
      }
    </script>
  </body>

</html>
